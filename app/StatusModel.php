<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusModel extends Model
{
    public $timestamps = false;

    public function getStatus(){
        $this->table = "status";
        return $this->paginate(10);
    }

    public function createStatus($status)
    {
        $this->table = "status";
        $query = [
            "status" => $status,
        ];

        if ($this->insert($query)) {
            return 1;
        }

        return 0;
    }

    public function updateStatus($id, $status)
    {
        $this->table = "status";
        $query = [
            "status" => $status,
        ];

        if ($this->where("id", $id)
            ->update($query)) {

            return 1;
        }

        return 0;
    }
}
