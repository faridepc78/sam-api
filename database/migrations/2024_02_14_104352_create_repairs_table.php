<?php

use App\Models\Repair;
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
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clerk_id');
            $table->unsignedBigInteger('space_id');
            $table->string('title')->nullable();
            $table->string('code')->nullable();
            $table->string('price')->nullable();
            $table->string('expiration_date')->nullable();
            $table->enum('status', Repair::$statuses);
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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repairs');
    }
};
