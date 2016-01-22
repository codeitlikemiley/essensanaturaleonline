<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->nullable();
            $table->string('name');
            $table->string('summary');
            $table->text('description');
            $table->float('price', 9, 2);
            $table->integer('stock');
            $table->binary('image');
            $table->boolean('published')->default(0);
            $table->float('rating_cache', 2, 1)->default(0);
            $table->integer('rating_count')->default(0);
            $table->json('options')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        
        // Create a View Product By Category
        // Create a View For Adding Editing and Deleting Product(admin)
        // 
        // 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
