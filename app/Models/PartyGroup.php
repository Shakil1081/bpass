<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartyGroup extends Model
{
    use Auditable, HasFactory;

    public $table = 'PARTY_GROUP';

    protected $primaryKey = 'PARTY_ID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'party',
        'group_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getIdAttribute()
    {
        return $this->attributes['PARTY_ID'];
    }

    public function setIdAttribute($value)
    {
        $this->attributes['PARTY_ID'] = $value;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    // Define a scope for ordering by PARTY_ID
    public function scopeOrderByPartyId($query, $direction = 'DESC')
    {
        return $query->orderBy('PARTY_ID', $direction);
    }
}
