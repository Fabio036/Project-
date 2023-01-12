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
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->default('Onbekend');
            $table->string('email')->default('Onbekend');
            $table->string('phone')->default('Onbekend');
            $table->string('location')->default('Onbekend');
            $table->string('education')->default('Onbekend');
            $table->string('drivers_license')->default(json_encode(['Onbekend']));
            $table->string('languages')->default(json_encode(['Onbekend']));
            $table->integer('years_experience')->default(0);
            $table->string('availability')->default('Onbekend');
            $table->string('level')->default('Onbekend');
            $table->string('preferred_hours')->default('Onbekend');
            $table->string('preferred_contract')->default('Onbekend');
            $table->integer('preferred_max_distance')->default(50);
            $table->string('preferred_function')->default('Onbekend');
            $table->string('preferred_min_wage')->default('Onbekend');
            $table->string('werkzoeken_url')->nullable();
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
        Schema::dropIfExists('cvs');
    }
};
