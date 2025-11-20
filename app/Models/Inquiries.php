<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiries extends Model
{
    protected $table = 'inquiries';

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];
}
