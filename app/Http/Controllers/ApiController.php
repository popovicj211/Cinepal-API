<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $data;
    protected $service;
    protected $result;

    protected const OK = 200;
    protected const CREATED = 201;
    protected const NO_CONTENT = 204;
    protected const BAD_REQUEST = 400;
    protected const UNAUTHORIZED = 401;
    protected const FORBIDDEN = 403;
    protected const NOT_FOUND = 404;
    protected const CONFLICT = 409;
    protected const UNPROCCESSABLE_ENTITY = 422;
    protected const INTERNAL_SERVER_ERROR = 500;
    protected const BAD_GATEWAY = 502;

    public function __construct($service)
    {
        $this->service = $service;
    }


    protected function Ok($message)
    {
        return response()->json($message, SELF::OK);
    }

    protected function Created($message)
    {
        return response()->json(['message' => $message], SELF::CREATED);
    }

    protected function NoContent()
    {
        return response()->json(null, SELF::NO_CONTENT);
    }

    protected function BadRequest($error)
    {
        return response()->json(['error' => $error], SELF::BAD_REQUEST);
    }

    public function ServerError($error){
        return response()->json(['error' => $error], SELF::INTERNAL_SERVER_ERROR);
    }

    protected function Unauthorized($error)
    {
        return response()->json(['error' => $error], SELF::UNAUTHORIZED);
    }

    protected function Conflitct($error)
    {
        return response()->json(['error' => $error], SELF::CONFLICT);
    }

    protected function NotFound($error)
    {
        return response()->json(['error' => $error], SELF::NOT_FOUND);
    }

}
