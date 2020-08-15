<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tires', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_id')->unsigned()->nullable();
            $table->integer('provider_id')->unsigned();
            $table->string('serie_number',100);
            $table->string('brand',100);
            $table->string('dimension',100);
            $table->string('note_number',255);
            $table->float('km_total');
            $table->float('value');
            $table->date('validate_date');
            $table->date('purchase_date');
            $table->date('change_date')->nullable();
            $table->unsignedTinyInteger('vehicle_spot')->nullable();            
            $table->float('km_vehicle_change')->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();

            $table
            ->foreign('vehicle_id')
            ->references('id')
            ->onUpdate('cascade')
            ->onDelete('set null')
            ->on('vehicles');

            $table
            ->foreign('provider_id')
            ->references('id')
            ->onUpdate('cascade')
            ->onDelete('set null')
            ->on('providers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tires');
    }
}
