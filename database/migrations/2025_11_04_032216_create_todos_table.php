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
        Schema::create('todos', function (Blueprint $table) {
            //wajib
            $table->id();
            //title dengan tipe data string
            $table->string('title');
            //description dengan tipe data text
            $table->text('description')->nullable();
            //kategori dengan tipe data string
            $table->string('category')->nullable();
            //status dengan tipe data boolean
            $table->boolean('status')->default(false);
            //due date dengan tipe data datetime
            $table->dateTime('due_date')->nullable();
            //tambahan dari laravel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
