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
    Schema::create('statistics', function (Blueprint $table) {
        $table->id();

        $table->string('title');
        $table->integer('value');
        $table->string('suffix', 10)->nullable();
        $table->enum('type', ['icon', 'image'])->default('icon');
        $table->string('icon')->nullable();
        $table->string('image')->nullable();
        $table->string('image')->nullable();
        $table->integer('order')->default(0);
        $table->boolean('is_active')->default(true);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};
