<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConditionsTable extends Migration
{
    protected $names = ["Urgent", "Medium", "Low"];
    protected $color = ["#FF0000", "#FFFF00", "#008000"];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->string("condition");
            $table->string("color");
            $table->timestamps();
        });

        $query = array();

        for ($i = 0; $i < count($this->color); $i++) {
            array_push($query
                , ["condition" => $this->names[$i],
                    "color" => $this->color[$i]
                ]);
        }

        DB::table('conditions')->insert($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conditions');
    }
}
