<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartyGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('party_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('party')->unique();
            $table->string('group_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
