<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Organization extends Model implements HasMedia
{
//    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;
    use InteractsWithMedia, Auditable, HasFactory;

//    public $table = 'organizations';
    public $table = 'organization';

    protected $appends = [
        'logo',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

//    public const IS_CORPORATE_SELECT = [
//        'Yes' => 'Yes',
//        'No'  => 'No',
//    ];

    public const IS_CORPORATE_SELECT = [
        'Y' => 'Yes',
        'N'  => 'No',
    ];

    protected $fillable = [
        'created_by_id',
        'updated_by_id',
        'address',
        'is_corporate',
        'name',
        'short_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by','user_name');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by','user_name');
    }

    public function getLogoAttribute()
    {
        $file = $this->getMedia('logo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }
}
