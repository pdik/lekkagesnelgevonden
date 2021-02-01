<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuotationUrl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_url', function (Blueprint $table) {
            $table->string('token')->primary()->unique(); //Uniqe token
            $table->unsignedBigInteger('quotation_id');
            $table->string('tstamp')->nullable(); //Created time stamp
            $table->foreign('quotation_id')->references('id')->on('quotation')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotation_url');
    }
}
