<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('reference')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('image_thumbnail')->nullable();

            $table->integer('resource_type_id')->unsigned();
            $table->foreign('resource_type_id')->references('id')->on('resource_types')->onDelete('cascade');

            $table->integer('resource_status_id')->unsigned();
            $table->foreign('resource_status_id')->references('id')->on('resource_statuses')->onDelete('cascade');

            $table->integer('dependency_id')->unsigned();
            $table->foreign('dependency_id')->references('id')->on('dependencies')->onDelete('cascade');

            $table->integer('resource_category_id')->unsigned();
            $table->foreign('resource_category_id')->references('id')->on('resource_categories')->onDelete('cascade');

            $table->integer('physical_state_id')->unsigned();
            $table->foreign('physical_state_id')->references('id')->on('physical_states');
            
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
        Schema::dropIfExists('resources');
    }
}
