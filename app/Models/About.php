<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'abouts';

    protected $fillable = [
        'text_banner',
        'image_banner',
        'title',
        'subtitle',
        'description',
        'image_url',
        'location',
        'email',
        'phone',
        'website',
        'vision',
        'mission',
    ];
}
