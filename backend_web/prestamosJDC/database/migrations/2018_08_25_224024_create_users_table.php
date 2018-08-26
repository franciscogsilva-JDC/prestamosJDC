<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('dni')->unique();
            $table->string('image')->nullable();
            $table->string('image_thumbnail')->nullable();
            $table->string('company_name')->nullable();
            $table->string('cellphone_number');
            $table->integer('semester')->nullable();

            $table->integer('user_type_id')->unsigned();
            $table->foreign('user_type_id')->references('id')->on('user_types')->onDelete('cascade');

            $table->integer('user_status_id')->unsigned();
            $table->foreign('user_status_id')->references('id')->on('user_statuses')->onDelete('cascade');

            $table->integer('dni_type_id')->unsigned();
            $table->foreign('dni_type_id')->references('id')->on('dni_types');

            $table->integer('dependency_id')->unsigned()->nullable();
            $table->foreign('dependency_id')->references('id')->on('dependencies');

            $table->integer('gender_id')->unsigned();
            $table->foreign('gender_id')->references('id')->on('genders');

            $table->integer('town_id')->unsigned()->nullable();
            $table->foreign('town_id')->references('id')->on('towns')->onDelete('cascade');

            $table->string('confirmation_code')->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('logged_at')->nullable();
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
