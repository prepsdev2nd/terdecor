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
        Schema::create('designs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->longText('description')->nullable();
            $table->longText('pic1')->nullable();
            $table->longText('pic2')->nullable();
            $table->longText('pic3')->nullable();
            $table->longText('pic4')->nullable();
            $table->longText('pic5')->nullable();
            $table->string('type')->nullable();
            $table->string('material')->nullable();
            $table->bigInteger('price')->nullable();
            $table->string('size')->nullable();
            $table->longText('tags')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designs');
    }
};
