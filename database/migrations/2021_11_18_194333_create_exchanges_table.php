<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

    
        Schema::create('exchanges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("commission_id");
            $table->unsignedBigInteger("crypto_id")->nullable();
            $table->unsignedBigInteger("status_model_id")->nullable();
            $table->unsignedBigInteger("money_id")->nullable();
            $table->unsignedBigInteger("bank_account_id");
            $table->longText("contract");
            $table->string("note");

            $table->string("token_ammount");
            $table->string("dolar_ammount");
            $table->string("current_money_ammount");
            $table->string("plataform_commission");

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('commission_id')->references('id')->on('commissions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('crypto_id')->references('id')->on('cryptocurrencies')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->foreign('money_id')->references('id')->on('current_money')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('bank_account_id')->references('id')->on('bank_accounts')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchanges');
    }
}
