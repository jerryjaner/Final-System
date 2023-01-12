<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();      
            $table->foreignId('dish_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('order_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('dish_name');
            $table->string('dish_price');
            $table->integer('dish_qty');
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
        Schema::dropIfExists('order_details');
    }
}
