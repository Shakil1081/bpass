<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankAccount extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'bank_accounts';

    protected $fillable = [
        'created_by',
        'updated_by',
        'finance_bank_id',
        'routing_number',
        'organization_id',
        'created_stamp',
        'last_updated_stamp',
        'account_name',
        'account_no',
        'branch_name',
    ];

    public function createdInfo()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedInfo()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function finance_bank(){
        return $this->belongsTo(FinanceBank::class, 'finance_bank_id');
    }

    public function organization_info(){
        return $this->belongsTo(Organization::class, 'organization_id');
    }
}
