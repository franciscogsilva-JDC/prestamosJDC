<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplementsHasResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complements_has_resources', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('authorization_resource_id')->unsigned();
            $table->foreign('authorization_resource_id')->references('id')->on('authorizations_resources')->onDelete('cascade');

            $table->integer('complement_id')->unsigned();
            $table->foreign('complement_id')->references('id')->on('complements')->onDelete('cascade');

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
        Schema::dropIfExists('complements_has_resources');
    }
}
