<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Training extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'title',
        'city',
        'start_date',
        'end_date',
        'schedule_details',
        'slug',
        'content',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'schedule_details' => 'array',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logAll()
        ->logOnlyDirty();
    }
}
