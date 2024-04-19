<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Assignment extends Model
{
    use HasFactory;
    use LogsActivity;
    use HasSlug;

    protected $fillable = [
        'register_date',
        'register_time',
        'assignment_type',
        'table_id',
        'client_id',
        'user_id',
        'state',
        'reservation_date',
        'reservation_time',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(function ($assignment) {
                return $assignment->client->name . '_' .  $assignment->table_number;
            })
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['register_date', 'register_time', 'assignment_type', 'table_id', 'client_id', 'user_id', 'state', 'reservation_date', 'reservation_time']);
    }
}
