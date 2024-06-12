<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('actual_payable_amount', 15, 2);
            $table->decimal('advance_amount', 15, 2)->nullable();
            $table->string('amount_in_words')->nullable();
            $table->decimal('carr_load_up_amount', 15, 2)->nullable();
            $table->string('cell_no')->nullable();
            $table->integer('credit_limit')->nullable();
            $table->string('delivery_days')->nullable();
            $table->string('delivery_term')->nullable();
            $table->decimal('discount_amount', 15, 2)->nullable();
            $table->string('email')->nullable();
            $table->string('is_approve');
            $table->date('issue_date')->nullable();
            $table->string('means_of_transport')->nullable();
            $table->date('mpr_date')->nullable();
            $table->string('mpr_no')->nullable();
            $table->string('payment_term')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('place_of_delivery')->nullable();
            $table->string('place_of_lading')->nullable();
            $table->string('purchase_order_no')->nullable();
            $table->date('reference_date')->nullable();
            $table->string('reference_no')->nullable();
            $table->string('supplier_address')->nullable();
            $table->string('supplier')->nullable();
            $table->string('supplier_name')->nullable();
            $table->decimal('total_amount', 15, 2);
            $table->decimal('vat_amount', 15, 2)->nullable();
            $table->integer('is_deleted')->nullable();
            $table->date('deleted')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
