<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnlineBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_banks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bank_name');
            $table->string('transaction_id')->unique(); // Transaction ID
            $table->string('transaction_no');
            $table->string('account_name'); // Full Name
            $table->string('account_id'); // Account NO
            $table->double('amount', 15, 2); // In Pesos
            $table->binary('receipt');
            $table->timestamp('date_paid'); // Day Payment is Settled
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('online_banks');
    }
}
