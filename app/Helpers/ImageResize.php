<?php


namespace App\Helpers;
use Intervention\Image\Facades\Image;

class ImageResize
{
    private $hasFile;
    private $file;
    private $width;
    private $height;
    private $destroy;
    /**
     * @param mixed $hasFile
     */
    public function setHasFile($hasFile): void
    {
        $this->hasFile = $hasFile;
    }

    /**
     * @return mixed
     */
    public function getHasFile()
    {
        return $this->hasFile;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file): void
    {
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $destroy
     */
    public function setDestroy($destroy): void
    {
        $this->destroy = $destroy;
    }

    /**
     * @return mixed
     */
    public function getDestroy()
    {
        return $this->destroy;
    }


    public function resizeImg($width, $height ){
        if($this->hasFile) {

            $image = $this->file;
            $filename = $image->getClientOriginalName();
            $newFilename = time()."_".$filename;
            $alt =  strstr( $newFilename,  '.'  , true);
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize($width, $height);
            $path = 'assets/images/movies/'.$newFilename;
            $image_resize->save(public_path($path));
            return array( 'link' => $newFilename , 'alt' => $alt );
        }
    }


}
