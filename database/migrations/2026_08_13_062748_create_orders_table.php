<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('uid')->nullable();
            $table->integer('pid');
            $table->integer('qty');
            $table->string('subtotal');
            $table->boolean('status');
            $table->string('name');
            $table->string('company')->nullable();
            $table->string('city');
            $table->string('postal_code');
            $table->string('prefecture');
            $table->string('address');
            $table->string('mobile');
            $table->string('email');
            $table->string('time_slot');
            $table->longText('cart_items');
            $table->string('note')->nullable();
            $table->string('grandtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
