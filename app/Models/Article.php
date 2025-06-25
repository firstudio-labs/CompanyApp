<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'image_url',
        'author',
        'published_at',
        'service_id',
        'slug',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
