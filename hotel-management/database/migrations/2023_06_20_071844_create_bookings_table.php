<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
    public function up()
{
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->unsignedInteger('user_id');
        $table->unsignedInteger('room_id');
        $table->string('name');
        $table->string('nid');
        $table->string('code');
        $table->string('phone')->nullable();
        $table->string('email');
        $table->timestamp('departure_date');
        $table->text('additional_info')->nullable();
        $table->timestamps();
    
        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('room_id')->references('id')->on('rooms');
    });
    
}

};
