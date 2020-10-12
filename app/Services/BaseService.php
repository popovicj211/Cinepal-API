<?php


namespace App\Services;
use Illuminate\Database\Eloquent\Builder as Model;


class BaseService
{
    protected $rimg;

    public function __construct( $rimg)
    {
              $this->rimg = $rimg;
    }

    public function generatePagedResponse(Model $model, $perPage, $page )
    {

        if ($page) {
            $model->offset(($page - 1) * $perPage)->limit($perPage);
        }else{
            $model->limit($perPage);
        }

        return array('data' => $model->get(), 'count' => $model->count());
    }


}
