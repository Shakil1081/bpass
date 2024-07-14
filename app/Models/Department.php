<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
//    use SoftDeletes, MultiTenantModelTrait, Auditable, HasFactory;
    use  MultiTenantModelTrait, Auditable, HasFactory;

//    public $table = 'departments';
    public $table = 'department';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'department_name',
        'organization_id',
        'created_by_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by','user_name');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
