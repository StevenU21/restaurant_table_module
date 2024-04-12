<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Table extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'table_number',
        'capacity',
        'table_type',
        'status',
        'type_id'
    ];

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
