<?php

namespace Service\PhotoManager;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;
use Service\AlbumManager\AlbumManager;
use Service\Helpers;

class PhotoManager implements PhotoManagerContract
{
    const original_directory = 'original';
    const fhd_directory = 'fhd';
    public function store(Request $request, $album_id): string
    {
        try {
            $this->photoValidator($request);

            $photos = $request->file('photos');

            $totalPhotos = count($photos);

            $processedPhotos = 0;

            $album = Album::find($album_id);

            if (!$album) {
                return redirect()->route('index-album')->with('error', 'Album non trovato');
            }

            $albumSlug = $album->slug;


            if ($request->hasFile('photos')) {


                foreach ($photos as $uploadedPhoto) {
                    try {

                        $image = imagecreatefromstring(file_get_contents($uploadedPhoto->getRealPath()));

                        $paths = $this->createUniqueFilePathNames($uploadedPhoto);

                        $directories = $this->createIfNotExistsPhotosDirectories($albumSlug);

                        $imageFHD = Helpers::resizeToFullHd($image);

                        $this->convertAndSaveImage($directories,$paths,$image, $imageFHD);

                        $currentMaxOrder = Photo::where('album_id', $album_id)->max('order') ?? 0;

                        $photo = new Photo();
                        $photo->album_id = $album_id;
                        $photo->name = $paths['fileName'];
                        $photo->photo = $paths['photo'];
                        $photo->photo_fhd = $paths['photo_fhd'];
                        $photo->order = ++$currentMaxOrder;
                        $photo->save();

                        $processedPhotos++;

                        $imagesToDestroy = Helpers::groupImagesToDestroy($image, $imageFHD);

                        Helpers::freeMemoryFromImages($imagesToDestroy);

                    } catch (\Exception $e) {
                        // Log the error and continue processing the next photo
                        Log::error('Errore nel processare la foto: ' . $e->getMessage());
                        continue;
                    }
                }
            }

            return 'Foto processate con successo:' . $processedPhotos . '/' . $totalPhotos;

        }catch (Exception $e) {
            Log::info($e);
            return 'Errore nel processare le foto: ' . $e->getMessage();
        }
    }

    public function delete(Request $request, $album_id, $photo_id): RedirectResponse
    {
        try {

            $photo = Photo::find($photo_id);
            $album = Album::find($album_id);

            if (!$photo || !$album) {
                return redirect()->route('index-album')->with('error', 'Foto o relativo album non trovati');
            }

            $paths = $this->createPhotoPathsFromDb($photo, $album);

            // Delete files from related folders
            if(file_exists($paths['path4k'])) {
                unlink($paths['path4k']);
            }
            if(file_exists($paths['pathFHD'])) {
                unlink($paths['pathFHD']);
            }

            $photo->delete();

            return redirect()->route('show-album',[$album_id])->with('success', 'Foto eliminata con successo');

        } catch (\Exception $e) {

            Log::error('Errore durante l\'eliminazione della foto: ' . $e->getMessage());

            return redirect()->route('index-album')->with('error', 'Errore durante l\'eliminazione della foto');
        }
    }

    private function photoValidator(Request $request): void
    {
        $validator = Validator::make($request->all(), [

            'photos.*' => 'required|image|mimes:jpeg,png,jpg,webp'
        ]);
        if ($validator->fails()) {

           throw new Exception('Formato di almeno un file errato');

        }
    }

    private function createUniqueFilePathNames($uploadedPhoto): array
    {
        $timestamp = time();
        $fileName = pathinfo($uploadedPhoto->getClientOriginalName(), PATHINFO_FILENAME);
        $originalName = $fileName . '_' . $timestamp . '.webp';
        $fhdName = $fileName . '_FHD_' . $timestamp . '.webp';

        return [
            'fileName' => $fileName,
            'photo' => $originalName,
            'photo_fhd' => $fhdName,
        ];
    }

    private function createIfNotExistsPhotosDirectories(string $albumSlug): array
    {
        $originalPath = public_path( AlbumManager::ALBUM_DIRECTORY. '/'. $albumSlug . '/' . PhotoManager::original_directory);
        if (!file_exists($originalPath)) {
            mkdir($originalPath, 0777, true);
        }
        $fhdPath = public_path(AlbumManager::ALBUM_DIRECTORY. '/'. $albumSlug . '/' . PhotoManager::fhd_directory);
        if (!file_exists($fhdPath)) {
            mkdir($fhdPath, 0777, true);
        }
        return [
            'originalPath' => $originalPath,
            'fhdPath' => $fhdPath,
        ];
    }

    private function createPhotoPathsFromDb($photo, $album): array
    {
        $directory = AlbumManager::ALBUM_DIRECTORY.'/';

        $path4k = public_path($directory . $album->slug . '/original/' . $photo->photo);

        $pathFHD = public_path($directory . $album->slug . '/fhd/' . $photo->photo_fhd);

        return ['path4k' => $path4k,
                'pathFHD' => $pathFHD];
    }

    private function convertAndSaveImage($directories, $paths, $image, $imageFHD): void
    {
        $path1 = $directories['originalPath'] . '/' . $paths['photo'];
        imagewebp($image, $path1);
        $path2 = $directories['fhdPath'] . '/' . $paths['photo_fhd'];
        imagewebp($imageFHD, $path2);
    }
}
