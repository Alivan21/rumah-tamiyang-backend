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
        Schema::create('workshop_service_descriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workshop_service_id')
                ->constrained('workshop_services')
                ->onDelete('cascade')
                ->name('workshop_service_id_foreign'); // Specify a shorter name here
            $table->foreignId('workshop_service_revenue_id')
                ->constrained('workshop_service_revenues')
                ->onDelete('cascade')
                ->name('workshop_service_revenue_id_foreign'); // Specify a shorter name here
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
        Schema::dropIfExists('workshop_service_descriptions');
    }
};
