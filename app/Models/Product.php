<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_url',
        'link',
        'service_id',
        'slug',
    ];

    public function techStacks()
    {
        return $this->belongsToMany(TechStack::class, 'product_tech_stack');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
