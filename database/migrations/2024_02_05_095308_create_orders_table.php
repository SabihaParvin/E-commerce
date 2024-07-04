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
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('name'); 
            $table->string('email')->nullable(); 
            $table->string('phone'); 
            $table->string('address');
            $table->double('total_price')->default(0.0);
            $table->string('status')->nullable();
            $table->string('receiver_mobile');
            $table->string('receiver_name');
            $table->text('order_note')->nullable();
            $table->string('transaction_id')->unique();
            $table->string('payment_method')->default('cod');
            $table->string('payment_status')->default('pending');
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
