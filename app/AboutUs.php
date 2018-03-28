<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    public function getAll(){
        $this->table = "about_us";
        return $this->get()->first();
    }

    /**
     * @param string $aboutUs
     * @param string $disclaimer
     *
     * @return int
     */
    public function createAboutUs($aboutUs, $disclaimer)
    {
        $this->table = "about_us";
        $query = [
            'aboutUs' => $aboutUs,
            'disclaimer' => $disclaimer,
        ];

        if ($this->insert($query)) {
            return 1;
        }

        return 0;
    }

    /**
     * Update About Us and Disclaimer content
     *
     * @param string$aboutUs
     * @param string $disclaimer
     *
     * @return int
     */
    public function updateAboutUs($aboutUs, $disclaimer)
    {
        $this->table = "about_us";
        $query = [
            "aboutUs" => $aboutUs,
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
