<?php

namespace Service;

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
}
