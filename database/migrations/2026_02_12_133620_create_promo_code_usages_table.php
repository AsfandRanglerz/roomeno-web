<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoCodeUsagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_code_usages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('promo_code_id')->nullable();
            $table->foreignId('used_by')->nullable(); // receiver user
            $table->boolean('receiver_rewarded')->default(false);
            $table->boolean('sender_rewarded')->default(false);
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
        Schema::dropIfExists('promo_code_usages');
    }
}
