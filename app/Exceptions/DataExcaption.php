<?php


namespace App\Exceptions;
use Exception;
use Illuminate\Support\Facades\Log;
class DataExcaption extends Exception
{
   /* private $data;
    private $ok;
    private $notOkClient;
    private $notOkServer;
    private $result = null;*/
  /*  public function __construct($data , $ok , $notOkClient, $notOkServer)
    {
              parent::__construct();
             $this->data = $data;
             $this->ok = $ok;
             $this->notOkClient = $notOkClient;
             $this->notOkServer = $notOkServer;
    }*/

      public static function isValidData($data , $ok , $notOkClient , $notOkServer){
                try {
                    if ($data) {
                        $result = $ok;
                    } else {
                        $result = $notOkClient;
                    }
                }catch (Exception $e){
                    Log::error($e->getMessage());
                    $result = $notOkServer;
                }
           return $result;
      }

}


