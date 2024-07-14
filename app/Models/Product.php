<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
//    use SoftDeletes, HasFactory;
    use HasFactory;

//    public $table = 'products';
    public $table = 'product';

    protected $fillable = [
        'created_by',
        'updated_by',
        'non_purchase_order_id',
        'purchase_order_id',
        'budget_id',
        'budget_details_id',
        'created_stamp',
        'last_updated_stamp',
        'brand',
        'goods_receive_date',
        'item_name',
        'origin',
        'quantity',
        'serial_no',
        'size_or_capacity',
        'unit_price',
        'uom',
    ];

    public function createdInfo()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedInfo()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function nonPurchasedInfo()
    {
        return $this->belongsTo(NonPurchaseOrder::class, 'non_purchase_order_id');
    }

    public function purchasedInfo()
    {
        return $this->belongsTo(PurchaseOrder::class, 'purchase_order_id');
    }

    public function budgetInfo()
    {
        return $this->belongsTo(Budget::class, 'budget_id');
    }

//    public function budgetDetailsInfo()
//    {
//
//    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function($model) {
            if (Auth::user()){
                $model->created_by = Auth::user()->id;
            }
        });

        self::updating(function($model) {
            if (Auth::user()){
                $model->updated_by = Auth::user()->id;
            }
        });

    }
}
