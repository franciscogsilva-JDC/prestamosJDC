<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spaces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('max_persons')->nullable();

            $table->integer('space_type_id')->unsigned();
            $table->foreign('space_type_id')->references('id')->on('space_types')->onDelete('cascade');

            $table->integer('space_status_id')->unsigned();
            $table->foreign('space_status_id')->references('id')->on('space_statuses')->onDelete('cascade');

            $table->integer('property_type_id')->unsigned();
            $table->foreign('property_type_id')->references('id')->on('property_types')->onDelete('cascade');

            $table->integer('building_id')->unsigned()->nullable();
            $table->foreign('building_id')->references('id')->on('buildings')->onDelete('cascade');

            $table->integer('headquarter_id')->unsigned()->nullable();
            $table->foreign('headquarter_id')->references('id')->on('headquarters')->onDelete('cascade');
            
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
        Schema::dropIfExists('spaces');
    }
}
