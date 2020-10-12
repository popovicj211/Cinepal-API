<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\RoleContract;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoleController extends ApiController
{
    public function __construct(RoleContract $service)
    {
        parent::__construct($service);
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $this->data['getRoles'] = $this->service->getRoles();
            $this->result['getRoles'] = $this->Ok($this->data['getRoles']);
        } catch (QueryException $e) {
            Log::error("Error, get roles:" . $e->getMessage());
            $this->result['getRoles'] = $this->ServerError("Error , roles are not get from server");
        }catch (ModelNotFoundException $e){
            $this->result['getRoles'] = $this->NotFound("Roles not found");
        }

        return $this->result['getRoles'];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        try {
            $this->service->addRole($request);
            $this->result['addRole'] = $this->Created('Role is successfully added');
        }catch (QueryException $e){
            Log::error("Error, add role:" . $e->getMessage());
            $this->result['addRole']  = $this->ServerError("Error ,role can't added on server!");
        }
        return $this->result['addRole'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $this->data['showRole'] = $this->service->findRole($id);
            $this->result['showRole'] = $this->Ok($this->data['showRole']);
        } catch (QueryException $e) {
            Log::error("Error, show role:" . $e->getMessage());
            $this->result['showRole'] = $this->ServerError("Error, data for show role can't get from server");
        }catch (ModelNotFoundException $e){
            $this->result['showRole'] = $this->NotFound("Role not found");
        }

        return $this->result['showRole'];
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
            $this->data['editRole'] = $this->service->findRole($id);
            $this->result['editRole'] = $this->Ok($this->data['editRole']);
        } catch (QueryException $e) {
            Log::error("Error, edit role:" . $e->getMessage());
            $this->result['editRole'] = $this->ServerError("Error, data for edit role can't get from server");
        }catch (ModelNotFoundException $e){
            $this->result['editRole'] = $this->NotFound("Role not found");
        }

        return $this->result['editRole'];
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        try {
            $this->service->modifyRole($request, $id);
            $this->result['modifyRole'] = $this->NoContent();
        }catch (QueryException $e){
            Log::error("Error, role is not modify:" . $e->getMessage());
            $this->result['modifyRole']  = $this->ServerError("Error ,role is not modify");
        }catch (ModelNotFoundException $e){
            $this->result['modifyRole'] = $this->NotFound("Role not found");
        }
        return $this->result['modifyRole'];
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
            $this->service->deleteRole($id);
            $this->result['deleteRole'] = $this->NoContent();
        } catch (QueryException $e) {
            Log::error("Error, role can't deleted:" . $e->getMessage());
            $this->result['deleteRole'] = $this->ServerError("Error, role can't deleted");
        }catch (ModelNotFoundException $e){
            $this->result['deleteRole'] = $this->NotFound("Role not found");
        }
        return $this->result['deleteRole'];
    }
}
