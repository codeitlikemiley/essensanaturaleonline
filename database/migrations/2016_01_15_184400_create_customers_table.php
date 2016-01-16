<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('sp_id')->unsigned()->nullable();
            $table->foreign('sp_id')->references('id')->on('users');
            $table->string('first_name', 60);
            $table->string('last_name', 60);
            $table->string('username', 60)->unique();
            $table->string('email', 60)->unique();
            $table->string('password', 60);
            $table->binary('profile_pic')->nullable();
            $table->string('contact_no', 30)->nullable();
            $table->rememberToken();
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
        Schema::drop('customers');
    }
}
