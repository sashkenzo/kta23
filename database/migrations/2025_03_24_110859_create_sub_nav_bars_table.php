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
        Schema::create('sub_nav_bars', function (Blueprint $table) {
            $table->id();
            $table->integer('navbar_id');
            $table->string('name');
            $table->string('slug');
            $table->boolean('status');
            $table->enum('type',['product','blog'])->default('product');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_nav_bars');
    }
};
