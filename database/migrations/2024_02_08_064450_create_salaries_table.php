<?php

use App\Models\Salary;
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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clerk_id');
            $table->string('monthly_salary')->nullable();
            $table->string('monthly_daily')->nullable();
            $table->enum('sms', Salary::$sms);
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
        Schema::dropIfExists('salaries');
    }
};
