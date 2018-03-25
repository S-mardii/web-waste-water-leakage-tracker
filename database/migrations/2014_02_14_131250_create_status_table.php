<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    protected $status=["Approve", "Pending", "Reject"];

    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->increments('id');
            $table->string("status");
            $table->timestamps();
        });

        $query = array();

        foreach ($this->status as $statuss) {
            array_push($query, ["status"=>$statuss]);
        }

        DB::table('status')->insert($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status');
    }
}
