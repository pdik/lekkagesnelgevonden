<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
      	    $table->bigIncrements('id');
			$table->string('name');
			$table->string('file_name')->unique();
			$table->string('extension');
			$table->string('size');
			$table->string('folder_id')->default(0);
			$table->string('user_id')->nullable();
			$table->timestamps();
        });
        	Schema::create('folders', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name');
			$table->string('parent_id');
			$table->string('user_id');
			$table->timestamps();
		});

		Schema::create('shared', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('share_type');
			$table->string('share_id');
			$table->string('user_id');
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
        Schema::dropIfExists('files');
        Schema::dropIfExists('folders');
        Schema::dropIfExists('shared');
    }
}
