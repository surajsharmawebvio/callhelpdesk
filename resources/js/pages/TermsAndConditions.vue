<template>
    <Header />

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1>Terms & <span>Conditions</span></h1>
                <p>Please read these terms and conditions carefully before using our services. By accessing or using Elevate, you agree to be bound by these terms.</p>
            </div>
        </div>
    </section>

    <!-- Terms Content -->
    <section class="terms-content">
        <div class="container">
            <div class="content-wrapper">
                <div class="last-updated">
                    <p>Last updated: November 10, 2025</p>
                </div>

                <div class="policy-section">
                    <h2>1. Acceptance of Terms</h2>
                    <p>By accessing and using Elevate ("the Service"), you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.</p>
                </div>

                <div class="policy-section">
                    <h2>2. Description of Service</h2>
                    <p>Elevate is a customer support assistance platform that helps users connect with human customer service representatives faster than traditional methods. Our service includes:</p>
                    <ul>
                        <li>Company search and contact information lookup</li>
                        <li>Customer support connection assistance</li>
                        <li>Educational resources and tips</li>
                        <li>Community-driven support information</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h2>3. User Accounts</h2>
                    <p>To access certain features of our service, you may be required to create an account. You are responsible for:</p>
                    <ul>
                        <li>Maintaining the confidentiality of your account credentials</li>
                        <li>All activities that occur under your account</li>
                        <li>Notifying us immediately of any unauthorized use</li>
                        <li>Providing accurate and complete information</li>
                    </ul>
                    <p>We reserve the right to terminate accounts that violate these terms or engage in fraudulent activity.</p>
                </div>

                <div class="policy-section">
                    <h2>4. Acceptable Use Policy</h2>
                    <p>You agree not to use the Service for any unlawful purposes or to conduct any unlawful activity, including but not limited to:</p>
                    <ul>
                        <li>Harassing, abusing, or harming others</li>
                        <li>Impersonating any person or entity</li>
                        <li>Posting false or misleading information</li>
                        <li>Attempting to gain unauthorized access to our systems</li>
                        <li>Using the service for spam or unsolicited communications</li>
                        <li>Violating any applicable laws or regulations</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h2>5. Intellectual Property</h2>
                    <p>The Service and its original content, features, and functionality are and will remain the exclusive property of Elevate and its licensors. The Service is protected by copyright, trademark, and other laws. You may not duplicate, copy, or reuse any portion of the HTML/CSS, JavaScript, or visual design elements without express written permission.</p>
                </div>

                <div class="policy-section">
                    <h2>6. User-Generated Content</h2>
                    <p>By posting content to our Service, you grant us a non-exclusive, royalty-free, perpetual, and worldwide license to use, display, and distribute your content in connection with the Service. You represent and warrant that:</p>
                    <ul>
                        <li>You own or have the necessary rights to use and authorize us to use your content</li>
                        <li>Your content does not infringe any third-party rights</li>
                        <li>Your content complies with these Terms</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h2>7. Privacy Policy</h2>
                    <p>Your privacy is important to us. Please review our Privacy Policy, which also governs your use of the Service, to understand our practices regarding the collection and use of your personal information.</p>
                </div>

                <div class="policy-section">
                    <h2>8. Termination</h2>
                    <p>We may terminate or suspend your account and access to the Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms. Upon termination, your right to use the Service will cease immediately.</p>
                </div>

                <div class="policy-section">
                    <h2>9. Disclaimer of Warranties</h2>
                    <p>The Service is provided on an "AS IS" and "AS AVAILABLE" basis. We make no representations or warranties of any kind, express or implied, as to the operation of the Service or the information, content, or materials included therein. You expressly agree that your use of the Service is at your sole risk.</p>
                </div>

                <div class="policy-section">
                    <h2>10. Limitation of Liability</h2>
                    <p>In no event shall Elevate, its directors, employees, partners, agents, suppliers, or affiliates be liable for any indirect, incidental, special, consequential, or punitive damages, including without limitation, loss of profits, data, use, goodwill, or other intangible losses, resulting from your use of the Service.</p>
                </div>

                <div class="policy-section">
                    <h2>11. Indemnification</h2>
                    <p>You agree to defend, indemnify, and hold harmless Elevate and its licensee and licensors, and their employees, contractors, agents, officers and directors, from and against any and all claims, damages, obligations, losses, liabilities, costs or debt, and expenses arising from or related to your use of and access to the Service.</p>
                </div>

                <div class="policy-section">
                    <h2>12. Governing Law</h2>
                    <p>These Terms shall be interpreted and governed by the laws of the Commonwealth of Massachusetts, United States, without regard to its conflict of law provisions. Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights.</p>
                </div>

                <div class="policy-section">
                    <h2>13. Changes to Terms</h2>
                    <p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material, we will try to provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>
                </div>

                <div class="policy-section">
                    <h2>14. Contact Information</h2>
                    <p>If you have any questions about these Terms and Conditions, please contact us:</p>
                    <div class="contact-info">
                        <p><strong>Email:</strong> legal@elevate.com</p>
                        <p><strong>Address:</strong> 132 Dartmouth Street, Boston, Massachusetts 02156, United States</p>
                        <p><strong>Phone:</strong> +1 (012) 345-6789</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <Footer />

    <!-- Back to Top Button (Mobile Only) -->
    <button
        v-show="showBackToTop"
        @click="scrollToTop"
        class="back-to-top-btn"
        :class="{ 'visible': showBackToTop }"
    >
        <i class="fas fa-arrow-up"></i>
    </button>
</template>

<script>
    import DefaultLayout from '@/Layouts/DefaultLayout.vue';
    import Header from '@/components/Header.vue';
    import Footer from '@/components/Footer.vue';
    import '@/../css/home.css'

    export default {
        name: 'TermsAndConditions',
        layout: DefaultLayout,
        components: {
            DefaultLayout,
            Header,
            Footer
        },
        data() {
            return {
                showBackToTop: false
            }
        },
        methods: {
            handleScroll() {
                // Header scroll effect
                const header = document.getElementById('header');
                if (header) {
                    if (window.scrollY > 50) {
                        header.classList.add('scrolled');
                    } else {
                        header.classList.remove('scrolled');
                    }
                }

                // Show/hide back to top button
                this.showBackToTop = window.scrollY > 300;
            },

            scrollToTop() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }
        },

        mounted() {
            // Add scroll listener
            window.addEventListener('scroll', this.handleScroll);
            this.handleScroll(); // Check initial state
        },

        beforeUnmount() {
            window.removeEventListener('scroll', this.handleScroll);
        }
    };

</script>

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

.policy-section li strong {
    color: var(--dark);
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