<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStarAtToHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->int('price')->nullable()->after('country');
            $table->string('stars')->nullable()->after('price');
            $table->string('rating')->nullable()->after('stars');
            $table->boolean('free_cancellation')->default(0)->after('rating')->nullable();
            $table->json('amenities')->nullable()->after('free_cancellation');
            $table->string('max_guests')->nullable()->after('amenities');
            $table->string('check_in')->nullable()->after('max_guests');
            $table->string('check_out')->nullable()->after('check_in');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotels', function (Blueprint $table) {
            //
        });
    }
}
