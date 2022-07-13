<?php

namespace Modules\Dashboard\Entities;


use Intervention\Image\Facades\Image;

class ImageFileUpload
{
    protected static $sizes = ['64', '128', '300'];

    public static function upload($file)
    {
        $filename = uniqid();
        $extension = $file->getClientOriginalExtension();
        $dir = 'app/public/';
        $file->move(storage_path($dir), $filename . '.' . $extension);
        $path = $dir . '/' . $filename . '.' . $extension;
        $images = self::resize(storage_path($path, $dir ,$filename, $extension));
        return $images;
    }

    private static function resize($src, $dir, $filename, $extension)
    {
        $src = Image::make($src);
        $img['original'] = $dir . $filename . $extension;
        foreach (self::$sizes as $size){
            $img[$size] = $dir . $filename . '_' . $size . '.' . $extension;
            $src->resize($size, null, function ($aspect){
                $aspect->aspectRatio();
            })->save(storage_path($dir) .$filename . '_' . $size . '.' . $extension);
        }
        return $img;
    }

}
