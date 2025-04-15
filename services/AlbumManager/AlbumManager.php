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
    const BASE_DIRECTORY = 'AK-Photos';

    /**
     * @throws \Exception
     */
    public function store(Request $request) :RedirectResponse
    {
        try {
            $this->albumValidator($request);

            $type = $request->input('type');

            $coverImageUploaded = $request->file('cover');

            $coverImageOriginal = imagecreatefromstring(file_get_contents($coverImageUploaded->getRealPath()));

            $coverImageFHD = Helpers::resizeToFullHd($coverImageOriginal);

            $coverSlugAndName = $this->createFileSlugAndName($request->input('location'));

            $album_directory = $this->getAlbumDirectory($type, $coverSlugAndName['fileSlug']);

            $coverPath = $album_directory . '/' . $coverSlugAndName['fileNameWebP'];

            imagewebp($coverImageFHD, $coverPath, 100);

            $maxOrder = Album::max('order');

            $order = $maxOrder ? $maxOrder + 1 : 1;

            $album = new Album;
            $album->slug = $coverSlugAndName['fileSlug'];
            $album->title = $request->input('title');
            $album->location = $request->input('location');
            $album->cover = $coverSlugAndName['fileNameWebP'];
            $album->order = $order;
            $album->type = $type;
            $album->save();

            $imagesToDestroy = Helpers::groupImagesToDestroy($coverImageOriginal, $coverImageFHD);
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
            $type = $album->type;

            $slugAndName = $this->createFileSlugAndName($request->input('location'));

            if ($request->hasFile('cover')) {

                $oldCoverPath = public_path('AK-Photos/' . $type . '/' . $album->slug. '/' . $album->cover);

                if(file_exists($oldCoverPath)) {
                    unlink($oldCoverPath);
                }

                $album->cover = $slugAndName['fileNameWebP'];

                $uploadedCover = $request->file('cover');

                $imageOriginal = imagecreatefromstring(file_get_contents($uploadedCover->getRealPath()));

                $imageFHD = Helpers::resizeToFullHd($imageOriginal);

                // Ensure the directory exists, create if it doesn't
                $directory = public_path(albumManager::BASE_DIRECTORY. '/' . $type);

                $album_directory = public_path(albumManager::BASE_DIRECTORY . '/' . $type .'/'. $album->slug);

                if (!file_exists($directory)) {
                    mkdir($directory, 0777, true);
                }

                // Save image in WebP format
                $path = $album_directory . '/' .$slugAndName['fileNameWebP'];
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
            $album = Album::with('Photo')->findOrFail($album_id);

            $basePath = public_path(AlbumManager::BASE_DIRECTORY . '/' . $album->type . '/'. $album->slug);

            // Delete album images (cover, owner, location) from filesystem
            $filesToDelete = [
                $album->cover,
                $album->detail->owner_image ?? null,
                $album->detail->location_image ?? null,
                $album->detail->owner_image_fhd ?? null,
                $album->detail->location_image_fhd ?? null,
            ];

            foreach ($filesToDelete as $file) {
                if ($file) {
                    $fullPath = $basePath . '/' . $file;
                    if (file_exists($fullPath)) {
                        unlink($fullPath);
                    }
                }
            }

            // Retrieve and delete photos related to album from filesystem and DB
            $photos = $album->photo;

            if ($album->photo && $album->photo->isNotEmpty()) {

                foreach ($photos as $photo) {

                    $photoPathFHD = public_path($basePath . '/' . PhotoManager::fhd_directory . '/' . $photo->photo_fhd);
                    if(file_exists($photoPathFHD)) {
                        unlink($photoPathFHD);
                    }
                    $photoPathOriginal = public_path($basePath . '/' . PhotoManager::original_directory . '/' . $photo->photo);
                    if(file_exists($photoPathOriginal)) {
                        unlink($photoPathOriginal);
                    }
                    $photo->delete();
                }
            }

            // Delete all album folders
            $albumPhotosPathFHD = public_path($basePath . '/' . PhotoManager::fhd_directory);

            if (is_dir($albumPhotosPathFHD) && count(scandir($albumPhotosPathFHD)) <= 2) {
                rmdir($albumPhotosPathFHD);
            }

            $albumPhotosPathOriginal = public_path($basePath . '/' . PhotoManager::original_directory);

            if (is_dir($albumPhotosPathOriginal) && count(scandir($albumPhotosPathOriginal)) <= 2) {
                rmdir($albumPhotosPathOriginal);
            }

            if (is_dir($basePath) && count(scandir($basePath)) <= 2) {
                rmdir($basePath);
            }

            if ($album->detail) {
                $album->detail->delete();
            }

            $album->delete();

            return redirect()->route('index-album')->with('success', 'Album cancellato con successo');
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
            'type' => 'required|in:weddings,locations,vendors'
        ]);

        if ($validator->fails()) {
            throw new Exception('Formato del file errato');
        }
    }

    private function getAlbumDirectory(string $type, string $slug): string
    {
        $baseDirectory = public_path(AlbumManager::BASE_DIRECTORY . '/' . $type);

        if (!file_exists($baseDirectory)) {
            mkdir($baseDirectory, 0777, true);
        }

        $albumDirectory = $baseDirectory . '/' . $slug;

        if (!file_exists($albumDirectory)) {
            mkdir($albumDirectory, 0777, true);
        }

        return $albumDirectory;
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
