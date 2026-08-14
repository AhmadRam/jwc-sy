<?php

if (! function_exists('vasset')) {
    function vasset(string $path): string
    {
        $fullPath = public_path($path);
        $version = file_exists($fullPath) ? filemtime($fullPath) : time();

        return asset($path) . '?v=' . $version;
    }
}