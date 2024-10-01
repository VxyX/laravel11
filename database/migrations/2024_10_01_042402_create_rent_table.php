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
        Schema::create('rent', function (Blueprint $table) {
            $table->id('rent_id'); // SERIAL PRIMARY KEY
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('movie_id');
            $table->unsignedBigInteger('address_id');

            $table->foreign('customer_id')->references('customer_id')->on('table_customers')->onDelete('cascade'); // FOREIGN KEY
            $table->foreign('movie_id')->references('movie_id')->on('table_movies')->onDelete('cascade'); // FOREIGN KEY
            $table->foreign('address_id')->references('address_id')->on('address')->onDelete('cascade'); // FOREIGN KEY
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent');
    }
};
