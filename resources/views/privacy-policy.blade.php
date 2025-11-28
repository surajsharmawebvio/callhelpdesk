@extends('layouts.app')

@section('content')
@include('components.header')

<!-- Hero Section -->
<section class="hero">
    <div class="hero-container">
        <div class="hero-content">
            <h1>Privacy <span>Policy</span></h1>
            <p>Protecting your personal information with trust, integrity, and transparency</p>
        </div>
    </div>
</section>

<!-- Privacy Policy Content -->
<section class="privacy-content">
    <div class="container">
        <div class="content-wrapper">
            <!--
            <div class="last-updated">
                <p>Last updated: November 13, 2025</p>
            </div>
            -->

            <div class="policy-section">
                <p>CallHelpDesk (“we,” “our,” or “us”) is committed to respecting the privacy of visitors and users. Everything regarding your data and information is explained on this Privacy Policy page. You will know how it is collected, processed, and safeguarded when you visit our platform or use any of our services.</p>
            </div>

            <div class="policy-section">
                <h2>User Information We Handle</h2>
                <p>While using CallHelpDesk, we may ask for some basic information to further enhance the service of our platform. This information can be:</p>
                <ul>
                    <li>We gather basic technical data about your visit, such as the device you are using, the websites you are viewing, and the browser type.</li>
                    <li>Cookies remember your settings, monitor traffic, and monitor how you use your website. However, you have the option to block cookies in your browser. But remember, doing so will make some of our services inaccessible.</li>
                </ul>
                <p>All the data gathered will be utilized for the purpose of maintaining the accuracy, usability, and reliability of the website.</p>
            </div>

            <div class="policy-section">
                <h2>Where We Use the Data</h2>
                <p>Information collected through our site will only be used for operational and analytical purposes. Selling, renting, or trading your data with any third party is never our principle.</p>
                <p>The data may be used:</p>
                <ul>
                    <li>To improve the design and usability of the website content</li>
                    <li>To respond to user feedback or questions</li>
                    <li>To monitor traffic and usage statistics</li>
                    <li>To increase the accuracy and integrity of the data</li>
                </ul>
                <p>All information collected will be processed in accordance with privacy and data protection laws.</p>
            </div>

            <div class="policy-section">
                <h2>Sharing of Your Data</h2>
                <p>Selling or distributing user data for marketing or advertising purposes goes against our policy; we don't do that. Data may be received only under certain, justifiable circumstances, such as:</p>
                <ul>
                    <li>Compliance with a legal obligation, a request of a government agency, or a court order</li>
                    <li>Protection of any of CallHelpDesk's rights, property, or business integrity</li>
                    <li>Cooperation with service providers that assist with website analytics or hosting, all under strict confidentiality agreements</li>
                </ul>
            </div>

            <div class="policy-section">
                <h2>Securing Your Data</h2>
                <p>We have implemented required technical safeguards to protect the information we collect through our website. These safeguards are to limit the possible risk of unauthorized access, misuse, modification, or disclosure.</p>
                <p>However, we cannot guarantee absolute protection of data. We have taken steps to safeguard whatever information we collect from our website, and we always urge our visitors to exercise caution when leaving our site or sharing any personal information over the internet.</p>
            </div>

            <div class="policy-section">
                <h2>User Rights and Control</h2>
                <p>You do have some basic rights when it comes to your information shared with us. Such rights include access to, correction of, or requests for deletion of the information they previously provided to our platform.</p>
                <p>For any such kind of request, you can contact us through the contact section of the website. Before processing the request related to personal data, we will take reasonable steps to make sure the identity of the requester is true.</p>
            </div>

            <div class="policy-section">
                <h2>Data Policy for Children</h2>
                <p>Gathering any minor's data is never our intention. Our website and content are for general informational purposes only and are not intended for children. However, if any such data has been gathered unknowingly, it will be promptly removed from our site.</p>
            </div>

            <div class="policy-section">
                <h2>Policy Revisions</h2>
                <p>We might change some provisions in this policy from time to time. This will be done to be aligned with any changes to the site, applicable laws, and data protection standards. We will update the changes on the site. If you keep using the website after the changes have been made, you will be considered to have accepted them.</p>
            </div>

            <div class="policy-section">
                <h2>How to Get in Touch</h2>
                <p>Got any more queries regarding the privacy of data? Our team will be glad to help you out.</p>
                <p>Contact us by reaching out at connect@callhelpdesk.com.</p>
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

/* Privacy Content */
.privacy-content {
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

.policy-section ul {
    margin-left: 1.5rem;
    margin-bottom: 1.5rem;
}

.policy-section li {
    font-size: 1.05rem;
    line-height: 1.6;
    margin-bottom: 0.75rem;
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

    .policy-section li {
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
