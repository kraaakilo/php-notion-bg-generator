<?php

function resource_path($path = null): string
{
    return __DIR__ . "/../../resources/" . $path;
}

function getFullString(string $string): string
{
    return str_replace("/", "", urldecode($string));
}