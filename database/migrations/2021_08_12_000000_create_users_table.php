<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("country_id")->nullable()->comment('Country id associate');
            $table->unsignedBigInteger("state_id")->nullable()->comment('State id associate');
            $table->unsignedBigInteger("city_id")->nullable()->comment('City id associate');
            $table->unsignedBigInteger("status_model_id")->nullable()->comment('Status user');
            $table->unsignedBigInteger("user_id")->nullable();
            $table->string('username',10)->nullable();
            $table->string('name',100);
            $table->string('slug',255)->nullable();
            $table->string('last_name',100)->nullable();
            $table->date('date_age')->nullable();
            $table->string('document',15)->nullable();
            $table->string('email',180)->unique()->nullable();
            $table->string('phone', 13)->nullable()->comment('Validate phone in frontend and backend');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->longText('avatar')->nullable();

            $table->string('token_login', 200)->unique()->nullable();
            $table->string('access_token', 200)->unique()->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('country_id')->references('id')->on('countries')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('status_model_id')->references('id')->on('status_models')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
