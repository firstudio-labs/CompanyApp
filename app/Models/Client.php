<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_logo',
        'service_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
