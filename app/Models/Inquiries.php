<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiries extends Model
{
    protected $table = 'inquiries';

    protected $fillable = [
        'first_name',
        'last_name',
        'name',
        'email',
        'phone',
        'subject',
        'message',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Accessor to get full name
    public function getFullNameAttribute()
    {
        if ($this->first_name && $this->last_name) {
            return $this->first_name . ' ' . $this->last_name;
        }
        return $this->name ?? 'N/A';
    }
}
