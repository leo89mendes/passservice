<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $casts = [
        'desktop' => 'json',
        'mobile' => 'json',
    ];

    protected $fillable = ['desktop', 'mobile'];
}
