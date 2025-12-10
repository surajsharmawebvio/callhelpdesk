@props([
    'type' => 'companies', // companies, category, company
    'categoryId' => null,
    'phoneNumber' => null,
    'companyName' => null,
    'title' => null
])

@php
    $feedUrl = match($type) {
        'category' => route('rss.companies.category', ['categoryId' => $categoryId]),
        'company' => route('rss.company', ['phoneNumber' => $phoneNumber, 'companyName' => $companyName]),
        default => route('rss.companies'),
    };

    $feedTitle = $title ?? match($type) {
        'category' => 'Company Category RSS Feed',
        'company' => 'Company RSS Feed',
        default => 'Companies RSS Feed',
    };
@endphp

<link rel="alternate" type="application/rss+xml" title="{{ $feedTitle }}" href="{{ $feedUrl }}" />
