<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartyGroupBdsTable extends Migration
{
    public function up()
    {
        Schema::create('party_group_bds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('group_name');
            $table->string('group_name_local')->nullable();
            $table->string('office_site_name');
            $table->decimal('annual_revenue', 15, 2)->nullable();
            $table->integer('num_employees');
            $table->string('ticker_symbol')->nullable();
            $table->string('comments')->nullable();
            $table->string('last_updated_tx_stamp')->nullable();
            $table->string('employee_position_type_in_local')->nullable();
            $table->string('group_brand_name')->nullable();
            $table->string('tin_no')->unique();
            $table->string('vat_reg_no')->nullable();
            $table->string('registratn_category')->nullable();
            $table->string('bin_no')->nullable();
            $table->string('acct_status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
