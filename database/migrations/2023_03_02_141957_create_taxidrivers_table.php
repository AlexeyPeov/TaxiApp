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
        Schema::create('taxidrivers', function (Blueprint $table) {
            $table->id();
            $table->string('firstName',50);
            $table->string('secondName',50);
            $table->timestamp('birthday');
            $table->integer('experience')->nullable();
            $table->float('rating')->nullable();
            $table->string('qualification', 20);
//            $table->integer('carDriving')->nullable();
            $table->integer('reviewHeap')->nullable();
            $table->integer('reviewsGiven')->nullable();
            /*id SERIAL,
            firstName CHAR(50) NOT NULL,
            secondName CHAR(50) NOT NULL,
            birthday TIMESTAMP NOT NULL,
            experience INT,
            rating FLOAT,
            qualification char(20) NOT NULL,
            carDriving INT,
            reviewHeap INT,
            reviewsGiven INT,
            PRIMARY KEY (id),
            FOREIGN KEY(carDriving) REFERENCES car(id)*/
            $table->timestamps();
            $table->foreignId('carDriving')->nullable()->constrained('cars')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxidrivers');
    }
};
