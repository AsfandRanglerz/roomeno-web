<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReservationInfoColumnsToHotelInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotel_infos', function (Blueprint $table) {
            $table->string('first_name')->nullable()->after('people_number');
            $table->string('last_name')->nullable()->after('first_name');
            $table->string('Country')->nullable()->after('last_name');
            $table->string('phone_number')->nullable()->after('Country');
            $table->string('email')->nullable()->after('phone_number');
            $table->string('place_of_booking')->nullable()->after('email');
            $table->string('confirm_no')->nullable()->after('place_of_booking');
            $table->string('asking_price')->nullable()->after('confirm_no');
            $table->string('paid_type')->nullable()->after('asking_price');
            $table->string('card_number')->nullable()->after('paid_type');
            $table->string('cardholder_name')->nullable()->after('card_number');
            $table->string('toggle')->nullable()->after('cardholder_name')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotel_infos', function (Blueprint $table) {
            //
        });
    }
}
