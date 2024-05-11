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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('restrict');

            $table->decimal('total', 10,2)->nullable();
            $table->enum('status', ['CREATED','CONFIRMED'])->default('CREATED');

            $table->string('name', 255);
            $table->string('surname', 255)->nullable();
            $table->string('email', 255)->nullable();;
            $table->string('phone', 50)->nullable();;
            $table->string('city', 255)->nullable();;
            $table->string('desc')->nullable()->nullable();;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
