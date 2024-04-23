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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productname');
            $table->decimal('productprice', 8, 2);
            $table->string('name1');
            $table->string('name2');
            $table->string('ice1');
            $table->string('ice2');
            $table->string('ice3');
            $table->string('sugar1');
            $table->string('sugar2');
            $table->string('sugar3');
            $table->boolean('isactive')->default(true);
            $table->string('image');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
