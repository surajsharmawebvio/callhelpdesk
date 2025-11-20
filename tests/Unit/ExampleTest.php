<?php

use App\Models\Company;
use Illuminate\Foundation\Testing\DatabaseTransactions;

uses(DatabaseTransactions::class);

test('fetch 10 companies from database', function () {
    $companies = Company::limit(10)->get();
    
    print_r($companies);
});