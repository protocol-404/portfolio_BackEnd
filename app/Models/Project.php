<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'url',
        'github_url',
        'completed_date',
        'technologies', // New field
        'status', // New field
    ];

    protected $casts = [
        'completed_date' => 'date',
    ];
}
