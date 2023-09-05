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
        Schema::create('workshop_spareparts_descriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workshop_sparepart_revenue_id')
                ->constrained('workshop_sparepart_revenues')
                ->onDelete('cascade')
                ->name('workshop_sparepart_revenue_id_foreign');
            $table->foreignId('workshop_sparepart_id')
                ->constrained('workshop_sparepart')
                ->onDelete('cascade')
                ->name('workshop_sparepart_id_foreign');
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
        Schema::dropIfExists('workshop_spareparts_descriptions');
    }
};
