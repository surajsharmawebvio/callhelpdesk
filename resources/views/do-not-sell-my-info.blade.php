@extends('layouts.app')

@section('content')
@include('components.header')

<!-- Hero Section -->
<section class="hero">
    <div class="hero-container">
        <div class="hero-content">
            <h1>Do Not Sell My <span>Info</span></h1>
            <p>Your privacy rights under CCPA/CPRA and other applicable laws</p>
        </div>
    </div>
</section>

<!-- Privacy Content -->
<section class="terms-content">
    <div class="container">
        <div class="content-wrapper">
            <div class="policy-section">
                <p>In this section, we here at CallHelpDesk would explain your right under the California Consumer Privacy Act (CCPA), as amended and in place by the California Privacy Rights Act (CPRA), along with other applicable and relevant laws present in the United States of America. These laws are directed towards us to not sell or share your personal information be it data or tokens with third parties for any gain.</p>
            </div>

            <div class="policy-section">
                <h2>Your Right to Opt-Out</h2>
                <p>As a user of CallHelpDesk, you have the right at any time to direct us to not sell or share your personal information (data) to anybody. Under the CCPA/CPRA, if we are defining the terms "selling" and "sharing", the terminology could go well beyond just exchanging data for money. They include transferring of personal information towards third parties, such as advertisers for cross-context behavioral considerations or advertisement purposes.</p>

                <p>CallHelpDesk uses cookies and other similar trackers which offers</p>

                <p>You have the right, at any time, to direct Call Help Desk not to sell or share your personal information.</p>

                <p>Under the CCPA/CPRA, "Selling" and "Sharing" are broadly defined terms that go beyond just exchanging data for money. They include transferring personal information to third parties (like advertising partners) for cross-context behavioral advertising or other valuable consideration.</p>

                <p>Call Help Desk uses cookies and similar tracking technologies to facilitate online advertising and analytics. To the extent that these activities constitute a "sale" or "share" under California law, you may exercise your right to opt out below.</p>
            </div>

            <div class="policy-section">
                <h2>How to Submit Your Request</h2>
                <p>You can exercise your right to request and opt out of any sharing or sale of your personal information or data with a third party. Please go through the below methods and proceed accordingly.</p>

                <h3>Interactive Opt-Out (Recommended)</h3>
                <p>The most easiest way for you would be to turn off cookies from your browser's settings menu and then reach out to us via email for a CCPA/CPRA request.</p>

                <p>You may send a written request to us via email.</p>

                <p><strong>Email Address:</strong> connect@callhelpdesk.com</p>
            </div>

            <div class="policy-section">
                <h3>Scope of the Opt-Out</h3>
                <p>When you choose to opt out of our platform's cookie behavior, we will take steps to make sure that your personal information is no longer sold or shared for cross-context behavioral advertising purposes.</p>

                <p>The cookie opt out is entirely a browser and device-specific request. If you clear your browser cookies, use a different browser, or use a new device, you will need to submit a new request.</p>

                <p><strong>Opt-Out Signals:</strong> We also respect legally recognized universal opt-out signals, such as the Global Privacy Control (GPC), which can be enabled in certain web browsers. If we detect a GPC signal, we will treat it as a valid opt-out request.</p>
            </div>

            <div class="policy-section">
                <h2>Other Privacy Rights</h2>
                <p>This opt-out right is part of a broader set of privacy rights available to qualifying U.S. residents. If you wish to exercise other rights, such as the right to Know (access), Delete your personal information, or Limit the Use of Sensitive Personal Information, please refer to our main privacy policy page here <a href="{{ route('privacy-policy') }}">privacy policy</a>.</p>
            </div>

            <div class="policy-section">
                <h2>Questions</h2>
                <p>If you have questions about our data practices or this opt-out page, please contact us at connect@callhelpdesk.com.</p>
            </div>
        </div>
    </div>
</section>

@include('components.footer')

<!-- Back to Top Button (Mobile Only) -->
<button id="backToTopBtn" class="back-to-top-btn" onclick="scrollToTop()" style="display: none;">
    <i class="fas fa-arrow-up"></i>
</button>

@endsection

<style>
.hero {
    padding: 100px 0px 30px 0px !important;
}

/* Add padding to account for fixed header */
.hero {
    padding-top: 80px;
}

/* Hide search container when scrolling */
.search-container.hidden-on-scroll {
    opacity: 0;
    visibility: hidden;
    transform: translateY(-30px) scale(0.95);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    pointer-events: none;
}

.search-container {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .hero {
        overflow: visible;
    }

    .search-wrapper {
        width: 100%;
    }
}

/* Back to Top Button (Mobile Only) */
.back-to-top-btn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px) scale(0.8);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 1000;
}

.back-to-top-btn.visible {
    opacity: 1;
    visibility: visible;
    transform: translateY(0) scale(1);
}

.back-to-top-btn:hover {
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 6px 20px rgba(67, 97, 238, 0.4);
}

.back-to-top-btn:active {
    transform: translateY(0) scale(0.95);
}

/* Hide on desktop, show only on mobile */
@media (min-width: 769px) {
    .back-to-top-btn {
        display: none !important;
    }
}
</style>

<script>
function handleScroll() {
    const heroSection = document.querySelector('.hero');
    const searchContainer = document.getElementById('searchContainer');
    const headerSearchBar = document.getElementById('headerSearchBar');
    const backToTopBtn = document.getElementById('backToTopBtn');
    const header = document.getElementById('header');

    if (heroSection && searchContainer && headerSearchBar) {
        const heroBottom = heroSection.offsetTop + heroSection.offsetHeight;
        const scrollPosition = window.scrollY;

        // Hide search in hero and show in header when scrolled past hero
        if (scrollPosition > heroBottom - 100) {
            searchContainer.classList.add('hidden-on-scroll');
            headerSearchBar.classList.add('visible');
        } else {
            searchContainer.classList.remove('hidden-on-scroll');
            headerSearchBar.classList.remove('visible');
        }
    }

    // Header scroll effect
    if (header) {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }

    // Show/hide back to top button
    if (backToTopBtn) {
        if (window.scrollY > 300) {
            backToTopBtn.style.display = 'flex';
            backToTopBtn.classList.add('visible');
        } else {
            backToTopBtn.classList.remove('visible');
            setTimeout(() => {
            }, 300);
        }
    }
}

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Add event listeners
document.addEventListener('DOMContentLoaded', function () {
    window.addEventListener('scroll', handleScroll);
    handleScroll();
});
</script>