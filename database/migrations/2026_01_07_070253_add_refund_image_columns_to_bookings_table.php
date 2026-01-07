<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRefundImageColumnsToBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('payment_image')->nullable()->after('total_price');
            $table->boolean('is_paid')->default(0)->after('payment_image');
            $table->string('refund_image')->nullable()->after('is_paid');
            $table->boolean('is_refunded')->default(0)->after('refund_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['refund_image', 'is_refunded']);
        });
    }
}
