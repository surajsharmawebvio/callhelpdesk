@extends('layouts.app')

@section('content')
@include('components.header')

<!-- Hero Section -->
<section class="hero">
    <div class="hero-container">
        <div class="hero-content">
            <h1>About Us <span>Call Help Desk</span></h1>
            <p>We here at CallHelpDesk offer our users a platform where they can search contact information about companies that they require without any additional hassles</p>
        </div>
    </div>
</section>

<!-- Story Section -->
<section class="story-section">
    <div class="container">
        <div class="story-wrapper">
            <div class="story-content">
                <h2>What We Do</h2>
                <p>On our website, you will find contact details of the customer support departments of various companies that operate in the United States. All details are verified and sourced from official pages.</p>
                <p>We value the trust of our users. Therefore, our site has developed with a strong focus on trust and consistent performance. Each number on our site is frequently reviewed to ensure that it leads to the official and designated support channels of that company.</p>
                <p>Through an organized and structured resource, we aim to encourage accessibility in information sharing. Our platform serves solely as an informational resource, offering reliable data on customer service communication.</p>
            </div>
            <div class="story-image">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Team collaboration">
            </div>
        </div>
    </div>
</section>

<!-- Mission Vision Section -->
<section class="mission-vision">
    <div class="container">
        <div class="mv-grid">
            <div class="mv-card">
                <div class="mv-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3>Accurate Contact Information</h3>
                <p>All customer service contacts are checked for correctness and updated on time</p>
            </div>
            <div class="mv-card">
                <div class="mv-icon">
                    <i class="fas fa-sync-alt"></i>
                </div>
                <h3>Regularity in Information Maintenance</h3>
                <p>The website is evaluated at regularly to ensure that it represents updated information </p>
            </div>
            <div class="mv-card">
                <div class="mv-icon">
                    <i class="fas fa-compass"></i>
                </div>
                <h3>User-Friendly Access and Navigation</h3>
                <p>Our site is made with a simple design, so you can reach the number in no time</p>
            </div>
        </div>
    </div>
</section>

<!-- Trusted Source Section -->
<section class="trusted-source">
    <div class="container">
        <div class="trusted-content">
            <h2>Your Trusted Customer Support Source</h2>
            <p>Get access to updated contact details whenever you need them</p>
            <ul>
                <li>Saves your time by storing everything needed about relevant contacts in one place</li>
                <li>Website layout is simple; you can search and get contact information quickly</li>
                <li>Keep the process easy so you don't have to jump from one page to another</li>
            </ul>
            <p>We have developed CallHelpDesk in a manner that makes everyone's job easier when it comes to connecting with the correct customer support. At our site, you will get the right contact details in a simple format. We want to make sure that your information is correct, easy to find, and always there when you require it.</p>
        </div>
    </div>
</section>

<!-- Commitment Section -->
<section class="commitment-section">
    <div class="container">
        <div class="commitment-content">
            <p>Access updated contact details of customer support departments. All information provided on this platform is for reference purposes only. CallHelpDesk gets the details from official pages.</p>
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
    min-height: 50vh;
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

/* Story Section */
.story-section {
    padding: 5rem 0;
    background: var(--light-bg);
}

.story-wrapper {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
    background: white;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    padding: 3rem;
}

.story-content h2 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    color: var(--dark);
}

.story-content p {
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 1.5rem;
    color: var(--text-muted);
}

.story-image img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    border-radius: 12px;
}

/* Mission Vision Section */
.mission-vision {
    padding: 5rem 0;
    background: white;
}

.mv-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.mv-card {
    background: var(--light-bg);
    padding: 2.5rem;
    border-radius: 16px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.mv-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
}

.mv-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: white;
    margin: 0 auto 1.5rem;
}

.mv-card h3 {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: var(--dark);
}

.mv-card p {
    color: var(--text-muted);
    line-height: 1.6;
}

/* Trusted Source Section */
.trusted-source {
    padding: 80px 0;
    background-color: #f8f9fa;
}

.trusted-content {
    max-width: 1000px;
    margin: 0 auto;
    text-align: center;
}

.trusted-content h2 {
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 1rem;
    line-height: 1.3;
}

.trusted-content p {
    font-size: 18px;
    line-height: 1.6;
    color: #666;
    margin-bottom: 30px;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

.trusted-content ul {
    list-style: none;
    padding: 0;
    margin: 40px 0;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}

.trusted-content li {
    background: white;
    padding: 25px 20px;
    border-radius: 16px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: left;
    font-size: 16px;
    line-height: 1.6;
    color: #666;
    position: relative;
    padding-left: 50px;
}

.trusted-content li:before {
    content: "✓";
    position: absolute;
    left: 20px;
    top: 25px;
    color: var(--primary);
    font-weight: bold;
    font-size: 18px;
}

.trusted-content li:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.trusted-content p:last-child {
    font-size: 16px;
    margin-top: 40px;
    margin-bottom: 0;
}

/* Commitment Section */
.commitment-section {
    padding: 60px 0;
    background-color: white;
}

.commitment-content {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
    background: #f8f9fa;
    padding: 40px 30px;
    border-radius: 16px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

.commitment-content p {
    font-size: 16px;
    line-height: 1.6;
    color: #666;
    margin: 0;
    font-style: italic;
}

/* CTA Section */
.cta {
    padding: 4rem 0;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
    text-align: center;
}

.cta h2 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.cta p {
    font-size: 1.1rem;
    margin-bottom: 2rem;
    opacity: 0.9;
}

.cta .btn {
    display: inline-block;
    padding: 1rem 2rem;
    background: white;
    color: var(--primary);
    text-decoration: none;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.cta .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
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
@media (max-width: 1024px) {
    .story-wrapper {
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    .hero-content h1 {
        font-size: 3rem;
    }
}

@media (max-width: 768px) {
    .hero {
        padding-top: 70px;
        min-height: 40vh;
    }

    .hero-content h1 {
        font-size: 2.5rem;
    }

    .story-wrapper {
        padding: 2rem;
    }

    .story-content h2 {
        font-size: 2rem;
    }

    .mv-grid {
        grid-template-columns: 1fr;
    }

    .cta h2 {
        font-size: 2rem;
    }
}

/* Responsive adjustments for Trusted Source */
@media (max-width: 768px) {
    .trusted-source {
        padding: 60px 0;
    }
    
    .trusted-content h2 {
        font-size: 2rem;
    }
    
    .trusted-content p {
        font-size: 16px;
        margin-bottom: 25px;
    }
    
    .trusted-content ul {
        grid-template-columns: 1fr;
        gap: 15px;
        margin: 30px 0;
    }
    
    .trusted-content li {
        padding: 20px 15px;
        padding-left: 45px;
        font-size: 15px;
    }
    
    .trusted-content li:before {
        left: 15px;
        top: 20px;
    }
    
    .trusted-content p:last-child {
        margin-top: 30px;
    }
}

/* Responsive adjustments for Commitment Section */
@media (max-width: 768px) {
    .commitment-section {
        padding: 40px 0;
    }
    
    .commitment-content {
        padding: 30px 20px;
    }
    
    .commitment-content p {
        font-size: 15px;
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
