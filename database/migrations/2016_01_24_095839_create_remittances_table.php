<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemittancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remittances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('remittance_name');
            $table->string('transaction_id')->unique();
            $table->string('transaction_no');
            $table->string('sender_name'); 
            $table->string('mobile_no');
            $table->double('amount', 5, 2);
            $table->binary('receipt');
            $table->timestamp('date_paid');
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
        Schema::drop('remittances');
    }
}
