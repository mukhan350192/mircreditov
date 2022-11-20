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
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo');
            $table->string('priority');
            $table->integer('max_amount');
            $table->integer('age_min');
            $table->integer('age_max');
            $table->integer('consideration_period');
            $table->integer('period_min');
            $table->integer('period_max')->nullable();
            $table->integer('amount_deal')->default(0);
            $table->integer('amount_lead')->default(0);
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
        Schema::dropIfExists('company');
    }
};
