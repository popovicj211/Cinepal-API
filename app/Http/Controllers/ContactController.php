<?php

namespace App\Http\Controllers;

use App\Contracts\ContactContract;
use App\Http\Requests\ContactRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class ContactController extends ApiController
{

    public function __construct(ContactContract $service)
    {
        parent::__construct($service);
        $this->service = $service;
    }

    public function sendContact(ContactRequest $request)
    {
        try {
            $this->service->addContact($request);
            $this->result['addContact'] = $this->Created('Contact data is successfully send');
        }catch (QueryException $e){
            Log::error("Error, send contact:" . $e->getMessage());
            $this->result['addContact']  = $this->ServerError("Error , sent contact data can't added on server!");
        }
        return $this->result['addContact'];
    }
}
