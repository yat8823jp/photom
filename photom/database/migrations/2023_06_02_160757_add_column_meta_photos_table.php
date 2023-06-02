<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('photos', function (Blueprint $table) {
			$table->string('maker');
			$table->string('model');
			$table->string('ISOSpeedRatings');
			$table->string('ExposureTime');
			$table->string('ApertureValue');
			$table->string('MimeType');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('photos', function (Blueprint $table) {
			$table->string('maker');
			$table->string('model');
			$table->string('ISOSpeedRatings');
			$table->string('ExposureTime');
			$table->string('ApertureValue');
			$table->string('MimeType');
        });
    }
};
