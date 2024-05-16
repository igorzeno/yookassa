<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->foreignId('category_id')->nullable()->constrained();
            $table->boolean('draft')->default(false);

            $table->string('name', 255);
            $table->string('desc')->nullable();
            $table->string('sku', 127)->nullable();;
            $table->string('brand', 127)->nullable();
            $table->decimal('price', 10,2)->nullable();
            $table->string('image',255)->nullable();

            $table->unsignedBigInteger('discount_id')->nullable();
            $table->foreign('discount_id')
                ->references('id')->on('discounts')
                ->onDelete('restrict');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
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
