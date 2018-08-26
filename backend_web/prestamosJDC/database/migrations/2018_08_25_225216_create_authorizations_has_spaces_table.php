<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorizationsHasSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authorizations_has_spaces', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('space_id')->unsigned();
            $table->foreign('space_id')->references('id')->on('spaces')->onDelete('cascade');

            $table->integer('authorization_id')->unsigned();
            $table->foreign('authorization_id')->references('id')->on('authorizations')->onDelete('cascade');

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
        Schema::dropIfExists('authorizations_has_spaces');
    }
}
