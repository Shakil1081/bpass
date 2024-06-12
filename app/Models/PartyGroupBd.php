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

class PartyGroupBd extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'party_group_bds';

    protected $appends = [
        'logo_image_url',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'group_name',
        'group_name_local',
        'office_site_name',
        'annual_revenue',
        'num_employees',
        'ticker_symbol',
        'comments',
        'last_updated_stamp_id',
        'last_updated_tx_stamp',
        'employee_position_type_in_local',
        'group_brand_name',
        'tin_no',
        'vat_reg_no',
        'registratn_category',
        'bin_no',
        'acct_status',
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

    public function getLogoImageUrlAttribute()
    {
        $file = $this->getMedia('logo_image_url')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function last_updated_stamp()
    {
        return $this->belongsTo(User::class, 'last_updated_stamp_id');
    }
}
