<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests_details', function (Blueprint $table) {
            $table->id();
            $table->integer('request_id');
            $table->integer('product_id');
            $table->integer('status_id')->nullable();
            $table->integer('delivery_id')->nullable();
            $table->integer('warehouses_id')->nullable();
            $table->float('amount');
            $table->string('location')->nullable()->default('');
            $table->boolean('worn')->default(0);
            $table->float('worn_amount')->nullable();
            $table->boolean('confirmed')->nullable()->default(null);
            $table->string('descriptions')->nullable();
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
        Schema::dropIfExists('requests_details');
    }
}
