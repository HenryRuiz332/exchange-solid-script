<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("country_id")->nullable()->comment('Country id associate');
            $table->unsignedBigInteger("state_id")->nullable()->comment('State id associate');
            $table->unsignedBigInteger("status_model_id")->nullable()->comment('Status city');

            $table->string("name", 100)->comment('Name country');
            $table->string("iso2", 2)->nullable()->comment('Abbrevation ISO2');
            $table->string("iso3", 3)->nullable()->comment('Abbrevation ISO23');
            $table->string("code_phone", 10)->nullable()->comment('Phone Code');
            $table->string("png", 100)->nullable()->comment('Image PNG');
            $table->string("svg", 100)->nullable()->comment('Vector SVG');
            $table->longtext('lat_long')->nullable()->comment('periferic ponints(array latitude y longitude)');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('country_id')->references('id')->on('countries')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('status_model_id')->references('id')->on('status_models')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
