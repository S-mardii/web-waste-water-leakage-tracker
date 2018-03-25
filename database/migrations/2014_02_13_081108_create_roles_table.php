<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    private $roles = ["Admin", "Editor", "User"];

    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments("id");
            $table->string("role");
            $table->timestamps();
        });

        $query = array();

        foreach ($this->roles as $role){
           array_push($query, ["role" => $role]);
        }

        DB::table('roles')->insert(
            $query
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
