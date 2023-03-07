<?php

namespace App\Services;
class WriteTextOnImageService
{
    public function center(string $text, int $fontSize): array
    {
        $image_path = resource_path("images/sample.png");
        list($image_width, $image_height) = getimagesize($image_path);
        $police_path = resource_path("fonts/ARIAL.ttf");
        $bbox = imagettfbbox($fontSize, 0, $police_path, $text);
        $text_width = abs($bbox[4] - $bbox[0]);
        $text_height = abs($bbox[5] - $bbox[1]);
        $text_x = ($image_width - $text_width) / 2;
        $text_y = ($image_height + $text_height) / 2;
        return [$text_x, $text_y];
    }

    public function write(string $text): \GdImage
    {
        $background = imagecreatefrompng(resource_path("images/sample.png"));
        $font = resource_path("fonts/ARIAL.ttf");
        $fontSize = 90;
        $coords = $this->center($text, $fontSize);
        $textColor = imagecolorallocate($background, 0, 0, 0);
        imagettftext($background, $fontSize, 0, $coords[0], $coords[1], $textColor, $font, $text);
        return $background;
    }
}