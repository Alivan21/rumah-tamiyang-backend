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
        Schema::create('waste_house_income_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('waste_house_lists_id')
                ->constrained('waste_house_lists')
                ->onDelete('cascade')
                ->name('waste_house_income_list_id_foreign');
            $table->foreignId('waste_house_income_id')
                ->constrained('waste_house_income')
                ->onDelete('cascade')
                ->name('waste_house_income_id_foreign');
            $table->double('amount');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('waste_house_income_details');
    }
};
