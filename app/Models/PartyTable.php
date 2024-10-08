<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartyTable extends Model
{
//    use SoftDeletes, Auditable, HasFactory;
    use Auditable, HasFactory;

//    public $table = 'party_tables';
    public $table = 'party_table';
    public $timestamps = false;
    protected $casts = [
        'id' => 'string',  // Ensure this line does not exist for the 'id' field
    ];
//    protected $dates = [
//        'created_at',
//        'updated_at',
//        'deleted_at',
//    ];

    protected $fillable = [
        'id',
        'party_name',
//        'created_at',
//        'updated_at',
//        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
