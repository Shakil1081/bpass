<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRequisitionsTable extends Migration
{
    public function up()
    {
        Schema::table('requisitions', function (Blueprint $table) {
            $table->unsignedBigInteger('updated_by_id')->nullable();
            $table->foreign('updated_by_id', 'updated_by_fk_9802212')->references('id')->on('users');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id', 'department_fk_9802214')->references('id')->on('departments');
        });
    }
}
