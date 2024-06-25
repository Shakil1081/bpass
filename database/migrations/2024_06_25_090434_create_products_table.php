<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('non_purchase_order_id')->nullable();
            $table->integer('purchase_order_id')->nullable();
            $table->integer('budget_id')->nullable();
            $table->integer('budget_details_id')->nullable();
            $table->string('created_stamp')->nullable();
            $table->string('last_updated_stamp')->nullable();
            $table->string('brand')->nullable();
            $table->string('goods_receive_date')->nullable();
            $table->string('item_name')->nullable();
            $table->string('origin')->nullable();
            $table->string('quantity')->nullable();
            $table->string('serial_no')->nullable();
            $table->string('size_or_capacity')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('uom')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
