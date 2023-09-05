<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshop_expense_descriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workshop_expenses_id')
                ->constrained('workshop_expenses')
                ->onDelete('cascade')
                ->name('workshop_expenses_id_foreign');
            $table->foreignId('workshop_expense_lists_id')
                ->constrained('workshop_expense_lists')
                ->onDelete('cascade')
                ->name('workshop_expense_lists_id_foreign');
            $table->integer('amount')->default(0);
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workshop_expense_descriptions');
    }
};
