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
            $table->integer('orderStatus');
            /*$table->integer('customerId')->nullable();
            $table->integer('taxiDriverId')->nullable();*/
            $table->integer('class');
            $table->float('price');
            $table->string('pointA',50);
            $table->string('pointB');
            $table->boolean('reviewGiven')->nullable();
            /*FOREIGN KEY(taxiDriverId) REFERENCES taxidriver(id),
            FOREIGN KEY (customerId) REFERENCES customer(id)*/
            $table->timestamps();
            $table->foreignId('customerId')->nullable()->constrained('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('taxiDriverId')->nullable()->constrained('taxidrivers')->onUpdate('cascade')->onDelete('cascade');
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
