<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->unsignedBigInteger("bank_id")->nullable()->comment('bank_id associate');
            $table->string('name_user_account',100)->nullable();
            $table->string('account_number',100)->unique()->nullable();
            $table->string('document',15);
            $table->enum('type', ["Pago Móvil", "Transferencia Bancaria"])->default("Transferencia Bancaria");
            $table->string('code')->nullable();
            $table->string('phone', 13)->nullable()->comment('Validate phone in frontend and backend');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('bank_id')->references('id')->on('banks')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_accounts');
    }
}
