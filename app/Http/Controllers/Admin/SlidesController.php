<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\SlidesContract;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\SlidesRequest;
use App\Models\Slides;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class SlidesController extends ApiController
{
    public function __construct(SlidesContract $service)
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
            $this->data['getSlides'] = $this->service->getSlides();
            $this->result['getSlides'] = $this->Ok($this->data['getSlides']);
        } catch (QueryException $e) {
            Log::error("Error, get slides:" . $e->getMessage());
            $this->result['getSlides'] = $this->ServerError("Error , slides are not get from server");
        }catch (ModelNotFoundException $e){
            $this->result['getSlides'] = $this->NotFound("Slides not found");
        }

        return $this->result['getSlides'];
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
    public function store(SlidesRequest $request)
    {
        try {
            $this->service->addSlide($request);
            $this->result['addSlide'] = $this->Created('Slide is successfully added');
        }catch (QueryException $e){
            Log::error("Error, add slide:" . $e->getMessage());
            $this->result['addSlide']  = $this->ServerError("Error ,slide can't added on server!");
        }
        return $this->result['addSlide'];
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
            $this->data['editSlide'] = $this->service->findSlide($id);
            $this->result['editSlide'] = $this->Ok($this->data['editSlide']);
        } catch (QueryException $e) {
            Log::error("Error, edit slide:" . $e->getMessage());
            $this->result['editSlide'] = $this->ServerError("Error, data for edit slide can't get from server");
        }catch (ModelNotFoundException $e){
            $this->result['editSlide'] = $this->NotFound("Slide not found");
        }

        return $this->result['editSlide'];
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
            $this->service->modifySlide($request, $id);
            $this->result['modifySlide'] = $this->NoContent();
        }catch (QueryException $e){
            Log::error("Error, slide is not modify:" . $e->getMessage());
            $this->result['modifySlide']  = $this->ServerError("Error ,slide is not modify");
        }catch (ModelNotFoundException $e){
            $this->result['modifySlide'] = $this->NotFound("Slide not found");
        }
        return $this->result['modifySlide'];
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
            $this->service->deleteSlide($id);
            $this->result['deleteSlide'] = $this->NoContent();
        } catch (QueryException $e) {
            Log::error("Error, slide can't deleted:" . $e->getMessage());
            $this->result['deleteSlide'] = $this->ServerError("Error, slide can't deleted");
        }catch (ModelNotFoundException $e){
            $this->result['deleteSlide'] = $this->NotFound("Slide not found");
        }
        return $this->result['deleteSlide'];
    }
}
