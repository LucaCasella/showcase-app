<?php

namespace Service\AlbumManager;

use App\Models\Album;
use DateTime;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mockery\Exception;
use Service\Helpers;
use Service\PhotoManager\PhotoManager;

class AlbumManager implements AlbumManagerContract
{

    const ALBUM_DIRECTORY = 'albums';

    /**
     * @throws \Exception
     */
    public function store(Request $request) :RedirectResponse
    {
        try {
            // Input validation

            $this->albumValidator($request);

            // Upload image
            $uploadedCover = $request->file('cover');

            $imageOriginal = imagecreatefromstring(file_get_contents($uploadedCover->getRealPath()));

            $imageFHD = Helpers::resizeToFullHd($imageOriginal);

            $slugAndName = $this->createFileSlugAndName($request->input('location'));

            // Ensure the directory exists, otherwise is created
            $directory = public_path(AlbumManager::ALBUM_DIRECTORY);

            $album_directory = public_path(albumManager::ALBUM_DIRECTORY . '/' . $slugAndName['fileSlug']);

            if (!file_exists($directory) ) {

                mkdir($directory, 0777, true);

            }
            if(!file_exists($album_directory)) {

                mkdir($album_directory, 0777, true);
            }

            // Save image in WebP format
            $path = $album_directory . '/' . $slugAndName['fileNameWebP'];

            imagewebp($imageFHD, $path, 100);


            $maxOrder = Album::max('order');
            $order = $maxOrder ? $maxOrder + 1 : 1;


            $album = new Album;
            $album->slug = $slugAndName['fileSlug'];
            $album->title = $request->input('title');
            $album->location = $request->input('location');
            $album->cover = $slugAndName['fileNameWebP'];
            $album->order = $order;
            $album->save();

            $imagesToDestroy = Helpers::groupImagesToDestroy($imageOriginal, $imageFHD);
            Helpers::freeMemoryFromImages($imagesToDestroy);

            return redirect()->route('index-album')->with('success', 'Album creato con successo');
        } catch (Exception $e) {
            return redirect()->route('create-album')->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, $album_id): RedirectResponse
    {
        try {

            $this->albumValidator($request);

            $album = Album::findOrFail($album_id);

            $slugAndName = $this->createFileSlugAndName($request->input('location'));

            if ($request->hasFile('cover')) {

                $oldCoverPath = public_path('albums/'.$album->slug.'/'.$album->cover);

                if(file_exists($oldCoverPath)) {

                    unlink($oldCoverPath);
                }

                $album->cover = $slugAndName['fileNameWebP'];

                $uploadedCover = $request->file('cover');

                $imageOriginal = imagecreatefromstring(file_get_contents($uploadedCover->getRealPath()));

                $imageFHD = Helpers::resizeToFullHd($imageOriginal);


                // Ensure the directory exists, create if it doesn't
                $directory = public_path(albumManager::ALBUM_DIRECTORY);

                $album_directory = public_path(albumManager::ALBUM_DIRECTORY .'/'. $album->slug);

                if (!file_exists($directory)) {
                    mkdir($directory, 0777, true);
                }

                // Save image in WebP format
                $path = $album_directory .'/'.$slugAndName['fileNameWebP'];
                imagewebp($imageFHD, $path);

                // Free memory
                if ($imageOriginal && $imageFHD) {
                    imagedestroy($imageOriginal);
                    imagedestroy($imageFHD);
                }
            }

            $updated_at = new DateTime();
            $updated_at->modify('+1 hour')->format('Y-m-d H:i:s');

            $album->title = $request->title;
            $album->location = $request->location;
            $album->updated_at = $updated_at;


            $album->save();

            return redirect()->route('index-album')->with('success', 'Album modificato con successo');
        } catch (Exception $e) {
            return redirect()->route('create-album')->with('error', $e->getMessage());
        }
    }

    public function delete(Request $request, $album_id): RedirectResponse
    {
        try {
            // Retrieve selected album
            $album = Album::with('Photo')->findOrFail($album_id);

            // Delete album cover from filesystem
            $coverPath = public_path(self::ALBUM_DIRECTORY . '/'. $album->slug . '/' . $album->cover);

            if(file_exists($coverPath)) {
                unlink($coverPath);
            }

            // Retrieve and delete photos related to album from filesystem and DB
            $photos = $album->photo;

            if ($album->photo && $album->photo->isNotEmpty()) {

                foreach ($photos as $photo) {

                    $photoPathFHD = public_path(self::ALBUM_DIRECTORY . '/' . $album->slug . '/' . PhotoManager::fhd_directory . '/' . $photo->photo_fhd);
                    if(file_exists($photoPathFHD)) {
                        unlink($photoPathFHD);
                    }
                    $photoPathOriginal = public_path(self::ALBUM_DIRECTORY . '/' . $album->slug . '/' . PhotoManager::original_directory . '/' . $photo->photo);
                    if(file_exists($photoPathOriginal)) {
                        unlink($photoPathOriginal);
                    }
                    $photo->delete();
                }
            }

            // Delete all album folders
            $albumPhotosPathFHD = public_path(self::ALBUM_DIRECTORY . '/' . $album->slug. '/' . PhotoManager::fhd_directory);

            if (is_dir($albumPhotosPathFHD) && count(scandir($albumPhotosPathFHD)) <= 2) {

                rmdir($albumPhotosPathFHD);
            }
            $albumPhotosPathOriginal = public_path(self::ALBUM_DIRECTORY . '/' . $album->slug . '/' . PhotoManager::original_directory);

            if (is_dir($albumPhotosPathOriginal) && count(scandir($albumPhotosPathOriginal)) <= 2) {

                rmdir($albumPhotosPathOriginal);
            }

            $albumFolderPath = public_path(self::ALBUM_DIRECTORY . '/' . $album->slug);

            if (is_dir($albumFolderPath) && count(scandir($albumFolderPath)) <= 2) {

                rmdir($albumFolderPath);
            }

            $album->delete();

            return redirect()->route('index-album')->with('success', 'Album cancellato con succeso');

        } catch (Exception $e) {

            return redirect()->route('index-album')->with('error', $e->getMessage());
        }

    }

    private function albumValidator (Request $request): void
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'location' => 'required',
            'cover' => 'image|mimes:jpeg,png,jpg,webp',
        ]);

        if ($validator->fails()) {

            throw new Exception('Formato del file errato');
        }
    }
    function createFileSlugAndName($location): array
    {

        $timestamp = time();

        $rowFileSlug = Str::slug($location);

        $fileSlug = $rowFileSlug . '_' . $timestamp;

        $fileNameWebP = $fileSlug . '.webp';

        return [
            'fileSlug' => $fileSlug,
            'fileNameWebP' => $fileNameWebP
        ];
    }
}
