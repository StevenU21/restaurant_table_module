<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Type extends Model
{
    use HasFactory;
    use LogsActivity;
    use HasSlug;

    protected $fillable = [
        'name',
        'unit_price',
        'capacity'
    ];

    public function table()
    {
        return $this->hasMany(Table::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'unit_price', 'capacity']);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function getCache($perPage, $page)
    {
        return Cache::remember('types.page.' . $page, 60, function () use ($perPage) {
            return self::paginate($perPage);
        });
    }
}
