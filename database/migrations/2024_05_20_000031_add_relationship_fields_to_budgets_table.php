<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBudgetsTable extends Migration
{
    public function up()
    {
        Schema::table('budgets', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_9802266')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by_id')->nullable();
            $table->foreign('updated_by_id', 'updated_by_fk_9802267')->references('id')->on('users');
            $table->unsignedBigInteger('assign_user_id')->nullable();
            $table->foreign('assign_user_id', 'assign_user_fk_9802279')->references('id')->on('users');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id', 'department_fk_9802280')->references('id')->on('departments');
            $table->unsignedBigInteger('organization_id')->nullable();
            $table->foreign('organization_id', 'organization_fk_9802281')->references('id')->on('organizations');
            $table->unsignedBigInteger('proposed_by_id')->nullable();
            $table->foreign('proposed_by_id', 'proposed_by_fk_9802282')->references('id')->on('users');
        });
    }
}
