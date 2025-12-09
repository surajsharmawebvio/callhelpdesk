<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PopularCompany extends Model
{
    protected $fillable = ['company_id', 'order'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
