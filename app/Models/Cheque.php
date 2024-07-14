<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cheque extends Model
{
//    use SoftDeletes, HasFactory;
    use  HasFactory;

//    public $table = 'cheques';
    public $table = 'cheque';

    protected $fillable = [
        'created_by',
        'updated_by',
        'created_stamp',
        'last_updated_stamp',
        'cheque_amount',
        'cheque_date',
        'cheque_no',
        'bank_account_id',
    ];

    public function createdInfo()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedInfo()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class, 'bank_account_id');
    }
}
