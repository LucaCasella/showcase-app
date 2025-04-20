<?php

namespace Service;

use GdImage;

class Helpers
{
    static function resizeToFullHd($imageOriginal)
    {
        // Get original image dimensions
        $originalWidth = imagesx($imageOriginal);

        $originalHeight = imagesy($imageOriginal);

        // Downgrade quality to FHD taking care of image orientation
        if ($originalHeight > $originalWidth) {
            $fhdHeight = 1920;
            $fhdWidth = intval(($originalWidth / $originalHeight) * $fhdHeight);
        } else {
            $fhdWidth = 1920;
            $fhdHeight = intval(($originalHeight / $originalWidth) * $fhdWidth);
        }
        $imageFHD = imagecreatetruecolor($fhdWidth, $fhdHeight);

        imagecopyresampled($imageFHD, $imageOriginal, 0, 0, 0, 0, $fhdWidth, $fhdHeight, $originalWidth, $originalHeight);

        return $imageFHD;
    }

    static function freeMemoryFromImage(GDImage $images): void
    {
        imagedestroy($images);
    }

    static function freeMemoryFromImages(array|GdImage $images): void
    {
        foreach ($images as $image) {
            imagedestroy($image);
        }
    }

    static function groupImagesToDestroy(...$images): array
    {
        $gdImages = [];
        foreach ($images as $image) {
            $gdImages[] = $image;
        }
        return $gdImages;
    }

    public static function deleteImageIfExists(?string $path): void //todo: low - try to use this in other images deletion process
    {
        if (!$path) return;

        if (file_exists($path) && is_file($path)) {
            unlink($path);
        }
    }

}



