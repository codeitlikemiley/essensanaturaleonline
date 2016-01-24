<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobileTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('transaction_no');
            $table->string('sender_name');
            $table->string('mobile_no');
            $table->double('amount', 15, 2);
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
        Schema::drop('mobile_transfers');
    }
}
