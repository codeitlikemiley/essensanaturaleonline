<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDatePaidAndReceiptField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('orders', function (Blueprint $table) {
             $table->dropColumn('status');
        });
        
         Schema::table('banks', function (Blueprint $table) {
             $table->dropColumn('date_paid');
             $table->dropColumn('receipt');
        });
          Schema::table('remittances', function (Blueprint $table) {
             $table->dropColumn('date_paid');
             $table->dropColumn('receipt');
             $table->dropColumn('sender_name');
             $table->dropColumn('mobile_no');
        });

          Schema::table('online_banks', function (Blueprint $table) {
             $table->dropColumn('date_paid');
             $table->dropColumn('receipt');
        });
          Schema::table('mobile_transfers', function (Blueprint $table) {
             $table->dropColumn('date_paid');
             $table->dropColumn('receipt');
             $table->dropColumn('sender_name');
             $table->dropColumn('mobile_no');
        });
         Schema::table('orders', function (Blueprint $table) {
             $table->enum('status',['unpaid', 'paid','verification', 'sending', 'delivered', 'refunded'])->default('unpaid');
        }); 
         Schema::table('banks', function (Blueprint $table) {
             $table->string('date_paid');
        });
        
         Schema::table('remittances', function (Blueprint $table) {
             $table->string('date_paid');
             $table->string('account_name');
             $table->string('account_id');
        });
         
         Schema::table('online_banks', function (Blueprint $table) {
             $table->string('date_paid');
        });
         

         Schema::table('mobile_transfers', function (Blueprint $table) {
             $table->string('date_paid');
             $table->string('account_name');
             $table->string('account_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('status');
        });
            Schema::table('orders', function (Blueprint $table) {
            $table->enum('status',['unpaid', 'paid', 'dispatched', 'processing', 'refunded']);
        });
            Schema::table('banks', function (Blueprint $table) {
            $table->dropColumn('date_paid');
        });
            Schema::table('banks', function (Blueprint $table) {
            $table->timestamp('date_paid'); // Day Payment is Settled
            $table->binary('receipt');
        });
            Schema::table('remittances', function (Blueprint $table) {
            $table->dropColumn('date_paid');
            $table->dropColumn('account_name');
            $table->dropColumn('account_id');
        });
            Schema::table('remittances', function (Blueprint $table) {
            $table->timestamp('date_paid'); // Day Payment is Settled
            $table->binary('receipt');
            $table->string('sender_name');
            $table->string('mobile_no');
        });
            Schema::table('online_banks', function (Blueprint $table) {
            $table->dropColumn('date_paid');
        });
            Schema::table('online_banks', function (Blueprint $table) {
            $table->timestamp('date_paid'); // Day Payment is Settled
            $table->binary('receipt');
        });
             Schema::table('mobile_transfers', function (Blueprint $table) {
            $table->dropColumn('date_paid');
            $table->dropColumn('account_name');
            $table->dropColumn('account_id');
        });
            Schema::table('mobile_transfers', function (Blueprint $table) {
            $table->timestamp('date_paid'); // Day Payment is Settled
            $table->binary('receipt');
            $table->string('sender_name');
            $table->string('mobile_no');
        });
    }
}
