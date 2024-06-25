<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChequeDetails extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'cheque_details';

    protected $fillable = [
        'created_by',
        'updated_by',
        'cheque_id',
        'created_stamp',
        'last_updated_stamp',
    ];

    public function createdInfo()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedInfo()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function chequeInfo()
    {
        return $this->belongsTo(Cheque::class, 'cheque_id');
    }
}
