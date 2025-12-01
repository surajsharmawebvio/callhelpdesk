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
                                        <li itemprop="itemListElement" itemtype="http://schema.org/ListItem"
                                            itemscope="">
                                            <a itemprop="item" class="p-r" href="/companies">
                                                <span itemprop="name">All Companies</span>
                                                <meta itemprop="position" content="1" />
                                            </a>
                                            <span>&nbsp;&rsaquo;&nbsp;</span>
                                        </li>
                                        <li itemprop="itemListElement" itemtype="http://schema.org/ListItem"
                                            itemscope="">
                                            <a itemprop="item" class="p-r" href="{{ $company->url ?? '#' }}">
                                                <span itemprop="name">{{ $company->name ?? '' }}</span>
                                                <meta itemprop="position" content="2" />
                                            </a>
                                        </li>
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

                    </div>

                    <!-- Right Layout -->
                    <div id="lay-fl-right">
                        <!-- right add -->
                        <!-- Advertisement Section -->

                        <!-- Random 4:4 Image Banner -->
                        @if(isset($company->bottom_right_ad_image))
                        <div class="random-banner">
                            <div class="image-wrapper"><span class="ads-label">Ads</span><img
                                    src="/storage/{{ $company->bottom_right_ad_image }}"
                                    alt="Company advertisement"
                                    style="width: 100%; height: auto; border-radius: 8px; margin-bottom: 20px;"></div>

                        </div>
                        @endif

                        <div>
                            <div class="h4">What's on this page</div>
                            <nav class="list-block mb-u" role="navigation" id="headingsNav">
                                <!-- Headings will be populated by JavaScript -->
                            </nav>
                        </div>

                        <!--
                        <div>
                            <div class="h4">Call with our free super-powered phone</div>
                            <ul>
                                <li>Can talk to customer service for you</li>
                                <li>Can wait on hold for you</li>
                                <li>Automatically re-schedules if they're closed</li>
                                <li>Get a summary & transcript after</li>
                                <li>Easy to re-try if needed</li>
                                <li>Free and no account needed</li>
                            </ul>
                            <div class="mt-u"><a
                                    title="Call {{ $company->name ?? '' }} Customer Service phone number {{ $company->phone ?? '' }}"
                                    href="tel:{{ $company->phone ?? '' }}"><span style="margin-left: 1.5rem;">Call
                                        {{ $company->phone ?? '' }} Now</span></a>
                            </div>
                        </div>
                        <h3 class="min" style="margin-bottom: 0.67rem">Compare {{ $company->name ?? '' }} Customer
                            Service</h3>
                        <div class="list-block"><a href="#">AirBnB Customer Service</a><a href="#">Capital One Customer
                                Service</a><a href="#">Comcast Customer Service</a></div>
                        -->
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
                                <a href="https://www.facebook.com/profile.php?id=61582322640364"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a href="https://x.com/callhelpdesk123"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.instagram.com/callhelpdesk4/?hl=en"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="crumbs">
                        <div>
                            <div>
                                <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                                    <li itemprop="itemListElement" itemtype="http://schema.org/ListItem" itemscope=""><a
                                            itemprop="item" class="p-r" href="/companies"><span itemprop="name">All
                                                Companies</span>
                                            <meta itemprop="position" content="1" />
                                        </a><span>&nbsp;&rsaquo;&nbsp;</span></li>
                                    <li itemprop="itemListElement" itemtype="http://schema.org/ListItem" itemscope=""><a
                                            itemprop="item" class="p-r" href="{{ $company->url ?? '#' }}"><span
                                                itemprop="name">{{ $company->name ?? '' }} Customer Service</span>
                                            <meta itemprop="position" content="2" /></a></li>
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
        margin-left: 1.5rem !important;
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
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    /* Show only on hover */
    .image-wrapper:hover .ads-label {
        opacity: 1;
    }

    /* Hide right ad on mobile */
    @media (max-width: 768px) {
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
                console.log('Image alt set to:', img);
            }
        }
    });

    // Ads label hover effect
    document.addEventListener('DOMContentLoaded', function () {
        const wrappers = document.querySelectorAll('.image-wrapper');
        wrappers.forEach(wrapper => {
            const label = wrapper.querySelector('.ads-label');
            if (label) {
                wrapper.addEventListener('mouseenter', () => label.style.opacity = '1');
                wrapper.addEventListener('mouseleave', () => label.style.opacity = '0');
            }
        });
    });

</script>
@endsection
