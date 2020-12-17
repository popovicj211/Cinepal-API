<?php


namespace App\Helpers;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ImageResize
{

    public static function base64ToFile($base64, $path, $width = 400, $height = 400)
    {
        $imageCode = substr($base64, strpos($base64, ',') + 1);
        $imageName = md5(rand(11111, 99999)) . '_' . time() . '.jpg';
        $path = $path . $imageName;
        $input = File::put($path, base64_decode($imageCode));
        $image = Image::make($path)->resize($width, $height);
        $result = $image->save($path);

        return $imageName;
    }

}
