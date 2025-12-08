@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('css/company_detail.css') }}">

<div class="viewMainServer">
    <div>
        <div id="lay-fl" class="google-auto-placed">
            <div id="lay-fl-nav-left">
                <a href="/" title="CallHelpDesk">
                    <img src="/images/fav-1.png" alt="callhelpdesk logo" width="120">
                </a>
                <div>
                    <nav role="navigation" class="left list-block">
                        <a href="/">Home</a>
                        <a href="#">Search Company Customer Service Information</a>
                        <a href="/companies">Companies A-Z</a>
                        <a href="/about-us">About CallHelpDesk</a>
                    </nav>
                </div>
                <small>&copy; CallHelpDesk</small>
            </div>
            <div id="lay-fl-con">
                <div id="lay-fl-nav-top">
                    <a id="top" title="CallHelpDesk"></a>
                    <div id="nav-top-l">
                        <a href="/" title="Home"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -48 512 544"
                                class="home in-icon">
                                <path d="M448 256L256 32 64 256h48v160h96V288h96v128h96V256z"></path>
                            </svg>
                        </a>
                    </div>
                    <div id="nav-top-r"><a href="#" title="Search Companies">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -48 512 544" class="search in-icon">
                                <path
                                    d="M493 384L368 259c18-29 29-62 29-99 0-106-86-192-192-192S13 54 13 160s86 192 192 192c36 0 70-11 99-28l125 124c9 9 23 9 32 0l32-32c9-9 9-23 0-32zm-288-96c-71 0-128-57-128-128S134 32 205 32c70 0 128 57 128 128s-58 128-128 128z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div id="lay-fl-mandr">
                    <div id="lay-fl-main">

                        <div class="crumbs no-mob">
                            <div class="extremes">
                                <div class="trunc">
                                    <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                                        <li itemprop="itemListElement" itemtype="http://schema.org/ListItem"
                                            itemscope="">
                                            <a itemprop="item" class="p-r" href="/companies">
                                                <span itemprop="name">Phone Numbers & Contact Info</span>
                                                <meta itemprop="position" content="1" />
                                            </a>
                                            <span>&nbsp;&rsaquo;&nbsp;</span>
                                        </li>
                                        <li itemprop="itemListElement" itemtype="http://schema.org/ListItem"
                                            itemscope="">
                                            <a itemprop="item" class="p-r"
                                                href="/companies?letter={{ $currentLetter }}">
                                                <span itemprop="name">
                                                    @if(request('search'))
                                                    Search results for {{ request('search') }}
                                                    @else
                                                    Starts with the letter {{ strtoupper($currentLetter) }}
                                                    @endif
                                                </span>
                                                <meta itemprop="position" content="2" />
                                            </a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <h1>
                            @if(request('search'))
                            Search results for '{{ request('search') }}' - Page {{ $currentPage }} of {{ $totalPages }}
                            @else
                            Customer Service Information for Companies Starting with {{ strtoupper($currentLetter) }} -
                            Page {{ $currentPage }} of {{ $totalPages }}
                            @endif
                        </h1>

                        <!-- Alphabet Navigation -->
                        <div class="alphabet-nav">
                            <div class="alphabet-container">
                                @foreach(range('a', 'z') as $letter)
                                <a href="/companies?letter={{ $letter }}"
                                    class="alphabet-link @if($letter === $currentLetter) active @endif">
                                    {{ strtoupper($letter) }}
                                </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- Most Popular Companies Section -->
                        <div class="popular-companies">
                            <div>
                                <h3>
                                    @if(request('search'))
                                    Search results for '{{ request('search') }}' in Companies ({{ $totalCompanies }}
                                    found)
                                    @else
                                    Most Popular Letter {{ strtoupper($currentLetter) }} Companies
                                    ({{ $totalCompanies }} total)
                                    @endif
                                </h3>
                                <div class="company-search">
                                    <form action="/companies" method="GET" class="search-form-inline">
                                        <input type="text" name="search" class="search-input-inline"
                                            placeholder="Search companies..." value="{{ request('search') }}">
                                        <button type="submit" class="search-btn-inline">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="companies-grid">
                                @foreach($companies as $company)
                                <div class="company-card">
                                    <a href="{{ $company->url ?? '#' }}" class="company-link">
                                        <div class="company-name">{{ $company->name ?? '' }}</div>
                                        <div class="company-description">Customer Service Phone Number and Contact
                                            Information</div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Pagination -->
                        @if($totalPages > 1)
                        <div class="pagination">
                            <div class="pagination-container">
                                @if($currentPage > 1)
                                <a href="/companies?letter={{ $currentLetter }}&page={{ $currentPage - 1 }}{!! request('search') ? '&search=' . urlencode(request('search')) : '' !!}"
                                    class="pagination-link">
                                    ‹ Previous
                                </a>
                                @endif

                                @php
                                $visiblePages = [];
                                if ($totalPages <= 7) { $visiblePages=range(1, $totalPages); } else { if ($currentPage
                                    <=4) { $visiblePages=[1, 2, 3, 4, 5, '...' , $totalPages]; } elseif ($currentPage>=
                                    $totalPages - 3) {
                                    $visiblePages = [1, '...', $totalPages - 4, $totalPages - 3, $totalPages - 2,
                                    $totalPages - 1, $totalPages];
                                    } else {
                                    $visiblePages = [1, '...', $currentPage - 1, $currentPage, $currentPage + 1, '...',
                                    $totalPages];
                                    }
                                    }
                                    @endphp

                                    @foreach($visiblePages as $page)
                                    @if($page === '...')
                                    <span class="pagination-link">{{ $page }}</span>
                                    @else
                                    <a href="/companies?letter={{ $currentLetter }}&page={{ $page }}{!! request('search') ? '&search=' . urlencode(request('search')) : '' !!}"
                                        class="pagination-link @if($page === $currentPage) active @endif">
                                        {{ $page }}
                                    </a>
                                    @endif
                                    @endforeach

                                    @if($currentPage < $totalPages) <a
                                        href="/companies?letter={{ $currentLetter }}&page={{ $currentPage + 1 }}{!! request('search') ? '&search=' . urlencode(request('search')) : '' !!}"
                                        class="pagination-link">
                                        Next ›
                                        </a>
                                        @endif
                            </div>
                        </div>
                        @endif

                    </div>
                </div>

                <!-- Footer -->
                <div id="lay-fl-bottom">
                    <div class="sec-below">
                        <div>
                            <div class="list-tiled"><b>Was this page helpful?</b><a href="#">Yes</a><a href="#">Needs
                                    work</a></div>
                            <div class="mb-100">Sharing is what powers CallHelpDesk's free customer service contact
                                information and tools. You can help!</div>
                            <div class="social-links">
                                <a href="https://www.facebook.com/profile.php?id=61582322640364" rel="nofollow"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a href="https://x.com/callhelpdesk123" rel="nofollow"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.instagram.com/callhelpdesk4/?hl=en" rel="nofollow"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="crumbs">
                        <div>
                            <div>
                                <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                                    <li itemprop="itemListElement" itemtype="http://schema.org/ListItem" itemscope=""><a
                                            itemprop="item" class="p-r" href="/companies"><span itemprop="name">Phone
                                                Numbers & Contact Info</span>
                                            <meta itemprop="position" content="1" />
                                            </a><span>&nbsp;&rsaquo;&nbsp;</span></li>
                                    <li itemprop="itemListElement" itemtype="http://schema.org/ListItem" itemscope=""><a
                                            itemprop="item" class="p-r"
                                            href="/companies?letter={{ $currentLetter }}"><span
                                                itemprop="name">Companies Starting with
                                                {{ strtoupper($currentLetter) }}</span>
                                            <meta itemprop="position" content="2" /></a></li>
                                </ol>
                            </div>
                            <div class="small">Updated <time
                                    datetime="{{ now()->toIso8601String() }}">{{ now()->format('F d, Y') }}</time></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Import existing styles from Company.vue */
    .rich-content p img,
    .rich-content div img,
    .rich-content figure img,
    .rich-content span img,
    .rich-content img {
        width: 100% !important;
    }

    /* Navigation link colors */
    #lay-fl-nav-left a {
        color: white !important;
        opacity: 1 !important;
    }

    #lay-fl-nav-left a:hover {
        color: #f0f0f0 !important;
    }

    /* Sticky right sidebar */
    .sticky-top {
        position: sticky;
        top: 20px;
        height: fit-content;
    }

    @media (min-width: 752px) {
        #lay-fl-main {
            margin-left: 5.9%;
            flex: none;
            max-width: 90%;
        }
    }

    /* Live Agent Card */
    .live-agent-card {
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 100%;
        padding: 24px;
        margin: 20px 0;
    }

    .live-agent-card img {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 16px;
        border: 3px solid #1565ff;
    }

    .live-agent-card h2 {
        font-size: 20px;
        font-weight: 600;
        color: #0d2b66;
        margin-bottom: 8px;
    }

    .live-agent-card p {
        font-size: 14px;
        color: #555;
        line-height: 1.5;
        margin-bottom: 20px;
    }

    .call-button {
        display: inline-block;
        background-color: #1565ff;
        color: #fff;
        text-decoration: none;
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .call-button:hover {
        background-color: #0e4ad4;
    }

    /* Ringing animation for telephone icon */
    .call-button .bi-telephone {
        animation: ring 1s infinite;
        display: inline-block;
        margin-right: 5px;
    }

    @keyframes ring {
        0% {
            transform: rotate(0deg);
        }

        10% {
            transform: rotate(5deg);
        }

        20% {
            transform: rotate(-5deg);
        }

        30% {
            transform: rotate(5deg);
        }

        40% {
            transform: rotate(-5deg);
        }

        50% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(0deg);
        }
    }

    /* Alphabet Navigation */
    .alphabet-nav {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 20px;
        margin: 20px 0;
        text-align: center;
    }

    .alphabet-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 8px;
    }

    .alphabet-link {
        display: inline-block;
        width: 32px;
        height: 32px;
        line-height: 32px;
        text-align: center;
        text-decoration: none;
        color: #1565ff;
        background-color: #ffffff;
        border: 1px solid #e9ecef;
        border-radius: 4px;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .alphabet-link:hover {
        background-color: #1565ff;
        color: #ffffff;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(21, 101, 255, 0.2);
    }

    .alphabet-link.active {
        background-color: #1565ff;
        color: #ffffff;
        box-shadow: 0 2px 4px rgba(21, 101, 255, 0.3);
    }

    /* Popular Companies */
    .popular-companies h3 {
        color: #0d2b66;
        font-size: 20px;
        font-weight: 600;
        margin: 24px 0 16px 0;
    }

    .company-search {
        margin-bottom: 20px;
    }

    .search-form-inline {
        display: flex;
        align-items: center;
        gap: 8px;
        max-width: 400px;
    }

    .search-input-inline {
        flex: 1;
        padding: 8px 12px;
        border: 2px solid #e9ecef;
        border-radius: 6px;
        font-size: 14px;
        outline: none;
        transition: border-color 0.2s ease;
        height: 40px;
        box-sizing: border-box;
    }

    .search-input-inline:focus {
        border-color: #1565ff;
    }

    .search-btn-inline {
        padding: 8px 12px;
        background: linear-gradient(135deg, #1565ff, #0e4ad4);
        color: white;
        border: 2px solid transparent;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
        transition: all 0.2s ease;
        height: 48px;
        box-sizing: border-box;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .search-btn-inline:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(21, 101, 255, 0.3);
    }

    .companies-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 16px;
        margin: 20px 0;
    }

    .company-card {
        background-color: #ffffff;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 16px;
        transition: all 0.2s ease;
    }

    .company-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .company-link {
        text-decoration: none;
        color: inherit;
    }

    .company-name {
        font-size: 16px;
        font-weight: 600;
        color: #1565ff;
        margin-bottom: 4px;
        line-height: 1.4;
    }

    .company-name:hover {
        color: #0e4ad4;
    }

    .company-description {
        font-size: 14px;
        color: #666;
        line-height: 1.4;
    }

    /* Pagination */
    .pagination {
        margin: 40px 0;
        text-align: center;
    }

    .pagination-container {
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .pagination-link {
        display: inline-block;
        padding: 8px 12px;
        text-decoration: none;
        color: #1565ff;
        background-color: #ffffff;
        border: 1px solid #e9ecef;
        border-radius: 4px;
        font-weight: 500;
        transition: all 0.2s ease;
        min-width: 40px;
        text-align: center;
        cursor: pointer;
    }

    .pagination-link:hover {
        background-color: #f8f9fa;
        color: #0e4ad4;
    }

    .pagination-link.active {
        background-color: #1565ff;
        color: #ffffff;
        border-color: #1565ff;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .companies-grid {
            grid-template-columns: 1fr;
        }

        .alphabet-container {
            gap: 4px;
        }

        .alphabet-link {
            width: 28px;
            height: 28px;
            line-height: 28px;
            font-size: 14px;
        }

        .company-card {
            padding: 12px;
        }

        /* Mobile Pagination */
        .pagination-container {
            flex-wrap: wrap;
            justify-content: center;
            gap: 4px;
        }

        .pagination-link {
            padding: 6px 8px;
            font-size: 14px;
            min-width: 32px;
            height: 32px;
            line-height: 20px;
        }

        .pagination-link:first-child,
        .pagination-link:last-child {
            padding: 6px 12px;
            min-width: auto;
        }
    }

    /* Social Links */
    .social-links {
        display: flex;
        gap: 15px;
        margin-top: 20px;
        justify-content: center;
    }

    .social-links a {
        display: inline-block;
        width: 40px;
        height: 40px;
        background-color: #333;
        color: #ffffff;
        text-align: center;
        line-height: 40px;
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    .social-links a:hover {
        background-color: #1565ff;
        transform: translateY(-2px);
    }

/* Social media specific hover colors */
.social-links a[href*="facebook.com"]:hover {
    background-color: #1877F2;
}

.social-links a[href*="x.com"]:hover {
    background-color: #1DA1F2;
}

.social-links a[href*="instagram.com"]:hover {
    background-color: #E4405F;
}
</style>
@endsection
