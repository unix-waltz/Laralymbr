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
        Schema::create('borrowing', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userid')->constrained('users')->onDelete('cascade');
            $table->foreignId('bookid')->constrained('books')->onDelete('cascade');
            $table->timestamp('dateborrowed');
            $table->timestamp('datereturned');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowing');
    }
};
