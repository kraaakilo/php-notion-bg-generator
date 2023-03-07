<?php

namespace App\Services;

class ImageResponse
{
    public function renderFromPath(string $path): void
    {
        $background = imagecreatefrompng($path);
        header('Content-Type: image/png');
        imagepng($background);
    }

    public function renderFromGDImage(\GdImage $image): void
    {
        header('Content-Type: image/png');
        imagepng($image);
    }
}