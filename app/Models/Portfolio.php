<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_url',
        'link',
        'slug',
        'service_id',
    ];

    // Relasi many-to-many dengan TechStack
    public function techStacks()
    {
        return $this->belongsToMany(TechStack::class, 'portfolio_tech_stack');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
