<?php
require(__DIR__."/../vendor/autoload.php");
use App\Services\ImageResponse;
use App\Services\WriteTextOnImageService;


$text = getFullString($_SERVER["REQUEST_URI"]);
$imageResponse = new ImageResponse();
$writer = new WriteTextOnImageService();
$imageResponse->renderFromGDImage($writer->write($text));


