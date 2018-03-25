<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaModel extends Model
{
    public $timestamps = false;

    public function getAreas(){
        $this->table = "areas";
        return $this->paginate(10);
    }

    public function createArea($area)
    {
        $this->table = "areas";
        $query = [
            "area" => $area,
        ];

        if ($this->insert($query)) {
            return 1;
        }

        return 0;
    }

    public function updateArea($id, $area)
    {
        $this->table = "areas";
        $query = [
            "area" => $area,
        ];

        if ($this->where("id", $id)
            ->update($query)) {

            return 1;
        }

        return 0;
    }
}
