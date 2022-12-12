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
        Schema::create('company_epc', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->integer('click_count')->default(0);
            $table->double('amount')->default(0);
            $table->double('epc')->default(0);
            $table->timestamps();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_epc');
    }
};
