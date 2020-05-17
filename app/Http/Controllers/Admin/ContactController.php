<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ContactContract;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\PaginateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

    /**
     * Display a listing of the resource.
     *
     * @param PaginateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(PaginateRequest $request)
    {
        try {
            $this->data['getContact'] = $this->service->getContact($request);
            $this->result['getContact'] = $this->Ok($this->data['getContact']);
        } catch (QueryException $e) {
            Log::error("Error, get contacts:" . $e->getMessage());
            $this->result['getContact'] = $this->ServerError("Error , contacts are not get from server");
        }catch (ModelNotFoundException $e){
            $this->result['getContact'] = $this->NotFound("Contacts not found");
        }

        return $this->result['getContact'];

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        try {
            $this->service->addContact($request);
            $this->result['addContact'] = $this->Created('Contact is successfully added');
        }catch (QueryException $e){
            Log::error("Error, add contact:" . $e->getMessage());
            $this->result['addContact']  = $this->ServerError("Error ,contact can't added on server!");
        }
        return $this->result['addContact'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $this->data['editContact'] = $this->service->findContact($id);
            $this->result['editContact'] = $this->Ok($this->data['editContact']);
        } catch (QueryException $e) {
            Log::error("Error, edit contact:" . $e->getMessage());
            $this->result['editContact'] = $this->ServerError("Error, data for edit contact can't get from server");
        }catch (ModelNotFoundException $e){
            $this->result['editContact'] = $this->NotFound("Contact not found");
        }

        return $this->result['editContact'];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->service->modifyContact($request, $id);
            $this->result['modifyContact'] = $this->NoContent();
        }catch (QueryException $e){
            Log::error("Error, contact is not modify:" . $e->getMessage());
            $this->result['modifyContact']  = $this->ServerError("Error ,contact is not modify");
        }catch (ModelNotFoundException $e){
            $this->result['modifyContact'] = $this->NotFound("Contact not found");
        }
        return $this->result['modifyContact'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->service->deleteContact($id);
            $this->result['deleteContact'] = $this->NoContent();
        } catch (QueryException $e) {
            Log::error("Error, contact can't deleted:" . $e->getMessage());
            $this->result['deleteContact'] = $this->ServerError("Error, contact can't deleted");
        }catch (ModelNotFoundException $e){
            $this->result['deleteContact'] = $this->NotFound("Contact not found");
        }
        return $this->result['deleteContact'];
    }
}
