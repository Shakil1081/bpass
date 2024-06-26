<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BudgetDetails extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'budget_details';

    protected $fillable = [
        'created_by',
        'updated_by',
        'budget_id',
        'created_stamp',
        'last_updated_stamp',
        'budget_item_name',
        'budget_item_ref_id',
        'budget_item_type',
        'quantity',
        'tolerance',
        'unit_price',
    ];

    public function createdInfo()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedInfo()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function budgetInfo()
    {
        return $this->belongsTo(Budget::class, 'budget_id');
    }
}
