<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Budget extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'budgets';

    protected $dates = [
        'budget_date',
        'valid_up_to',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'created_by_id',
        'updated_by_id',
        'budget_amount',
        'budget_date',
        'budget_for',
        'budget_name',
        'budget_reference',
        'close_reason',
        'expense_type',
        'is_closed',
        'purpose',
        'remarks',
        'valid_up_to',
        'assign_user_id',
        'department_id',
        'organization_id',
        'proposed_by_id',
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

    public function getBudgetDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBudgetDateAttribute($value)
    {
        $this->attributes['budget_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getValidUpToAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setValidUpToAttribute($value)
    {
        $this->attributes['valid_up_to'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function assign_user()
    {
        return $this->belongsTo(User::class, 'assign_user_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public function proposed_by()
    {
        return $this->belongsTo(User::class, 'proposed_by_id');
    }
}
