<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requisition extends Model
{
//    use SoftDeletes, Auditable, HasFactory;
    use Auditable, HasFactory;

//    public $table = 'requisitions';
    public $table = 'requisition';

    protected $dates = [
        'requisition_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'updated_by_id',
        'requisition_date',
        'department_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function updated_by()
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }

    public function getRequisitionDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setRequisitionDateAttribute($value)
    {
        $this->attributes['requisition_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
