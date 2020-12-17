<?php


namespace App\Helpers;
use Illuminate\Support\Facades\Storage;

  class ImageValidator
{

      public function __construct()
      {

      }

     public  function exstensionImageValidator($typeImg ){
          $imageTypes = ['image/jpeg','image/jpg','image/png'];
          $message = "";
          $ok = true;
          $ext = null;
        if(!in_array($typeImg , $imageTypes)){
            $message = "This image extension is not allowed ";
             $ok = null;
        }else{
              switch ($imageTypes){
                  case "image/jpeg": $ext = ".jpeg";
                    break;
                  case "image/jpg": $ext = ".jpg";
                      break;
                  case "image/png": $ext = ".png";
                      break;
                  default: $ext = null;
              }
        }
        return  array("ok" =>  $ok,"message" => $message , "exstension" => $ext);
    }


    public  function sizeImageValidator($size , $sizeMax){
        $resIA = null;
        $message = "";
        $ok = true;
            if(intval($size) > $sizeMax){
                $message = "Size of image is greater than ".$sizeMax;
                $ok = null;
            }
        return array("ok" =>  $ok,"message" => $message);
    }

/*
public function getImageDecoded($base64_image, $arrayErrors ){
    $arrImgData = null;
    $message = "";
    $image = null;
    if(isset($base64_image)) {
        if (!preg_match('/^data:image\/(\w+);base64,/', $base64_image)) {
            $imageCode = substr($base64_image, strpos($base64_image, ',') + 1);
            $decodedImage = base64_decode($imageCode);

           if ($decodedImage->isValid()) {
                $nameImg = $decodedImage->getClientOriginalName();
                $tmp_nameImg = $decodedImage->getRealPath();
                $sizeImg = $decodedImage->getMaxFilesize();
                $typeImg = $decodedImage->getClientMimeType();
                $image = array(
                    "fullImage" => $decodedImage,
                    "nameImg" => $nameImg,
                    "tmpImg" => $tmp_nameImg,
                    "sizeImg" => $sizeImg,
                    "typeImg" => $typeImg
                );
            } else {

                $message = "Decoded image file is not valid";

            }
        } else {

           $message = "Encoded image file is not valid";
        }
    }else{

       $message = "Encoded image file is not sended";

    }
    return array( "image" => array($image) , "message" => $this->errorsValidateMesasge($message , $arrayErrors));
}*/

      public function getImageDecoded($base64_image, $name , $maxSize,$arrayErrors ){
          $arrImgData = null;
          $message = "";
          $image = null;
          $nameImg = strtolower($name);
          if(isset($base64_image)) {
              if (!preg_match('/^data:image\/(\w+);base64,/', $base64_image)) {
                  $imageCode = substr($base64_image, strpos($base64_image, ',') + 1);
                  $decodedImage = base64_decode($imageCode);

                //  $image_parts = explode(";base64,", $base64_image);
                 // $image_type_aux = explode("image/", $image_parts[0]);
                 // $image_type = $image_type_aux[1];
                 // $decodedImage = base64_decode($image_parts[1]);
                  //   file_put_contents($file, $decodedImage);
                  Storage::disk('local')->put('upload/'.uniqid().'.jpg',$decodedImage);

                  $decodedImageArr = explode(";", $decodedImage);
                  $mimeType= explode(':', $decodedImageArr[0]);
                $isMimeTypeValid = $this->exstensionImageValidator($mimeType[1]);
                if(isset($isMimeTypeValid['ok'])) {
                    $nameImgExt = $nameImg.$isMimeTypeValid['exstension'];
                    $pathImage = storage_path('upload/'. $nameImgExt);
                    Storage::disk('local')->put($pathImage, $decodedImage);
                    if (Storage::disk('local')->has($pathImage)) {
                        $getImage = Storage::disk('local')->get($pathImage);
                        $tmp_nameImg = Storage::disk('local')->path($pathImage);
                        $sizeImg = Storage::disk('local')->size($pathImage);
                        $typeImg = Storage::disk('local')->mimeType($pathImage);

                      $isSizeValid = $this->sizeImageValidator( $sizeImg,  $maxSize);
                        if(!isset($isSizeValid['ok'])){
                           $message = $isSizeValid['message'];
                        }
                        $image = array(
                            "fullImg" =>  $getImage,
                            "nameImg" => $nameImgExt,
                            "tmpImg" => $tmp_nameImg,
                            "sizeImg" => $sizeImg,
                            "typeImg" => $typeImg
                        );
                    } else {
                        $message = "Decoded image file not found";
                    }
                }else{
                    $message =  $isMimeTypeValid['message'];
                }
              } else {
                  $message = "Encoded image file is not valid";
              }
          }else{
              $message = "Encoded image file not found";
          }
          return array( "image" => array($image) , "message" => $this->errorsValidateMesasge($message , $arrayErrors));
      }

public function errorsValidateMesasge($message = null , $arrayErrors = []){
          $status = true;
          if(isset($message)){
              $status = false;
              array_push($arrayErrors, $message );
          }

    return  array("errors" => $arrayErrors, "isValid" => $status);
  }



}
