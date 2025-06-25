<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechStack extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
        'category_id', 
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }
    
    public function portfolios()
    {
        return $this->belongsToMany(Portfolio::class, 'portfolio_tech_stack');
    }
}
