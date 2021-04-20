<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReportRows extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_rows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('method_id')->index();
            $table->longText('data');
            $table->unsignedBigInteger('report_id')->index();
            $table->foreign('report_id')->references('id')->on('report')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_rows');
    }
}
