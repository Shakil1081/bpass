<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNonPurchaseOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('non_purchase_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('actual_payable_amount', 15, 2);
            $table->decimal('advance_amount', 15, 2)->nullable();
            $table->string('cell_no')->nullable();
            $table->string('amount_in_words')->nullable();
            $table->decimal('credit_limit', 15, 2)->nullable();
            $table->decimal('discount_amount', 15, 2)->nullable();
            $table->string('email');
            $table->date('entry_date')->nullable();
            $table->string('non_purchase_order_no')->nullable();
            $table->string('payment_term')->nullable();
            $table->date('reference_date')->nullable();
            $table->string('reference_no')->nullable();
            $table->integer('supplier')->nullable();
            $table->longText('supplier_address')->nullable();
            $table->decimal('total_amount', 15, 2);
            $table->string('vat_tax')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
