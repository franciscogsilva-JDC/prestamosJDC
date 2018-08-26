<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('participants')->nullable();
            $table->integer('internal_participants')->nullable();
            $table->integer('external_participants')->nullable();
            $table->double('value')->nullable();
            $table->longText('description')->nullable();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('responsable_id')->unsigned();
            $table->foreign('responsable_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('request_type_id')->unsigned();
            $table->foreign('request_type_id')->references('id')->on('request_types');

            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->timestamp('received_date')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('requests');
    }
}
