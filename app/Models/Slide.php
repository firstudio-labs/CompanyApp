<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = [
        'title', 'subtitle', 'description', 'image',
        'button_text', 'button_link', 'order', 'is_active'
    ];

    // Akses gambar dengan path lengkap
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : asset('assets/img/placeholder-image.png');
    }
}
