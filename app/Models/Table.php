<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Table extends Model
{
    use HasFactory;
    use LogsActivity;
    use HasSlug;

    protected $fillable = [
        'table_number',
        'capacity',
        'table_type',
        'status',
        'type_id'
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(function ($table) {
                return $table->table_number . '-' . $table->table_type;
            })
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function scopeAvailable($query)
    {
        return $query->where('status', '=', 'disponible');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['table_number', 'capacity', 'table_type', 'unit_price', 'status', 'type_id']);
    }
}
