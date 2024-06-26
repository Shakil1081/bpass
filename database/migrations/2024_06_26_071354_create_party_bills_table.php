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
        Schema::create('party_bills', function (Blueprint $table) {
            $table->id();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->integer('invoice_id')->nullable();
            $table->string('created_stamp')->nullable();
            $table->string('last_updated_stamp')->nullable();
            $table->string('bill_ref_no')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('party_bills');
    }
};
