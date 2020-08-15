<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_id')->unsigned();
            $table->integer('driver_id')->unsigned();
            $table->integer('route_id')->unsigned();            
            $table->string('auxiliary',255)->unsigned();
            $table->float('km_leave');
            $table->float('km_arrival');
            $table->float('km_total');
            $table->float('total_liters');
            $table->float('average_transit');
            $table->float('liter_value');
            $table->float('daily_value');
            $table->float('discharge_value');
            $table->float('expenses_diverse')->nullable();
            $table->float('transit_cost');
            $table->float('transit_expense');
            $table->float('weight');
            $table->float('refrigeration_value')->nullable();
            $table->dateTime('date_leave');
            $table->dateTime('date_arrival');
            $table->timestamps();

            $table
            ->foreign('vehicle_id')
            ->references('id')
            ->onUpdate('cascade')
            ->onDelete('set null')
            ->on('vehicles');

            $table
            ->foreign('driver_id')
            ->references('id')
            ->onUpdate('cascade')
            ->onDelete('set null')
            ->on('drivers');

            $table
            ->foreign('route_id')
            ->references('id')
            ->onUpdate('cascade')
            ->onDelete('set null')
            ->on('routes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transits');
    }
}
