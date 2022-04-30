<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsDetailsConfirmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests_details_confirms', function (Blueprint $table) {
            $table->id();
            $table->integer('requests_detail_id');
            $table->integer('confirm_id');
            $table->integer('user_id');
            $table->integer('confirmed')->nullable()->default(null);
            $table->string('description');
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
        Schema::dropIfExists('requests_details_confirms');
    }
}
