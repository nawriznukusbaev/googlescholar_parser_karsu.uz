<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGsprofileStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gsprofile_statistics', function (Blueprint $table) {
            $table->id();
            $table->text('fullname');
            $table->integer('citations');
            $table->integer('hIndex');
            $table->integer('i10Index');
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
        Schema::dropIfExists('gsprofile_statistics');
    }
}
