@extends('layouts.app')

@section('content')
@include('components.header')

<!-- Hero Section -->
<section class="hero">
    <div class="hero-container">
        <div class="hero-content">
            <h1>Terms & <span>Conditions</span></h1>
            <p>Clear terms of service for a fair and responsible use of CallHelpDesk</p>
        </div>
    </div>
</section>

<!-- Terms Content -->
<section class="terms-content">
    <div class="container">
        <div class="content-wrapper">
            <!--
            <div class="last-updated">
                <p>Last updated: November 13, 2025</p>
            </div>
            -->

            <div class="policy-section">
                <p>Welcome to CallHelpDesk. These Terms of Service stand for the conditions of your use of this website and the information on this website. You acknowledge and agree to all of these terms by using this website. Please quit using this website right now if you disagree with any of the terms.</p>
            </div>

            <div class="policy-section">
                <h2>1. Purpose of the Website</h2>
                <p>CallHelpDesk is an online information resource created to help users find customer service contact numbers of different companies in the United States. The primary purpose of this website is to provide accurate, easy-to-find, regularly updated information for general reference. We have no association or endorsement from, or operations on behalf of any company.</p>
            </div>

            <div class="policy-section">
                <h2>2. Acceptable Use</h2>
                <p>The information that may be available to you from our site is only for reference. You agree to use it responsibly, for lawful, non-commercial purposes only. You will not use the numbers on this website for advertising, resale, data mining, or any purpose that inappropriately represents the source or use of the information.</p>
            </div>

            <div class="policy-section">
                <h2>3. Information Reliability</h2>
                <p>We have made every effort so that each number on the site remains accurate. However, the information may change as the companies update their information periodically. While we make no such declarations that all information will be entirely error-free, we will try to maintain only resources that are reliable and useful.</p>
            </div>

            <div class="policy-section">
                <h2>4. Ownership & Intellectual Rights</h2>
                <p>The relevant intellectual property rights apply to all written content, format, and design on the site. Users may view and use the material exclusively for their own reference. Except for content used in fairways, you are strictly forbidden from copying, modifying, or redistributing any of the content without our written authorization.</p>
            </div>

            <div class="policy-section">
                <h2>5. Data Presentation Standards</h2>
                <p>Data on our site has been presented considering the factors of accuracy and reliability. The data has been formatted in such a way that all information is clear and consistent, aiding the user in locating the information they're looking for. Each company name appears purely for identification purposes.</p>
            </div>

            <div class="policy-section">
                <h2>6. Independence and Non-Affiliation</h2>
                <p>Our site acts as an independent platform. The use of company names and customer service phone numbers should not be taken as a connection, partnership, or endorsement. All registered names, logos, and marks are the sole property of their respective owners and are used exclusively for information purposes.</p>
            </div>

            <div class="policy-section">
                <h2>7. Disclaimer of Information</h2>
                <p>We work hard so all information remains up-to-date and accurate. However, the content on this website is meant for general reference only and is subject to change or correction without notice. We make every effort to provide accurate content, but there may be occasional discrepancies or outdated details. Users are encouraged to use the information as a guide and to use caution when making any related decisions.</p>
            </div>

            <div class="policy-section">
                <h2>8. Use and Conduct</h2>
                <p>You agree to use CallHelpDesk in a manner that does not impede its proper functioning. You shall not use the site to introduce viruses or similar malware, gather information illegally or inappropriately, or disrupt the technical operations of the website. Any fraudulent use of data may lead to your access being denied.</p>
            </div>

            <div class="policy-section">
                <h2>9. Changes and Updates in the Content</h2>
                <p>We reserve the right to edit, rearrange, and/or delete content as we deem fit. This is done to establish data accuracy and the effectiveness of the site. This may happen at any time without notice. We intend to be transparent with the users and maintain an uninterrupted user experience.</p>
            </div>

            <div class="policy-section">
                <h2>10. Changes to These Terms</h2>
                <p>Amendments to the terms may be made to reflect improvements in operations or changes in the policy of information. The most up-to-date version will always be available on this page. Continued use of the site after the revision to the Terms indicates your acceptance of the changes.</p>
            </div>

            <div class="policy-section">
                <h2>11. Availability and Support of the Platform</h2>
                <p>We will try to provide uninterrupted availability of the platform, but there will be times when it may experience temporary downtime. This might be due to maintenance or upgrading of the site and its services. Certain pages, sections, or other access to information on the platform may change without prior notification. This website is provided for information references only, and not for advisory-based services or transactions.</p>
            </div>

            <div class="policy-section">
                <h2>12. General Provisions</h2>
                <p>These Terms exist to enable users to use CallHelpDesk in a fair manner. They emphasize responsible access, respect for proprietary content, and recognition of the website's informational purpose. The company may bring changes to strengthen the integrity of information from time to time.</p>
            </div>

            <div class="policy-section">
                <h2>13. Contact Info</h2>
                <p>Got some more queries on the policies? Please contact us through [CONTACT_NO] or connect@callhelpdesk.com.</p>
            </div>
        </div>
    </div>
