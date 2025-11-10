<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyPost extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'company_posts';

    protected $fillable = [
        'company_id',
        'image_path',
        'title',
        'url',
    ];
}
