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
        Schema::create('warehouse_entrances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('clerk_id');
            $table->unsignedBigInteger('space_id');
            $table->string('title')->nullable();
            $table->string('code')->nullable();
            $table->integer('counter')->nullable();
            $table->string('price')->nullable();
            $table->text('description')->nullable();
            $table->string('expiration_date')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->foreign('clerk_id')
                ->references('id')
                ->on('clerks')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('space_id')
                ->references('id')
                ->on('spaces')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->foreign('image_id')
                ->references('id')
                ->on('media')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse_entrances');
    }
};
