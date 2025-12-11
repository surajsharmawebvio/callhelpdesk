<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyRequest extends Model
{
    protected $fillable = [
        'business_name',
        'email',
        'website',
        'category',
        'address',
        'country_code',
        'country_name',
        'phone',
        'description',
        'document_path',
        'status',
        'admin_notes',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
