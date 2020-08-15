<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brand_id')->unsigned();
            $table->integer('vehicle_type_id')->unsigned();
            $table->string('plate', 20);
            $table->string('color', 20);
            $table->string('manufacture_year', 4);
            $table->string('model_year', 4);
            $table->unsignedTinyInteger('fuel')->default(0);
            $table->string('document', 11);
            $table->float('km_started');
            $table->timestamps();
            $table->softDeletes();

            $table
            ->foreign('brand_id')
            ->references('id')
            ->onUpdate('cascade')
            ->onDelete('set null')
            ->on('brands');

            $table
            ->foreign('vehicle_type_id')
            ->references('id')
            ->onUpdate('cascade')
            ->onDelete('set null')
            ->on('vehicle_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
