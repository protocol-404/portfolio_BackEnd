<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'title',
        'bio',
        'avatar',
        'resume_url', // Updated from resume to resume_url
        'email',
        'phone',
        'location',
        'github',
        'linkedin',
        'twitter',
        'website',
    ];
}
