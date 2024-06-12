<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanceBanksTable extends Migration
{
    public function up()
    {
        Schema::create('finance_banks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('updated_by')->nullable();
            $table->string('finance_bank_name')->unique();
            $table->string('routing_number')->unique();
            $table->string('short_name')->nullable();
            $table->string('swift_code')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
