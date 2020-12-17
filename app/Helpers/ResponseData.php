<?php


namespace App\Helpers;


use App\Models\MoviesCategories;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ResponseData
{
    public static function updateValues(array $values , $model)
    {
        $table = $model::getModel()->getTable();

        $cases = [];
        $ids = [];
        $params = [];

        foreach ($values as $id => $value) {
            $id = (int) $id;
            $cases[] = "WHEN {$id} then ?";
            $params[] = $value;
            $ids[] = $id;
        }

        $ids = implode(',', $ids);
        $cases = implode(' ', $cases);
        $params[] = Carbon::now();

        return DB::update("UPDATE `{$table}` SET `value` = CASE `id` {$cases} END, `updated_at` = ? WHERE `id` in ({$ids})", $params);
    }

    function insertOrUpdate(array $rows,  $model){
      //  $table = \DB::getTablePrefix().with(new self)->getTable();
        $table = $model;

        $first = reset($rows);

        $columns = implode( ',',
            array_map( function( $value ) { return "$value"; } , array_keys($first) )
        );

        $values = implode( ',', array_map( function( $row ) {
                return '('.implode( ',',
                        array_map( function( $value ) { return '"'.str_replace('"', '""', $value).'"'; } , $row )
                    ).')';
            } , $rows )
        );

        $updates = implode( ',',
            array_map( function( $value ) { return "$value = VALUES($value)"; } , array_keys($first) )
        );

        $sql = "INSERT INTO {$table}({$columns}) VALUES {$values} ON DUPLICATE KEY UPDATE {$updates}";

        return DB::statement( $sql );
    }
}
