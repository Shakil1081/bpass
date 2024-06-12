<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermConditionsTable extends Migration
{
    public function up()
    {
        Schema::create('term_conditions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('term')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
