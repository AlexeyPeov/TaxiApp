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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('firstName',50)->nullable();
            $table->string('secondName',50)->nullable();
            $table->timestamp('birthday')->nullable();
            $table->integer('personalDiscount')->nullable();
            $table->string('phoneNumber',20)->nullable();
            $table->integer('orderCount');
            $table->integer('orderDeclinedCount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
