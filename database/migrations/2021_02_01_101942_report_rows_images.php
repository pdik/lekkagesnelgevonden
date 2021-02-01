<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReportRowsImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_rows_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('report_rows_id')->index();
            $table->string('src');
            $table->foreign('report_rows_id')->references('id')->on('report_rows')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_rows_images');
    }
}
