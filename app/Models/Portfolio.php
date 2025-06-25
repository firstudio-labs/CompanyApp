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
        // Jika relasi many-to-many, hapus 'tech_stack_id' dari fillable
    ];

    // Jika satu portfolio hanya punya satu tech stack:
    public function techStack()
    {
        return $this->belongsTo(TechStack::class, 'tech_stack_id');
    }

    // Jika satu portfolio bisa punya banyak tech stack:
    public function techStacks()
    {
        return $this->belongsToMany(TechStack::class, 'portfolio_tech_stack');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
