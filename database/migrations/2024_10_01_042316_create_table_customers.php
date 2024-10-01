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
        Schema::create('table_customers', function (Blueprint $table) {
            $table->id('customer_id'); // menggunakan auto-increment ID
            $table->text('full_name');
            $table->char('salutation', 5);
            $table->timestamps(); // menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_customers');
    }
};
