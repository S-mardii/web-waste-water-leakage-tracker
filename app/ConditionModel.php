<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConditionModel extends Model
{
    public function getConditions(){
        $this->table = "conditions";
        return $this->paginate(10);
    }

    public function createCondition($condition, $color)
    {
        $this->table = "conditions";
        $query = [
            "condition" => $condition,
            "color" => $color
        ];

        if ($this->insert($query)) {
            return 1;
        }

        return 0;
    }

    public function updateCondition($id, $condition, $color)
    {
        $this->table = "conditions";
        $query = [
            "condition" => $condition,
            "color" => $color
        ];

        if ($this->where("id", $id)
            ->update($query)
        ) {

            return 1;
        }

        return 0;
    }

    public function getConditionById($id)
    {
        $this->table = "conditions";
        return $this
            ->where("conditions.id", $id)
            ->select("conditions.color")
            ->get();
    }
}
