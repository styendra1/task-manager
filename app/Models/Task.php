<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'status',
        'start_date',
        'end_date',
    ];

    // Add this to cast dates properly
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
}
