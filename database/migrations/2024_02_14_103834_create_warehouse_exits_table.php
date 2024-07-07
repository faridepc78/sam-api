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
        Schema::create('warehouse_exits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clerk_id');
            $table->unsignedBigInteger('space_id');
            $table->unsignedBigInteger('warehouse_entrance_id');
            $table->string('title')->nullable();
            $table->string('expiration_date')->nullable();
            $table->integer('counter')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

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
            $table->foreign('warehouse_entrance_id')
                ->references('id')
                ->on('warehouse_entrances')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse_exits');
    }
};
