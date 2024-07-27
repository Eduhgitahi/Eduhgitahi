<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations
     * 
     *  return void
     */
    public function up()
    {
        Schema::create('customers', function(Blueprint $table){
            $table->id();
            $table->integer('customer_id');
            $table->integer('amount');
            $table->string('status'); // Billed, paid, Void
            $table->dateTime('billed_date');
            $table->dateTime('paid_date')->nullable();
            $table->timestamps();
        })
    }

    /**
     * Reverse the migration
     * 
     *  @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
