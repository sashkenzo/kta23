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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('type')->default('blog');
            $table->string('title')->nullable();
            $table->text('user_id');
            $table->text('content')->nullable();
            $table->text('short_content')->nullable();;
            $table->text('long_content')->nullable();;
            $table->integer('subcategory_id')->nullable();;
            $table->boolean('status');
            $table->boolean('is_top')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
