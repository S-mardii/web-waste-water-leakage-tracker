<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutUsTable extends Migration
{
    /**
     * @var string
     */
    protected $aboutUs = 'Waste Water Leakage Tracker is an environmental ICT platform aiming to create an open source tool under the concept of crowdsourcing to generate open data on the location where waste water leaks into the body of Mekong river. Our pilot project is firstly focusing in the scope of the capital city of Phnom Penh.';

    /**
     * @var string
     */
    protected $disclaimer = 'We cannot guarantee accuracy, completeness or reliability from third party sources in every instance. We make no representation or warranty, either expressed or implied, in fact or in law, with respect to the accuracy, completeness or appropriateness of the data, due to the fact that it is aggregated from the user contribution. By accessing this website or database users agree to take full responsibility for reliance on any site information provided and to hold harmless and waive any and all liability against individuals or entities associated with its development, form, and content for any loss, harm, or damage suffered as a result of its use.';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->increments('id');
            $table->text('aboutUs');
            $table->text('disclaimer');
            $table->timestamps();
        });

        $query = [
            'aboutUs'    => $this->aboutUs,
            'disclaimer' => $this->disclaimer
        ];

        DB::table('about_us')->insert(
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
        Schema::dropIfExists('about_us');
    }
}
