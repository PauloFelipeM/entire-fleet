<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('masterpoint_origin_id')->unsigned();
            $table->integer('masterpoint_destination_id')->unsigned();
            $table->string('title',255);
            $table->float('distance');
            $table->timestamps();
            $table->softDeletes();

            $table
            ->foreign('masterpoint_origin_id')
            ->references('id')
            ->onUpdate('cascade')
            ->onDelete('set null')
            ->on('master_points');

            $table
            ->foreign('masterpoint_destination_id')
            ->references('id')
            ->onUpdate('cascade')
            ->onDelete('set null')
            ->on('master_points');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
}
