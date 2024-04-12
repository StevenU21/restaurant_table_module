<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Assignment extends Model
{
    use HasFactory;
    use LogsActivity;

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
