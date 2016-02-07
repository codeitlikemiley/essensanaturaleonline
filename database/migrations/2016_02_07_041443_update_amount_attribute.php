<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAmountAttribute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('remittances', function (Blueprint $table) {
             $table->dropColumn('amount');
        });
        Schema::table('remittances', function (Blueprint $table) {
             $table->double('amount', 15, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('remittances', function (Blueprint $table) {
             $table->dropColumn('amount');
        });
        Schema::table('remittances', function (Blueprint $table) {
             $table->double('amount', 5, 2);
        });
    }
}
