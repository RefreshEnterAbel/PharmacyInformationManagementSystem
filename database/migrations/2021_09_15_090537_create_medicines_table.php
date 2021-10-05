<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('medicine_types')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string("name");
            $table->string("generic_name")->nullable();
            $table->string("med_company");
            $table->date("exp_date");
            $table->date("manufacture_date");
            $table->double("price");
            $table->string("no_items");
            $table->string("dose_amount");
            $table->string("shelf_no");
            $table->text("prescription")->nullable();
            $table->enum("categories", ['General Sales List', 'Pharmacy Medicines', 'Prescription Only Medicines', "Controlled Drugs"]);
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
        Schema::dropIfExists('medicines');
    }
}
