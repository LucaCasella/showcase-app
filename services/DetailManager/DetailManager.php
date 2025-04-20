<?php

namespace Service\DetailManager;

use App\Models\Album;
use App\Models\Detail;
use DateTime;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;
use Service\AlbumManager\AlbumManager;
use Service\Helpers;

class DetailManager implements DetailManagerContract
{
    /**
     * @throws \Exception
     */
    public function store(Request $request, $album_id) :RedirectResponse
    {
        try {
            // valida richiesta
            $this->detailValidator($request);

            // ottengo l'album e le info che mi servono
            $album = Album::find($album_id);
            $albumSlug = $album->slug;
            $albumType = $album->type;

            // creo percorso per il salvataggio in filesystem
            $directory = AlbumManager::BASE_DIRECTORY . '/' . $albumType . '/' . $albumSlug;

            // creo istanza
            $detail = new Detail();
            $detail->album_id = $album_id;
            $detail->description_it = $request->input('description_it');
            $detail->description_en = $request->input('description_en');
            $detail->description_ru = $request->input('description_ru');
            $detail->owner_image = '';
            $detail->owner_image_fhd = '';
            $detail->location_image = '';
            $detail->location_image_fhd = '';
            $detail->created_at = new DateTime();

            // se ho immagine owner
            if ($request->hasFile('owner_image')) {
                // prendo immagine dalla richiesta e il suo percorso nel browser
                $ownerImageUploaded = $request->file('owner_image');
                $ownerImageOriginal = imagecreatefromstring(file_get_contents($ownerImageUploaded->getRealPath()));

                // creo i nomi per i file
                $pathsOwner = $this->createFilesNameByType('owner');

                // converto immagine in fhd
                $ownerImageFHD = Helpers::resizeToFullHd($ownerImageOriginal);

                $this->convertAndSaveImage($directory, $pathsOwner, $ownerImageOriginal, $ownerImageFHD);

                // compilo istanza con i nuovi valori
                $detail->owner_image = $pathsOwner['fileNameOriginal'];
                $detail->owner_image_fhd = $pathsOwner['fileNameFHD'];

                // libero memoria dalle immagini
                $ownerImagesToDestroy = Helpers::groupImagesToDestroy($ownerImageOriginal, $ownerImageFHD);
                Helpers::freeMemoryFromImages($ownerImagesToDestroy);
            }

            // se ho immagine location
            if ($request->hasFile('location_image')) {
                // prendo immagine dalla richiesta e il suo percorso nel browser
                $locationImageUploaded = $request->file('location_image');
                $locationImageOriginal = imagecreatefromstring(file_get_contents($locationImageUploaded->getRealPath()));

                // creo i nomi per i file
                $pathsLocation = $this->createFilesNameByType('location');

                // converto immagine in fhd
                $locationImageFHD = Helpers::resizeToFullHd($locationImageOriginal);

                $this->convertAndSaveImage($directory, $pathsLocation, $locationImageOriginal, $locationImageFHD);

                // compilo istanza con i nuovi valori
                $detail->location_image = $pathsLocation['fileNameOriginal'];
                $detail->location_image_fhd = $pathsLocation['fileNameFHD'];

                // libero memoria dalle immagini
                $locationImagesToDestroy = Helpers::groupImagesToDestroy($locationImageOriginal, $locationImageFHD);
                Helpers::freeMemoryFromImages($locationImagesToDestroy);
            }

            $detail->save();

            return redirect()->route('index-album')->with('success', 'Dettagli aggiunti con successo');
        } catch (Exception $e) {
            return redirect()->route('create-album')->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, $album_id, $detail_id): ?RedirectResponse
    {
        try {
            // Valida la richiesta
            $this->detailValidator($request);

            // Recupera album e relativo slug/type
            $album = Album::findOrFail($album_id);
            $albumSlug = $album->slug;
            $albumType = $album->type;

            // Recupera dettaglio esistente
            $detail = Detail::where('album_id', $album_id)->firstOrFail();

            // Crea percorso di salvataggio immagini
            $directory = AlbumManager::BASE_DIRECTORY . '/' . $albumType . '/' . $albumSlug;

            // Elimina immagini precedenti se esistono

            // Aggiorna i testi
            $detail->description_it = $request->input('description_it');
            $detail->description_en = $request->input('description_en');
            $detail->description_ru = $request->input('description_ru');

            // Reset immagini

            // Se presente nuova immagine owner
            if ($request->hasFile('owner_image')) {

                $detail->owner_image = '';
                $detail->owner_image_fhd = '';

                Helpers::deleteImageIfExists($directory . '/' . $detail->owner_image);
                Helpers::deleteImageIfExists($directory . '/' . $detail->owner_image_fhd);

                $ownerImageUploaded = $request->file('owner_image');
                $ownerImageOriginal = imagecreatefromstring(file_get_contents($ownerImageUploaded->getRealPath()));

                $pathsOwner = $this->createFilesNameByType('owner');
                $ownerImageFHD = Helpers::resizeToFullHd($ownerImageOriginal);

                $this->convertAndSaveImage($directory, $pathsOwner, $ownerImageOriginal, $ownerImageFHD);

                $detail->owner_image = $pathsOwner['fileNameOriginal'];
                $detail->owner_image_fhd = $pathsOwner['fileNameFHD'];

                Helpers::freeMemoryFromImages(
                    Helpers::groupImagesToDestroy($ownerImageOriginal, $ownerImageFHD)
                );
            }

            // Se presente nuova immagine location
            if ($request->hasFile('location_image')) {

                $detail->location_image = '';
                $detail->location_image_fhd = '';

                Helpers::deleteImageIfExists($directory . '/' . $detail->location_image);
                Helpers::deleteImageIfExists($directory . '/' . $detail->location_image_fhd);

                $locationImageUploaded = $request->file('location_image');
                $locationImageOriginal = imagecreatefromstring(file_get_contents($locationImageUploaded->getRealPath()));

                $pathsLocation = $this->createFilesNameByType('location');
                $locationImageFHD = Helpers::resizeToFullHd($locationImageOriginal);

                $this->convertAndSaveImage($directory, $pathsLocation, $locationImageOriginal, $locationImageFHD);

                $detail->location_image = $pathsLocation['fileNameOriginal'];
                $detail->location_image_fhd = $pathsLocation['fileNameFHD'];

                Helpers::freeMemoryFromImages(
                    Helpers::groupImagesToDestroy($locationImageOriginal, $locationImageFHD)
                );
            }

            $detail->updated_at = new DateTime();
            $detail->save();

            return redirect()->route('index-album')->with('success', 'Dettagli aggiornati con successo');
        } catch (Exception $e) {
            return redirect()->route('edit-album', ['album_id' => $album_id])
                ->with('error', 'Errore durante l\'aggiornamento: ' . $e->getMessage());
        }
    }

    public function clear($album_id)
    {
        $album = Album::where('id', '=', $album_id)->first();
        $albumWithDetail = Album::with('detail')->findOrFail($album_id);
        $albumDetail = $albumWithDetail->detail;

        $basePath = public_path(AlbumManager::BASE_DIRECTORY . '/' . $album->type . '/'. $album->slug);
        $detailImagesPaths = [
            $basePath . '/' . $albumDetail->owner_image,
            $basePath . '/' . $albumDetail->owner_image_fhd,
            $basePath . '/' . $albumDetail->location_image,
            $basePath . '/' . $albumDetail->location_image_fhd,
        ];

        foreach ($detailImagesPaths as $imagePath) {
            if(file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        if ($albumDetail) {
            $albumDetail->update([
                'description_it' => null,
                'description_en' => null,
                'description_ru' => null,
                'owner_image' => null,
                'owner_image_fhd' => null,
                'location_image' => null,
                'location_image_fhd' => null,
                'updated_at' => new DateTime(),
            ]);
        }

        return redirect()->route('index-album')->with('success', 'Dettagli resettati con successo');
    }

    function createFilesNameByType(string $image_type): array
    {
        $timestamp = time();

        $fileNameOriginal = $image_type . '_' . $timestamp . '.webp';
        $fileNameFHD = $image_type . '_fhd_' . $timestamp . '.webp';

        return [
            'fileNameOriginal' => $fileNameOriginal,
            'fileNameFHD' => $fileNameFHD
        ];
    }

    private function detailValidator(Request $request): void
    {
        $validator = Validator::make($request->all(), [
            'owner-image' => 'image|mimes:jpeg,png,jpg,webp',
            'location-image' => 'image|mimes:jpeg,png,jpg,webp',
        ]);

        if ($validator->fails()) {
            throw new Exception('Formato del file errato');
        }
    }

    private function convertAndSaveImage($directory, $paths, $ownerImageOriginal, $ownerImageFHD): void
    {
        $path1 = $directory . '/' . $paths['fileNameOriginal'];
        imagewebp($ownerImageOriginal, $path1);
        $path2 = $directory . '/' . $paths['fileNameFHD'];
        imagewebp($ownerImageFHD, $path2);
    }
}
