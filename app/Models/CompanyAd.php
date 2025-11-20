<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyAd extends Model
{
    protected $table = 'company_ads';

    protected $fillable = [
        'company_id',
        'image_path',
        'phone',
        'title',
    ];
}
