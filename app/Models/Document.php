<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
//    use SoftDeletes, HasFactory;
    use HasFactory;

//    public $table = 'documents';
    public $table = 'document';

    protected $guarded ;

    public function createdInfo()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedInfo()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function organizationInfo()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }
}
