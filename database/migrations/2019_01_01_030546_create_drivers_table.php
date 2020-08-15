<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('social_security', 14);
            $table->string('driver_license', 20);
            $table->string('email');
            $table->string('phone', 20);
            $table->unsignedTinyInteger('driver_license_category')
                    ->default(0)->comment('0: A; 1: B; 2: C; 3: D; 4: E; 5: AB; 6: AC; 7: AD; 8: AE');
            $table->date('driver_license_expiration');
            $table->date('birth_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
    }
}
