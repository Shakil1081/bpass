<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartyTablesTable extends Migration
{
    public function up()
    {
        Schema::create('party_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('party_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
