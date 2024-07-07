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
        Schema::create('costs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clerk_id');
            $table->string('title')->nullable();
            $table->string('counter')->nullable();
            $table->string('price')->nullable();
            $table->string('expiration_date')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('clerk_id')
                ->references('id')
                ->on('clerks')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('costs');
    }
};
