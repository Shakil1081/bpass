<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPartyGroupBdsTable extends Migration
{
    public function up()
    {
        Schema::table('party_group_bds', function (Blueprint $table) {
            $table->unsignedBigInteger('last_updated_stamp_id')->nullable();
            $table->foreign('last_updated_stamp_id', 'last_updated_stamp_fk_9799753')->references('id')->on('users');
        });
    }
}
