<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id'); // Who Purchase the Order
            // MOP has the User Details ex. Smart Money : CP no and Transaction No.
            $table->morphs('mop');
            $table->binary('attachment'); // attachement Image Upload
            $table->enum('status',['unpaid', 'paid', 'dispatched', 'processing', 'refunded']);
            $table->enum('method', ['deliver', 'pickup']);
            $table->double('shipment_fee', 5, 2); // zero for pickup and
            $table->double('sub_total', 15, 2);
            $table->double('tax',15 ,2);
            $table->double('total', 15, 2);
            $table->string('comment'); // Additional Message Of User to Admin
            $table->timestamps();

            // Add the following function in a Model Order During Order Creation
            // create function to get shipment_fee
            // create waive of shipment fee function if pickUp
            // function to calculate tax for subtotal 10%
            // create function for total shipment_fee + subtotal + tax
            // to get shipping address $user->profile
            

            // Add the following in View
            // add in bottomsheet ul tag list >sub total>tax> shipment fee >total
            // Create a View for Show All Order (admin)
            // Create a View for Show All Order Specific User (user)
            // Create view for Show Specific Order (user/admin)
            // Create View For Edit Order (admin) and Delete(order)
            // Create Controller 
            // Update Status of Order (admin)
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
