<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class NonPurchaseOrder extends Model
{
//    use SoftDeletes, Auditable, HasFactory;
    use  Auditable, HasFactory;

//    public $table = 'non_purchase_orders';
    public $table = 'non_purchase_order';

    protected $dates = [
        'entry_date',
        'reference_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'created_by',
        'updated_by',
        'actual_payable_amount',
        'advance_amount',
        'cell_no',
        'amount_in_words',
        'credit_limit',
        'discount_amount',
        'email',
        'entry_date',
        'non_purchase_order_no',
        'payment_term',
        'reference_date',
        'reference_no',
        'supplier',
        'supplier_address',
        'total_amount',
        'vat_tax',
        'organization_id',
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

    public function getEntryDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEntryDateAttribute($value)
    {
        $this->attributes['entry_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getReferenceDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setReferenceDateAttribute($value)
    {
        $this->attributes['reference_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }


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
