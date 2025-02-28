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
        //
        Schema::create('depenses', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->date('date_depense')->nullable();
            $table->date('start_date')->nullable();
            $table->string('title');
            $table->enum('type', ['ponctuel', 'recurente']);
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('depenses');
    }
};
