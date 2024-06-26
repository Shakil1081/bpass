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
        Schema::create('budget_details', function (Blueprint $table) {
            $table->id();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('budget_id')->nullable();
            $table->string('created_stamp')->nullable();
            $table->string('last_updated_stamp')->nullable();
            $table->string('budget_item_name')->nullable();
            $table->string('budget_item_ref_id')->nullable();
            $table->string('budget_item_type')->nullable();
            $table->string('quantity')->nullable();
            $table->string('tolerance')->nullable();
            $table->string('unit_price')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_details');
    }
};
