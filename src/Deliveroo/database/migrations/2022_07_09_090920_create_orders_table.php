<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('status')->default('pending');
            $table->string('house_number');
            $table->string('house_number_addition')->nullable();
            $table->string('street');
            $table->string('city');
            $table->string('postal_code');
            $table->string('country');
            $table->string('phone');
            $table->integer('delivery_cost')->default(0);
            $table->integer('sub_total')->default(0);
            $table->integer('total')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
