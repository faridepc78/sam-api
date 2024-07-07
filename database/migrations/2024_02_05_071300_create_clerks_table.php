<?php

use App\Models\Clerk;
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
        Schema::create('clerks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('space_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('code')->nullable();
            $table->string('gender')->nullable();
            $table->string('shift_work')->nullable();
            $table->string('mobile')->nullable();
            $table->string('organizational_unit')->nullable();
            $table->string('monthly_salary')->nullable();
            $table->string('monthly_daily')->nullable();
            $table->string('reward')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->text('address')->nullable();
            $table->text('description')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('bank_sheba')->nullable();
            $table->string('bank_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->enum('status', Clerk::$statuses);
            $table->timestamps();


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
        Schema::dropIfExists('clerks');
    }
};
