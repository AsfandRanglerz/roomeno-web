<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('hotel_name')->nullable();
            $table->string('hotel_address')->nullable();
            $table->string('room_type')->nullable();
            $table->string('rooms')->nullable();
            $table->string('adults')->nullable();
            $table->string('children')->nullable();
            $table->string('check_in')->nullable();
            $table->string('check_out')->nullable();
            $table->string('publish_date')->nullable();
            $table->string('cut_off_date')->nullable();
            $table->string('price_per_night')->nullable();
            $table->string('discount')->nullable();
            $table->string('current_market_price')->nullable();
            $table->string('source_of_booking')->nullable();
            $table->string('is_customer_cancellation')->nullable();
            $table->string('guest_first_name')->nullable();
            $table->string('guest_last_name')->nullable();
            $table->text('additional_info')->nullable();
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
        Schema::dropIfExists('inventories');
    }
}
