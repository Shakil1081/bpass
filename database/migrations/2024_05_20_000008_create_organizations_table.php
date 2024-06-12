<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('address');
            $table->string('is_corporate');
            $table->string('name')->unique();
            $table->string('short_name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