</section>

@include('components.footer')

<!-- Back to Top Button (Mobile Only) -->
<button
    id="backToTopBtn"
    class="back-to-top-btn"
    onclick="scrollToTop()"
    style="display: none;"
>
    <i class="fas fa-arrow-up"></i>
</button>

<style scoped>
/* Hero Section */
.hero {
    padding-top: 80px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
    min-height: 40vh;
    display: flex;
    align-items: center;
}

.hero-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    margin-top: 100px;
}

.hero-content {
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
}

.hero-content h1 {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    line-height: 1.2;
}

.hero-content h1 span {
    color: rgba(255, 255, 255, 0.9);
    font-weight: 300;
}

.hero-content p {
    font-size: 1.25rem;
    margin-bottom: 2rem;
    opacity: 0.9;
    line-height: 1.6;
    color: rgba(255, 255, 255, 0.9) !important;
}

/* Terms Content */
.terms-content {
    padding: 5rem 0;
    background: var(--light-bg);
}

.content-wrapper {
    max-width: 1000px;
    margin: 0 auto;
    background: white;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.last-updated {
    background: var(--light-bg);
    padding: 1rem 2rem;
    text-align: center;
    border-bottom: 1px solid #e1e5e9;
}

.last-updated p {
    margin: 0;
    color: var(--text-muted);
    font-size: 0.95rem;
}

.policy-section {
    padding: 2.5rem;
    border-bottom: 1px solid #e1e5e9;
}

.policy-section:last-child {
    border-bottom: none;
}

.policy-section h2 {
    font-size: 1.75rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    color: var(--dark);
    line-height: 1.3;
}

.policy-section p {
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 1.5rem;
    color: var(--text-muted);
}

/* Back to Top Button */
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

/* Responsive Design */
@media (max-width: 768px) {
    .hero {
        padding-top: 70px;
        min-height: 30vh;
    }

    .hero-content h1 {
        font-size: 2.5rem;
    }

    .hero-content p {
        font-size: 1.1rem;
    }

    .content-wrapper {
        margin: 0 1rem;
        border-radius: 16px;
    }

    .policy-section {
        padding: 2rem 1.5rem;
    }

    .policy-section h2 {
        font-size: 1.5rem;
    }

    .policy-section p {
        font-size: 1rem;
    }
}

@media (max-width: 480px) {
    .hero-content h1 {
        font-size: 2rem;
    }

    .policy-section {
        padding: 1.5rem 1rem;
    }

    .policy-section h2 {
        font-size: 1.25rem;
    }

    .last-updated {
        padding: 0.75rem 1rem;
    }
}

/* Hide back to top on desktop */
@media (min-width: 769px) {
    .back-to-top-btn {
        display: none !important;
    }
}
</style>

<script>
function handleScroll() {
    const backToTopBtn = document.getElementById('backToTopBtn');
    const header = document.getElementById('header');
    
    if (header) {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }

    if (backToTopBtn) {
        if (window.scrollY > 300) {
            backToTopBtn.style.display = 'flex';
            backToTopBtn.classList.add('visible');
        } else {
            backToTopBtn.classList.remove('visible');
            setTimeout(() => {
                if (!backToTopBtn.classList.contains('visible')) {
                    backToTopBtn.style.display = 'none';
                }
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

document.addEventListener('DOMContentLoaded', function() {
    window.addEventListener('scroll', handleScroll);
    handleScroll();
});
</script>
@endsection
