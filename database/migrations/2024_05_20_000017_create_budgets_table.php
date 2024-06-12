<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetsTable extends Migration
{
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('budget_amount', 15, 2);
            $table->date('budget_date');
            $table->string('budget_for')->nullable();
            $table->string('budget_name')->nullable();
            $table->string('budget_reference');
            $table->string('close_reason')->nullable();
            $table->string('expense_type')->nullable();
            $table->string('is_closed')->nullable();
            $table->string('purpose')->nullable();
            $table->longText('remarks')->nullable();
            $table->date('valid_up_to')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
