<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutUsModel extends Model
{
    public function getAll(){
        $this->table = "aboutus";
        return $this->get()->first();
    }

    public function createAboutus($aboutus, $disclaimer)
    {
        $this->table = "aboutus";
        $query = [
            "aboutus" => $aboutus,
            "disclaimer" => $disclaimer,
        ];

        if ($this->insert($query)) {
            return 1;
        }

        return 0;
    }

    public function updateAboutus($aboutus, $disclaimer)
    {
        $this->table = "aboutus";
        $query = [
            "aboutus" => $aboutus,
            "disclaimer" => $disclaimer,
        ];

        if ($this
            ->where('id', 1)
            ->update($query)) {

            return 1;
        }

        return 0;
    }
}
