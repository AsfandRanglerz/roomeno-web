<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
    $table->id();

    $table->string('first_name');
    $table->string('last_name');

    $table->string('email')->unique();
    $table->string('phone_number');

    $table->string('company_name');
    $table->text('company_address');

    $table->string('password');

    $table->boolean('status')->default(0); // 0 = Pending | 1 = Approved

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
        Schema::dropIfExists('partners');
    }
}
