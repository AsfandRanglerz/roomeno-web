<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable();
            $table->string('name')->nullable();
            $table->string('board_name')->nullable();
            $table->string('check_in')->nullable();
            $table->string('check_out')->nullable();
            $table->string('people_number')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('country')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('place_of_booking')->nullable();
            $table->string('confirm_no')->nullable();
            $table->string('asking_price')->nullable();
            $table->string('paid_type')->nullable();
            $table->string('card_number')->nullable();
            $table->string('cardholder_name')->nullable();
            $table->string('toggle')->nullable()->default(0);
            $table->string('is_featured')->nullable()->default(0);
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
        Schema::dropIfExists('listings');
    }
}
