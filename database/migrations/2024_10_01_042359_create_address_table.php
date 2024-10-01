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
        Schema::create('address', function (Blueprint $table) {
            $table->id('address_id'); // SERIAL PRIMARY KEY
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->char('address', 50); // CHAR(50) NOT NULL

            $table->foreign('customer_id')->references('customer_id')->on('table_customers')->onDelete('cascade'); // FOREIGN KEY
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address');
    }
};
