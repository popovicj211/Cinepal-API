<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use App\Http\Requests\PaginateRequest;
use App\Http\Requests\UserAdminRequest;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends ApiController
{

    public function __construct( UserService $service)
    {
        parent::__construct( $service);
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
            $this->data['getUsers'] = $this->service->getUsers($request);
            $this->result['getUsers'] = $this->Ok($this->data['getUsers']);
        } catch (QueryException $e) {
            Log::error("Error, get users:" . $e->getMessage());
            $this->result['getUsers'] = $this->ServerError("Error , users are not get from server");
        }catch (ModelNotFoundException $e){
            $this->result['getUsers'] = $this->NotFound("Users not found");
        }

      return $this->result['getUsers'];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserAdminRequest $request)
    {
        try {
            $this->service->addUser($request);
            $this->result['addUser'] = $this->Created('User is successfully added');
        }catch (QueryException $e){
            Log::error("Error, add user:" . $e->getMessage());
            $this->result['addUser']  = $this->ServerError("Error ,user can't added on server!");
        }
        return $this->result['addUser'];
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
            $this->data['showUser'] = $this->service->findUser($id);
            $this->result['showUser'] = $this->Ok($this->data['showUser']);
        } catch (QueryException $e) {
            Log::error("Error, show user:" . $e->getMessage());
            $this->result['showUser'] = $this->ServerError("Error, data for show user can't get from server");
        }catch (ModelNotFoundException $e){
            $this->result['showUser'] = $this->NotFound("User not found");
        }
        return $this->result['showUser'];
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
            $this->data['editUser'] = $this->service->findUser($id);
            $this->result['editUser'] = $this->Ok($this->data['editUser']);
        } catch (QueryException $e) {
            Log::error("Error, edit user:" . $e->getMessage());
            $this->result['editUser'] = $this->ServerError("Error, data for edit user can't get from server");
        }catch (ModelNotFoundException $e){
            $this->result['editUser'] = $this->NotFound("User not found");
        }
        return $this->result['editUser'];
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
            $this->service->modifyUser($request, $id);
            $this->result['modifyUser'] = $this->NoContent();
        }catch (QueryException $e){
            Log::error("Error, user is not modify:" . $e->getMessage());
            $this->result['modifyUser']  = $this->ServerError("Error ,user is not modify");
        }catch (ModelNotFoundException $e){
            $this->result['modifyUser'] = $this->NotFound("User not found");
        }
        return $this->result['modifyUser'];
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
            $this->service->deleteUser($id);
            $this->result['deleteUser'] = $this->NoContent();
        } catch (QueryException $e) {
            Log::error("Error, user can't deleted:" . $e->getMessage());
            $this->result['deleteUser'] = $this->ServerError("Error, user can't deleted");
        }catch (ModelNotFoundException $e){
            $this->result['deleteUser'] = $this->NotFound("User not found");
        }
        return $this->result['deleteUser'];
    }
}
