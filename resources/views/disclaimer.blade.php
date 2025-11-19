@extends('layouts.app')

@section('content')
@include('components.header')

<!-- Hero Section -->
<section class="hero">
    <div class="hero-container">
        <div class="hero-content">
            <h1>Legal <span>Disclaimer</span></h1>
            <p>Please read this disclaimer carefully before using our services. By accessing Elevate, you acknowledge and agree to the terms outlined below.</p>
        </div>
    </div>
</section>

<!-- Disclaimer Content -->
<section class="disclaimer-content">
    <div class="container">
        <div class="content-wrapper">
            <div class="last-updated">
                <p>Last updated: November 10, 2025</p>
            </div>

            <div class="policy-section">
                <h2>1. General Disclaimer</h2>
                <p>The information provided on Elevate is for general informational purposes only. While we strive to keep the information up to date and correct, we make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability, or availability of the information, products, services, or related graphics contained on the website for any purpose.</p>
            </div>

            <div class="policy-section">
                <h2>2. No Professional Advice</h2>
                <p>The content on Elevate does not constitute professional advice, including but not limited to legal, financial, medical, or technical advice. Any reliance you place on such information is strictly at your own risk. We strongly recommend that you seek professional advice before making any decisions based on information provided on our platform.</p>
            </div>

            <div class="policy-section">
                <h2>3. Service Availability</h2>
                <p>Elevate provides information about customer service contact methods for various companies. However:</p>
                <ul>
                    <li>Contact information may change without notice</li>
                    <li>Phone numbers and email addresses may become outdated</li>
                    <li>Companies may modify their support processes</li>
                    <li>We cannot guarantee that provided contact methods will work</li>
                    <li>Success rates depend on various external factors</li>
                </ul>
            </div>

            <div class="policy-section">
                <h2>4. Third-Party Content</h2>
                <p>Our website may contain links to third-party websites or services that are not owned or controlled by Elevate. We have no control over and assume no responsibility for the content, privacy policies, or practices of any third-party websites or services. You further acknowledge and agree that Elevate shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with the use of or reliance on any such content, goods, or services available on or through any such websites or services.</p>
            </div>

            <div class="policy-section">
                <h2>5. User-Generated Content</h2>
                <p>Elevate may display user-generated content, reviews, or feedback. This content is provided "as is" and we do not endorse, guarantee, or assume responsibility for the accuracy, completeness, or usefulness of any user-generated content. Users are solely responsible for the content they post, and we reserve the right to remove content that violates our terms or applicable laws.</p>
            </div>

            <div class="policy-section">
                <h2>6. Limitation of Liability</h2>
                <p>In no event shall Elevate, its directors, employees, partners, agents, suppliers, or affiliates be liable for any indirect, incidental, special, consequential, or punitive damages, including without limitation, loss of profits, data, use, goodwill, or other intangible losses, resulting from:</p>
                <ul>
                    <li>Your use of or inability to use the service</li>
                    <li>Any unauthorized access to or use of our servers</li>
                    <li>Any interruption or cessation of transmission to or from our service</li>
                    <li>Any bugs, viruses, trojan horses, or the like that may be transmitted to or through our service</li>
                    <li>Any errors or omissions in any content or for any loss or damage incurred as a result of the use of any content</li>
                </ul>
            </div>

            <div class="policy-section">
                <h2>7. Service Interruptions</h2>
                <p>Elevate strives to provide continuous service but cannot guarantee uninterrupted access. We are not liable for any damages arising from service interruptions, including but not limited to system failures, maintenance, updates, or unforeseen technical issues.</p>
            </div>

            <div class="policy-section">
                <h2>8. Accuracy of Information</h2>
                <p>While we make reasonable efforts to ensure the accuracy of information on our platform, we cannot guarantee that all information is current, complete, or error-free. Contact information, procedures, and policies of companies may change frequently, and we encourage users to verify information independently.</p>
            </div>

            <div class="policy-section">
                <h2>9. No Warranty</h2>
                <p>The service is provided on an "AS IS" and "AS AVAILABLE" basis. Elevate expressly disclaims all warranties of any kind, whether express or implied, including but not limited to the implied warranties of merchantability, fitness for a particular purpose, and non-infringement.</p>
            </div>

            <div class="policy-section">
                <h2>10. Indemnification</h2>
                <p>You agree to defend, indemnify, and hold harmless Elevate and its licensee and licensors, and their employees, contractors, agents, officers and directors, from and against any and all claims, damages, obligations, losses, liabilities, costs or debt, and expenses arising from or related to your use of and access to the Service, or your violation of any term of these disclaimers.</p>
            </div>

            <div class="policy-section">
                <h2>11. Governing Law</h2>
                <p>These disclaimers shall be interpreted and governed by the laws of the Commonwealth of Massachusetts, United States, without regard to its conflict of law provisions. Any disputes arising from these disclaimers or your use of the service shall be resolved in the courts of Massachusetts.</p>
            </div>

            <div class="policy-section">
                <h2>12. Changes to Disclaimer</h2>
                <p>We reserve the right to modify or replace these disclaimers at any time. If a revision is material, we will try to provide reasonable notice. Your continued use of the service after any such changes constitutes your acceptance of the new disclaimers.</p>
            </div>

            <div class="policy-section">
                <h2>13. Contact Information</h2>
                <p>If you have any questions about this disclaimer, please contact us:</p>
                <div class="contact-info">
                    <p><strong>Email:</strong> legal@elevate.com</p>
                    <p><strong>Address:</strong> 132 Dartmouth Street, Boston, Massachusetts 02156, United States</p>
                    <p><strong>Phone:</strong> +1 (012) 345-6789</p>
                </div>
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

/* Disclaimer Content */
.disclaimer-content {
    padding: 5rem 0;
    background: var(--light-bg);
}

.content-wrapper {
    max-width: 800px;
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

.contact-info {
    background: var(--light-bg);
    padding: 1.5rem;
    border-radius: 12px;
    margin-top: 1rem;
}

.contact-info p {
    margin: 0.5rem 0;
    font-size: 1rem;
}

.contact-info strong {
    color: var(--primary);
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
