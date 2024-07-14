<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartyBill extends Model
{
//    use SoftDeletes, HasFactory;
    use  HasFactory;

//    public $table = 'party_bills';
    public $table = 'party_bill';

    protected $fillable = [
        'created_by',
        'updated_by',
        'supplier_id',
        'invoice_id',
        'created_stamp',
        'last_updated_stamp',
        'bill_ref_no',
    ];

    public function createdInfo()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedInfo()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

//    public function bankAccount()
//    {
//        return $this->belongsTo(BankAccount::class, 'bank_account_id');
//    }
}
