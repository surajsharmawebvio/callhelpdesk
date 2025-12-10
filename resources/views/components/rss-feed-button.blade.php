@props([
    'type' => 'companies',
    'categoryId' => null,
    'phoneNumber' => null,
    'companyName' => null,
    'text' => 'Subscribe to RSS Feed',
    'size' => 'md' // sm, md, lg
])

@php
    $feedUrl = match($type) {
        'category' => route('rss.companies.category', ['categoryId' => $categoryId]),
        'company' => route('rss.company', ['phoneNumber' => $phoneNumber, 'companyName' => $companyName]),
        default => route('rss.companies'),
    };

    $sizeClasses = match($size) {
        'sm' => 'px-3 py-1.5 text-sm',
        'lg' => 'px-6 py-3 text-lg',
        default => 'px-4 py-2 text-base',
    };
@endphp

<a href="{{ $feedUrl }}" 
   target="_blank"
   class="inline-flex items-center gap-2 {{ $sizeClasses }} bg-orange-500 hover:bg-orange-600 text-white font-medium rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md"
   title="Subscribe to RSS Feed">
    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M6.18 15.64a2.18 2.18 0 0 1 2.18 2.18C8.36 19 7.38 20 6.18 20C5 20 4 19 4 17.82a2.18 2.18 0 0 1 2.18-2.18M4 4.44A15.56 15.56 0 0 1 19.56 20h-2.83A12.73 12.73 0 0 0 4 7.27V4.44m0 5.66a9.9 9.9 0 0 1 9.9 9.9h-2.83A7.07 7.07 0 0 0 4 12.93V10.1z"/>
    </svg>
    <span>{{ $text }}</span>
</a>
