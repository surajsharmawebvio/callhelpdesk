@extends('layouts.app')

@section('content')
@include('components.header')

<!-- Hero Section -->
<section class="hero">
    <div class="hero-container">
        <div class="hero-content">
            <h1>Talk to <span>Our Team</span></h1>
            <p>Got something to ask related to CallHelpDesk? Send us a message anytime. Our team will make sure your concerns are noted and addressed at the earliest.</p>
        </div>
    </div>
</section>

<!-- Success/Error Messages -->
@if(session('success'))
<div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 15px; margin: 20px auto; max-width: 1200px; border-radius: 8px; border: 1px solid #c3e6cb;">
    {{ session('success') }}
</div>
@endif

@if($errors->any())
<div class="alert alert-danger" style="background: #f8d7da; color: #721c24; padding: 15px; margin: 20px auto; max-width: 1200px; border-radius: 8px; border: 1px solid #f5c6cb;">
    <ul style="margin: 0; padding-left: 20px;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- Contact Section -->
<section class="contact-section">
    <div class="container">
        <div class="contact-wrapper">
            <!-- Contact Information -->
            <div class="contact-info">
                <div class="info-header">
                    <h2>Contact Information</h2>
                    <p>Say something to start a live chat!</p>
                </div>

                <div class="contact-details">
                    <!--
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-text">
                            <h4>+1012 3456 789</h4>
                        </div>
                    </div>
                        -->

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-text">
                            <h4>connect@callhelpdesk.com</h4>
                        </div>
                    </div>

                    <!--
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h4>132 Dartmouth Street Boston, Massachusetts 02156 United States</h4>
                        </div>
                    </div>
                        -->

                    <div class="contact-item">
                        <div class="contact-text">
                            Access updated contact details of customer support departments. All information provided on this platform is for reference purposes only. Call Help Desk gets the details from official pages.
                        </div>
                    </div>
                </div>

                <!--
                <div class="social-links">
                    <a href="#" class="social-link">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-discord"></i>
                    </a>
                </div>
                -->
            </div>

            <!-- Contact Form -->
            <div class="contact-form">
                <div class="form-header">
                    <h3>Send us a message</h3>
                    <p>Fill out the form below and we'll get back to you within 24 hours.</p>
                </div>

                <form class="form" method="POST" action="/contact">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input
                                type="text"
                                id="firstName"
                                name="first_name"
                                placeholder="Enter your first name"
                            >
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input
                                type="text"
                                id="lastName"
                                name="last_name"
                                placeholder="Enter your last name"
                            >
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                placeholder="Enter your email"
                            >
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                placeholder="Enter your phone number"
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <select id="subject" name="subject">
                            <option value="">Select a subject</option>
                            <option value="general">General Inquiry</option>
                            <option value="support">Technical Support</option>
                            <option value="billing">Billing Question</option>
                            <option value="partnership">Partnership Opportunity</option>
                            <option value="feedback">Feedback</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea
                            id="message"
                            name="message"
                            rows="6"
                            placeholder="Write your message..."
                        ></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<!--
<section class="map-section">
    <div class="container">
        <div class="map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2948.588043049081!2d-71.10496468454456!3d42.348116979189035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e37a0d6c6b4b3d%3A0x4c6d7c8b8b8b8b8b!2s132%20Dartmouth%20St%2C%20Boston%2C%20MA%2002156%2C%20USA!5e0!3m2!1sen!2sus!4v1638360000000!5m2!1sen!2sus"
                width="100%"
                height="400"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>
-->

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

/* Contact Section */
.contact-section {
    padding: 5rem 0;
    background: var(--light-bg);
}

.contact-wrapper {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: start;
    background: white;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

/* Contact Information */
.contact-info {
    padding: 3rem;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.info-header h2 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.info-header p {
    font-size: 1.1rem;
    opacity: 0.9;
    margin-bottom: 3rem;
}

.contact-details {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.contact-item {
    display: flex;
    align-items: flex-start;
    gap: 1.5rem;
}

.contact-icon {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
}

.contact-text h4 {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 500;
    line-height: 1.4;
}

.social-links {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
}

.social-link {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    font-size: 1.25rem;
    transition: all 0.3s ease;
}

.social-link:hover {
    background: white;
    color: var(--primary);
    transform: translateY(-2px);
}

/* Contact Form */
.contact-form {
    padding: 3rem;
}

.form-header h3 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    color: var(--dark);
}

.form-header p {
    color: var(--text-muted);
    margin-bottom: 2rem;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
    margin-bottom: 1.5rem;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group label {
    font-weight: 500;
    color: var(--dark);
    margin-bottom: 0.5rem;
    font-size: 0.95rem;
}

.form-group input,
.form-group select,
.form-group textarea {
    padding: 1rem;
    border: 2px solid #e1e5e9;
    border-radius: 8px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: white;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
}

.form-group textarea {
    resize: vertical;
    min-height: 120px;
}

.btn-block {
    width: 100%;
    padding: 1rem;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 1rem;
}

.btn-block:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(67, 97, 238, 0.3);
}

/* Map Section */
.map-section {
    padding: 3rem 0;
    background: var(--light-bg);
}

.map-container {
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
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
    .contact-wrapper {
        grid-template-columns: 1fr;
        gap: 0;
    }

    .contact-info {
        border-radius: 0;
    }

    .contact-form {
        padding: 2rem;
    }
}

@media (max-width: 768px) {
    .hero-content h1 {
        font-size: 2.5rem;
    }

    .contact-info,
    .contact-form {
        padding: 2rem;
    }

    .info-header h2 {
        font-size: 2rem;
    }

    .form-row {
        grid-template-columns: 1fr;
    }

    .contact-details {
        gap: 1.5rem;
    }

    .contact-item {
        gap: 1rem;
    }

    .contact-icon {
        width: 45px;
        height: 45px;
        font-size: 1.1rem;
    }
}

@media (max-width: 480px) {
    .hero {
        padding-top: 70px;
        min-height: 40vh;
    }

    .hero-content h1 {
        font-size: 2rem;
    }

    .contact-info,
    .contact-form {
        padding: 1.5rem;
    }

    .info-header h2 {
        font-size: 1.75rem;
    }

    .form-header h3 {
        font-size: 1.5rem;
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
