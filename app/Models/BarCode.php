<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BarCode extends Model
{
//    use SoftDeletes, HasFactory;
    use  HasFactory;

//    public $table = 'bar_codes';
    public $table = 'bar_code';

    protected $fillable = [
        'created_by',
        'updated_by',
        'created_stamp',
        'last_updated_stamp',
        'bar_code',
        'invoice_id'
    ];

    public function createdInfo()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedInfo()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
