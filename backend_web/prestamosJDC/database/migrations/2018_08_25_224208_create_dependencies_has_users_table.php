<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependenciesHasUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependencies_has_users', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('attendant_id')->unsigned();
            $table->foreign('attendant_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('dependency_id')->unsigned();
            $table->foreign('dependency_id')->references('id')->on('dependencies')->onDelete('cascade');

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
        Schema::dropIfExists('dependencies_has_users');
    }
}
