<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Models\Categories;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Contracts\CategoriesContract;
class CategoriesController extends ApiController
{

    public function __construct(CategoriesContract $service)
    {
        parent::__construct($service);
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        $this->data['getCategories'] = $this->service->getAllCategories($id);
        try {
            $this->result['getCategories'] = $this->Ok($this->data['getCategories']);
        } catch (QueryException $e) {
            Log::error("Error, get categories:" . $e->getMessage());
            $this->result['getCategories'] = $this->ServerError("Error , categories are not got from server!");
        }catch (ModelNotFoundException $e){
            $this->result['getCategories'] = $this->NotFound("Categories not found");
        }

        return $this->result['getCategories'];
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
    public function store(CategoriesRequest $request)
    {
        try {
            $this->service->addCategory($request);
            $this->result['addCategory'] = $this->Created('Category is successfully added');
        }catch (QueryException $e){
            Log::error("Error, add category:" . $e->getMessage());
            $this->result['addCategory']  = $this->ServerError("Error , category can't added on server!");
        }
        return $this->result['addCategory'];
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
     * @param $cat
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($cat, $id)
    {
        try {
            $this->data['editCategory'] = $this->service->getCategory($cat,$id);
            $this->result['editCategory'] = $this->Ok($this->data['editCategory']);
        } catch (QueryException $e) {
            Log::error("Error, edit category:" . $e->getMessage());
            $this->result['editCategory'] = $this->ServerError("Error, data for edit category can't get from server");
        }catch (ModelNotFoundException $e){
            $this->result['editCategory'] = $this->NotFound("Category not found");
        }

        return $this->result['editCategory'];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, $id)
    {
        try {
            $this->service->modifyCategory($request, $id);
            $this->result['modifyCategory'] = $this->NoContent();
        }catch (QueryException $e){
            Log::error("Error, category is not modify:" . $e->getMessage());
            $this->result['modifyCategory']  = $this->ServerError("Error , category is not modify");
        }catch (ModelNotFoundException $e){
            $this->result['modifyCategory'] = $this->NotFound("Category not found");
        }
        return $this->result['modifyCategory'];
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
            $this->service->deleteCategory($id);
            $this->result['deleteCategory'] = $this->NoContent();
        } catch (QueryException $e) {
            Log::error("Error, category can't deleted:" . $e->getMessage());
            $this->result['deleteCategory'] = $this->ServerError("Error, category can't deleted");
        }catch (ModelNotFoundException $e){
            $this->result['deleteCategory'] = $this->NotFound("Category not found");
        }
        return $this->result['deleteCategory'];
    }
}
