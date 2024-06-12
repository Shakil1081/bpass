<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTermConditionsTable extends Migration
{
    public function up()
    {
        Schema::table('term_conditions', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_9802257')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by_id')->nullable();
            $table->foreign('updated_by_id', 'updated_by_fk_9802258')->references('id')->on('users');
            $table->unsignedBigInteger('non_purchase_order_id')->nullable();
            $table->foreign('non_purchase_order_id', 'non_purchase_order_fk_9802260')->references('id')->on('non_purchase_orders');
            $table->unsignedBigInteger('purchase_order_id')->nullable();
            $table->foreign('purchase_order_id', 'purchase_order_fk_9802261')->references('id')->on('purchase_orders');
        });
    }
}
