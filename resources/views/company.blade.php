@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="/css/company_detail.css">
@endpush

@section('content')
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
                                        @foreach($breadcrumbs as $index => $breadcrumb)
                                        <li itemprop="itemListElement" itemtype="http://schema.org/ListItem" itemscope="">
                                            <a itemprop="item" class="p-r" href="{{ $breadcrumb['url'] }}">
                                                <span itemprop="name">{{ $breadcrumb['title'] }}</span>
                                                <meta itemprop="position" content="{{ $index + 1 }}" />
                                            </a>
                                            @if(!$loop->last)
                                            <span>&nbsp;&rsaquo;&nbsp;</span>
                                            @endif
                                        </li>
                                        @endforeach
                                    </ol>
                                </div>
                                @if(optional($company)->updated_at)
                                <div class="small">
                                    Updated
                                    <time datetime="{{ $company->updated_at->toIso8601String() }}">{{ $company->updated_at->format('F d, Y') }}</time>
                                </div>
                                @endif
                            </div>
                        </div>

                        <h1>{{ $company->name ?? '' }} Customer Service</h1>
                        <h2>Phone Number & Contact Info</h2><a id="contact"></a>
                        <div class="card stk top">
                            <div>
                                <div>
                                    <h3>{{ $company->name ?? '' }} Best Phone Number</h3><a class="link-jumbo und"
                                        style="padding: 0.2rem 1px"
                                        title="{{ $company->name ?? '' }}'s best customer service phone number is {{ $company->phone ?? '' }}"
                                        href="tel:{{ $company->phone ?? '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -48 512 544"
                                            class="phone in-icon">
                                            <path
                                                d="M457 322c0 5-1 12-3 20-2 9-4 15-6 20-4 10-15 20-35 30-17 10-35 15-53 15-5 0-10 0-15-1s-10-2-16-4c-6-1-11-3-14-4s-8-3-16-6c-7-3-12-4-14-5-18-7-35-14-50-24-24-15-49-35-75-61s-47-51-62-76c-9-14-17-31-23-50-1-1-3-6-6-14-2-7-4-13-5-16s-3-7-5-13c-1-6-2-12-3-17-1-4-1-9-1-15 0-17 5-35 14-53 11-19 21-31 31-35 4-2 11-4 19-6 9-1 15-2 20-2h6c4 2 9 9 16 22 2 4 5 9 8 16 4 6 7 12 10 18l9 15c1 1 2 3 5 7s5 8 6 10c1 3 2 6 2 8 0 4-3 9-8 15-5 5-11 11-18 15-6 5-12 10-17 16-6 5-9 9-9 13 0 1 1 4 2 6 1 3 2 5 2 6 1 1 2 4 4 7s3 5 4 5c14 26 31 49 49 67 19 19 41 36 67 50 1 0 3 1 6 3s5 4 7 4c1 1 3 2 6 3 2 1 4 1 6 1 3 0 8-2 13-8 5-5 11-11 15-18 5-6 10-12 16-17 6-6 10-8 14-8 3 0 6 0 8 2 3 1 7 3 11 6 4 2 6 4 7 5 4 3 10 6 15 9s11 6 18 10c7 3 12 6 16 8 13 7 20 12 21 15 1 2 1 4 1 6z">
                                            </path>
                                        </svg><span>{{ $company->phone ?? '' }}</span></a>
                                    <div class="ul-pad tile-right" style="margin-bottom: 0">
                                        {!! $company->ulpad ?? '' !!}
                                    </div>
                                    <!--
                                    <div><b>Free tools for easier calling</b></div>
                                    <div class="ul-pad tile-right">
                                        <a style="margin-right: 1.5rem" class="und" href="#">
                                            We talk to them for you
                                        </a>
                                        <a style="margin-right: 1.5rem" class="und" href="#">
                                            Skip waiting on hold
                                        </a>
                                        <a style="margin-right: 1.5rem" class="und" href="#">
                                            Schedule a call
                                        </a>
                                    </div>
                                -->
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Section -->
                        @if(isset($company->questions) && count($company->questions) > 0)
                        <div class="card bot">
                            
                            @foreach($company->questions as $question)
                            <div>
                                <div class="ul-pad text-sembld"><span class="bul">Q:</span>
                                    <h3>{{ $question->question ?? '' }}</h3>
                                </div>
                                <div class="ul-pad mt-r"><span class="bul">A:</span><span>{!! $question->answer ?? ''
                                        !!}</span></div>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <br>
                        @endif

                        <!--
                        <div>
                            <div class="image-wrapper"><span class="ads-label">Ads</span><img
                                    src="https://picsum.photos/600/200?random=2" alt="Random image"
                                    style="width: 100%; height: 200px; border-radius: 8px; margin: 20px 0;"></div>

                        </div>

                        <div><a name="phone-numbers"></a>
                            <h2>{{ $company->name ?? '' }} Customer Phone Numbers</h2>
                            <div class="list-block mb-u">
                                <div class="list-block">
                                    <h3 class="min">Technical Support</h3><a class="link-med trunc und"
                                        style="margin-bottom: 0" href="tel:{{ $company->phone ?? '' }}"
                                        title="{{ $company->name ?? '' }}'s Technical Support phone number"><svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 -48 512 544"
                                            class="phone in-icon">
                                            <path
                                                d="M457 322c0 5-1 12-3 20-2 9-4 15-6 20-4 10-15 20-35 30-17 10-35 15-53 15-5 0-10 0-15-1s-10-2-16-4c-6-1-11-3-14-4s-8-3-16-6c-7-3-12-4-14-5-18-7-35-14-50-24-24-15-49-35-75-61s-47-51-62-76c-9-14-17-31-23-50-1-1-3-6-6-14-2-7-4-13-5-16s-3-7-5-13c-1-6-2-12-3-17-1-4-1-9-1-15 0-17 5-35 14-53 11-19 21-31 31-35 4-2 11-4 19-6 9-1 15-2 20-2h6c4 2 9 9 16 22 2 4 5 9 8 16 4 6 7 12 10 18l9 15c1 1 2 3 5 7s5 8 6 10c1 3 2 6 2 8 0 4-3 9-8 15-5 5-11 11-18 15-6 5-12 10-17 16-6 5-9 9-9 13 0 1 1 4 2 6 1 3 2 5 2 6 1 1 2 4 4 7s3 5 4 5c14 26 31 49 49 67 19 19 41 36 67 50 1 0 3 1 6 3s5 4 7 4c1 1 3 2 6 3 2 1 4 1 6 1 3 0 8-2 13-8 5-5 11-11 15-18 5-6 10-12 16-17 6-6 10-8 14-8 3 0 6 0 8 2 3 1 7 3 11 6 4 2 6 4 7 5 4 3 10 6 15 9s11 6 18 10c7 3 12 6 16 8 13 7 20 12 21 15 1 2 1 4 1 6z">
                                            </path>
                                        </svg><span>{{ $company->phone ?? '' }}</span></a>
                                    <div style="margin-bottom: 0"><span>Toll-free</span><span class="sep"> &middot;
                                        </span><span>24 hours, 7 days</span><span class="sep"> &middot;
                                        </span><span>Press 1 then 2 then 4 then enter the phone number associated
                                            with your account</span><span class="sep"> &middot; </span><em>Flash
                                            Services - not in English.</em><span class="sep"> &middot;
                                        </span><span>Free tools available: Talk for me, Skip the wait, Schedule my
                                            call</span></div>
                                    <div><a href="#">More details</a></div>
                                </div>
                            </div>
                            
                            <div>
                                <div>
                                    <div class="image-wrapper"><span class="ads-label">Ads</span><img
                                            src="https://picsum.photos/600/200?random=3" alt="Random image"
                                            style="width: 100%; height: 200px; border-radius: 8px; margin: 20px 0;">
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                         -->

                        <div class="rich-content" id="richContent">
                            {!! preg_replace('/<img([^>]+)>/', '<div class="image-wrapper"><span
                                        class="ads-label">Ads</span>
                                    <img$1>
                                </div>', $company->content ?? '') !!}
                        </div>

                        <!-- Show Author -->
                        @if($company->author)
                        <div class="author-section">
                            <h3 class="author-heading">About the Author</h3>
                            <a href="/author#{{ \Illuminate\Support\Str::slug($company->author->name) }}" class="author-card-link">
                                <div class="author-card">
                                    <div class="author-image-wrapper">
                                        @if($company->author->profile_image)
                                            <img src="{{ asset('storage/' . $company->author->profile_image) }}" 
                                                 alt="{{ $company->author->name }}" 
                                                 class="author-image"
                                                 onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($company->author->name) }}&size=150&background=4361ee&color=ffffff'">
                                        @else
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($company->author->name) }}&size=150&background=4361ee&color=ffffff" 
                                                 alt="{{ $company->author->name }}" 
                                                 class="author-image">
                                        @endif
                                    </div>
                                    <div class="author-content">
                                        <div class="author-header">
                                            <div>
                                                <h4 class="author-name">{{ $company->author->name }}</h4>
                                                <p class="author-designation">{{ $company->author->designation }}</p>
                                            </div>
                                        @if($company->author->linkedin_url || $company->author->twitter_url || $company->author->github_url || $company->author->website_url)
                                        <div class="author-social">
                                            @if($company->author->linkedin_url)
                                                <a href="{{ $company->author->linkedin_url }}" target="_blank" rel="noopener noreferrer" class="social-icon linkedin" title="LinkedIn">
                                                    <i class="fab fa-linkedin-in"></i>
                                                </a>
                                            @endif
                                            @if($company->author->twitter_url)
                                                <a href="{{ $company->author->twitter_url }}" target="_blank" rel="noopener noreferrer" class="social-icon twitter" title="Twitter">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            @endif
                                            @if($company->author->github_url)
                                                <a href="{{ $company->author->github_url }}" target="_blank" rel="noopener noreferrer" class="social-icon github" title="GitHub">
                                                    <i class="fab fa-github"></i>
                                                </a>
                                            @endif
                                            @if($company->author->website_url)
                                                <a href="{{ $company->author->website_url }}" target="_blank" rel="noopener noreferrer" class="social-icon website" title="Website">
                                                    <i class="fas fa-globe"></i>
                                                </a>
                                            @endif
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        @endif

                    </div>

                    <!-- Right Layout -->
                    <div id="lay-fl-right">
                        <!-- right add -->
                        <!-- Advertisement Section -->

                        <!-- Random 4:4 Image Banner -->
                        @if(isset($company->bottom_right_ad_image))
                        <div class="random-banner">
                            <div class="image-wrapper">
                                <span class="ads-label">Ads</span>
                                <img
                                    src="/storage/{{ $company->bottom_right_ad_image }}"
                                    alt="Company advertisement"
                                    style="width: 100%; height: auto; border-radius: 8px; margin-bottom: 20px;">
                            </div>
                        </div>
                        @endif

                        <div>
                            <div class="h4">What's on this page</div>
                            <nav class="list-block mb-u" role="navigation" id="headingsNav">
                                <!-- Headings will be populated by JavaScript -->
                            </nav>
                        </div>
                        <!-- Right Advertisement -->
                        @if(isset($company->right_ad_image))
                        <div class="sticky-top right-ad-container" style="text-align: center;">
                            <div class="image-wrapper"><span class="ads-label">Ads</span><img
                                    src="/storage/{{ $company->right_ad_image }}" alt="Company advertisement"
                                    class="right_ad"></div>

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
                                    @foreach($breadcrumbs as $index => $breadcrumb)
                                    <li itemprop="itemListElement" itemtype="http://schema.org/ListItem" itemscope="">
                                        <a itemprop="item" class="p-r" href="{{ $breadcrumb['url'] }}">
                                            <span itemprop="name">{{ $breadcrumb['title'] }}</span>
                                            <meta itemprop="position" content="{{ $index + 1 }}" />
                                        </a>
                                        @if(!$loop->last)
                                        <span>&nbsp;&rsaquo;&nbsp;</span>
                                        @endif
                                    </li>
                                    @endforeach
                                </ol>
                            </div>
                            @if (optional($company)->updated_at)
                                <div class="small">Updated <time
                                    datetime="{{ $company->updated_at->toIso8601String() }}">{{ $company->updated_at->format('F d, Y') }}</time></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Rich content images */
    .rich-content p img,
    .rich-content div img,
    .rich-content figure img,
    .rich-content span img,
    .rich-content img {
        width: 100% !important;
        height: auto !important;
        border-radius: 8px !important;
        margin: 20px 0 !important;
        transition: transform 0.3s ease, box-shadow 0.3s ease !important;
    }

    /* Rich content typography */
    .rich-content p {
        margin-bottom: 1rem !important;
        line-height: 1.6 !important;
    }

    .rich-content h1,
    .rich-content h2,
    .rich-content h3,
    .rich-content h4,
    .rich-content h5,
    .rich-content h6 {
        margin-top: 0.75rem !important;
        margin-bottom: 0.75rem !important;
        font-weight: 600 !important;
    }

    .rich-content ul,
    .rich-content ol {
        margin-left: 0 !important;
        margin-bottom: 1rem !important;
    }

    .rich-content a {
        color: var(--primary, #4361ee) !important;
        text-decoration: none !important;
    }

    .rich-content a:hover {
        text-decoration: underline !important;
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

    .right_ad {
        border-radius: 8px;
        margin: 15px;
        height: 95vh !important;
        width: auto !important;
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

    /* Random banner styling */
    .random-banner {
        margin: 20px 0;
        border-radius: 8px;
        overflow: hidden;
        /* box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); */
    }

    .random-banner img {
        width: 100%;
        height: auto;
        display: block;
        /* transition: transform 0.3s ease; */
    }

    .random-banner img:hover {
        /* transform: scale(1.05); */
    }

    /* Ads image wrapper */
    .image-wrapper {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    /* Image styling */
    .image-wrapper img {
        width: 100%;
        height: 200px;
        border-radius: 8px;
        margin: 20px 0;
        border: 1px solid #00000052;
    }

    /* Ads label hidden by default */
    .ads-label {
        position: absolute;
        top: 25px;
        left: 10px;
        background: rgb(195 195 195 / 37%);
        color: #ffffffc2;
        font-size: 12px;
        font-weight: bold;
        padding: 3px 8px;
        border-radius: 4px;
        opacity: 1;
        transition: opacity 0.3s ease;
    }

    /* Hide right ad on mobile */
    @media (max-width: 700px) {
        .right-ad-container {
            display: none;
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
    a.p-r {
        color: var(--primary, #4361ee) !important;
        text-decoration: none !important;
    }

    /* Author Section Styles */
    .author-section {
        margin-top: 2rem;
        margin-bottom: 1.5rem;
    }

    .author-heading {
        font-size: 1.125rem;
        font-weight: 600;
        color: #1a202c;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #4361ee;
        display: inline-block;
    }

    .author-card-link {
        text-decoration: none;
        display: block;
        color: inherit;
    }

    .author-card {
        display: flex;
        gap: 1.25rem;
        padding: 1.25rem;
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border-radius: 12px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
        border: 1px solid #e5e7eb;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        align-items: flex-start;
        cursor: pointer;
    }

    .author-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 20px rgba(67, 97, 238, 0.12);
    }

    .author-card-link:hover .author-card {
        border-color: #4361ee;
    }

    .author-image-wrapper {
        flex-shrink: 0;
        position: relative;
    }

    .author-image {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #4361ee;
        box-shadow: 0 4px 12px rgba(67, 97, 238, 0.15);
        transition: transform 0.3s ease;
    }

    .author-card:hover .author-image {
        transform: scale(1.05);
    }

    .author-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .author-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .author-name {
        font-size: 1.125rem;
        font-weight: 600;
        color: #1a202c;
        margin: 0 0 0.375rem 0;
        line-height: 1.3;
    }

    .author-designation {
        font-size: 0.875rem;
        font-weight: 600;
        color: #4361ee;
        margin: 0;
        padding: 0.2rem 0.6rem;
        background: rgba(67, 97, 238, 0.1);
        border-radius: 16px;
        display: inline-block;
    }

    .author-bio {
        font-size: 0.9rem;
        line-height: 1.6;
        color: #4a5568;
        margin: 0;
        text-align: justify;
    }

    .author-social {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }

    .social-icon {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        text-decoration: none;
        font-size: 0.875rem;
        transition: all 0.3s ease;
        background: #fff;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    }

    .social-icon.linkedin {
        color: #0077b5;
    }

    .social-icon.linkedin:hover {
        background: #0077b5;
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0, 119, 181, 0.3);
    }

    .social-icon.twitter {
        color: #1da1f2;
    }

    .social-icon.twitter:hover {
        background: #1da1f2;
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(29, 161, 242, 0.3);
    }

    .social-icon.github {
        color: #333;
    }

    .social-icon.github:hover {
        background: #333;
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(51, 51, 51, 0.3);
    }

    .social-icon.website {
        color: #4361ee;
    }

    .social-icon.website:hover {
        background: #4361ee;
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .author-card {
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 1.25rem;
        }

        .author-header {
            flex-direction: column;
            align-items: center;
        }

        .author-bio {
            text-align: center;
        }

        .author-image {
            width: 70px;
            height: 70px;
        }

        .author-name {
            font-size: 1rem;
        }

        .author-social {
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .author-section {
            margin-top: 1.5rem;
        }

        .author-heading {
            font-size: 1rem;
        }

        .author-card {
            padding: 1rem;
            gap: 0.75rem;
        }

        .author-image {
            width: 60px;
            height: 60px;
            border: 2px solid #4361ee;
        }

        .social-icon {
            width: 28px;
            height: 28px;
            font-size: 0.8rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Process content to add IDs to headings
        const richContent = document.getElementById('richContent');
        if (richContent) {
            const headings = richContent.querySelectorAll('h2');
            const headingsNav = document.getElementById('headingsNav');

            headings.forEach(h2 => {
                const id = h2.textContent.trim().toLowerCase().replace(/\s+/g, '-').replace(/[^\w-]/g,
                    '');
                h2.id = id;

                // Add to navigation
                if (headingsNav) {
                    const link = document.createElement('a');
                    link.href = '#' + id;
                    link.textContent = h2.textContent.trim();
                    link.addEventListener('click', function (e) {
                        if (window.innerWidth >= 768) {
                            e.preventDefault();
                            const stickyCard = document.querySelector('.card.stk.top');
                            let offset = 0;
                            if (stickyCard) {
                                offset = stickyCard.offsetHeight + 20; // Add some padding
                            }
                            const elementPosition = h2.getBoundingClientRect().top;
                            const offsetPosition = elementPosition + window.pageYOffset - offset;
                            
                            window.scrollTo({
                                top: offsetPosition,
                                behavior: 'smooth'
                            });
                        }
                    });
                    headingsNav.appendChild(link);
                }
            });
        }
    });

    // where id is richContent is div and it includes img then update alt="image url"
    document.addEventListener('DOMContentLoaded', function () {
        const richContent = document.getElementById('richContent');
        if (richContent) {
            const images = richContent.getElementsByTagName('img');
            for (let img of images) {
                if (!img.alt || img.alt.trim() === '') {
                    img.alt = img.src;
                }
            }
        }
    });

    // Ads label positioning relative to image
    document.addEventListener('DOMContentLoaded', function () {
        const wrappers = document.querySelectorAll('.image-wrapper');
        wrappers.forEach(wrapper => {
            const label = wrapper.querySelector('.ads-label');
            const img = wrapper.querySelector('img');
            
            if (label && img) {
                // Function to position label relative to image
                function positionLabel() {
                    const imgRect = img.getBoundingClientRect();
                    const wrapperRect = wrapper.getBoundingClientRect();
                    
                    // Calculate position relative to wrapper
                    const relativeTop = imgRect.top - wrapperRect.top + 10; // 10px from top of image
                    const relativeLeft = imgRect.left - wrapperRect.left + 10; // 10px from left of image
                    
                    label.style.position = 'absolute';
                    label.style.top = relativeTop + 'px';
                    label.style.left = relativeLeft + 'px';
                    label.style.opacity = '1'; // Always visible
                }
                
                // Position on load and resize
                positionLabel();
                window.addEventListener('resize', positionLabel);
            }
        });
    });</script>
@endsection
