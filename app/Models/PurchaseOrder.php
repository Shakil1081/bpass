<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrder extends Model
{
    use SoftDeletes, MultiTenantModelTrait, Auditable, HasFactory;

    public $table = 'purchase_orders';

    protected $dates = [
        'issue_date',
        'mpr_date',
        'reference_date',
        'deleted',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'updated_by_id',
        'actual_payable_amount',
        'advance_amount',
        'amount_in_words',
        'carr_load_up_amount',
        'cell_no',
        'credit_limit',
        'delivery_days',
        'delivery_term',
        'discount_amount',
        'email',
        'is_approve',
        'issue_date',
        'means_of_transport',
        'mpr_date',
        'mpr_no',
        'payment_term',
        'payment_type',
        'place_of_delivery',
        'place_of_lading',
        'purchase_order_no',
        'reference_date',
        'reference_no',
        'supplier_address',
        'supplier',
        'supplier_name',
        'total_amount',
        'vat_amount',
        'organization_id',
        'approved_by_id',
        'is_deleted',
        'deleted',
        'created_at',
        'requisition_id',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function updated_by()
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }

    public function getIssueDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setIssueDateAttribute($value)
    {
        $this->attributes['issue_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getMprDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setMprDateAttribute($value)
    {
        $this->attributes['mpr_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
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

    public function approved_by()
    {
        return $this->belongsTo(User::class, 'approved_by_id');
    }

    public function getDeletedAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDeletedAttribute($value)
    {
        $this->attributes['deleted'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function requisition()
    {
        return $this->belongsTo(Requisition::class, 'requisition_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
