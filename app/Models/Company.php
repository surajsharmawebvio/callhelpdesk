<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Company extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'company';

    protected $primaryKey = '_id';
    protected $keyType = 'string';

    protected $fillable = [
        'content',
        'name',
        'phone',
        'ulpad',
        'url',
        'ad_id',
        'popup_id',
    ];
}
