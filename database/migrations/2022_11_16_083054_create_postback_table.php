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
        Schema::create('postback', function (Blueprint $table) {
            $table->id();
            $table->integer('typeID');
            $table->string('clickID');
            $table->integer('companyID');
            $table->integer('companyType');
            $table->string('transactionID');
            $table->integer('amount');
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
        Schema::dropIfExists('postback');
    }
};
