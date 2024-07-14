<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TermCondition extends Model
{
//    use SoftDeletes, Auditable, HasFactory;
    use SoftDeletes, Auditable, HasFactory;

//    public $table = 'term_conditions';
    public $table = 'term_condition';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'created_by_id',
        'updated_by_id',
        'term',
        'non_purchase_order_id',
        'purchase_order_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function updated_by()
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }

    public function non_purchase_order()
    {
        return $this->belongsTo(NonPurchaseOrder::class, 'non_purchase_order_id');
    }

    public function purchase_order()
    {
        return $this->belongsTo(PurchaseOrder::class, 'purchase_order_id');
    }
}
