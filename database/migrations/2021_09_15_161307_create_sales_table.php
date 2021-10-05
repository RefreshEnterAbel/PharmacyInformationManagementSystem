<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('med_id');
            $table->unsignedBigInteger('staff_id');
            $table->string('patient_name');
            $table->foreign('staff_id')->references('id')->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('med_id')->references('id')->on('medicines')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->double('bill_payment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
