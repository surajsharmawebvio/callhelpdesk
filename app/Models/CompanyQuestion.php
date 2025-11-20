<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyQuestion extends Model
{
    protected $table = 'company_questions';

    protected $fillable = [
        'company_id',
        'question',
        'answer',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
