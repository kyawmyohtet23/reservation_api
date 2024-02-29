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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('city_id');
            // $table->foreignId('admin_id')->references('id')->on('admins');
            // $table->foreignId('category_id')->references('id')->on('restaurant_categories');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('name');
            $table->text('description');
            $table->string('phone');
            $table->string('address');
            $table->string('type');
            // $table->json('type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};