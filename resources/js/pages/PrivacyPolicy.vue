<template>
    <Header />

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1>Privacy <span>Policy</span></h1>
                <p>Your privacy is important to us. Learn how we collect, use, and protect your personal information when you use our services.</p>
            </div>
        </div>
    </section>

    <!-- Privacy Policy Content -->
    <section class="privacy-content">
        <div class="container">
            <div class="content-wrapper">
                <div class="last-updated">
                    <p>Last updated: November 10, 2025</p>
                </div>

                <div class="policy-section">
                    <h2>1. Information We Collect</h2>
                    <p>We collect information you provide directly to us, such as when you create an account, use our services, or contact us for support. This may include:</p>
                    <ul>
                        <li><strong>Personal Information:</strong> Name, email address, phone number, and other contact details</li>
                        <li><strong>Usage Data:</strong> Information about how you use our website and services</li>
                        <li><strong>Device Information:</strong> IP address, browser type, operating system, and device identifiers</li>
                        <li><strong>Communication Data:</strong> Messages, feedback, and support requests you send to us</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h2>2. How We Use Your Information</h2>
                    <p>We use the information we collect to:</p>
                    <ul>
                        <li>Provide, maintain, and improve our services</li>
                        <li>Process transactions and send related information</li>
                        <li>Send technical notices, updates, security alerts, and support messages</li>
                        <li>Respond to your comments, questions, and requests</li>
                        <li>Communicate with you about products, services, offers, and events</li>
                        <li>Monitor and analyze trends, usage, and activities</li>
                        <li>Detect, investigate, and prevent fraudulent transactions and other illegal activities</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h2>3. Information Sharing and Disclosure</h2>
                    <p>We do not sell, trade, or otherwise transfer your personal information to third parties without your consent, except as described in this policy:</p>
                    <ul>
                        <li><strong>Service Providers:</strong> We may share information with trusted third-party service providers who assist us in operating our website and conducting our business</li>
                        <li><strong>Legal Requirements:</strong> We may disclose information if required by law, court order, or government request</li>
                        <li><strong>Business Transfers:</strong> In the event of a merger, acquisition, or sale of assets, your information may be transferred</li>
                        <li><strong>Protection of Rights:</strong> We may share information to protect our rights, property, or safety, or that of our users</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h2>4. Data Security</h2>
                    <p>We implement appropriate technical and organizational measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. These measures include:</p>
                    <ul>
                        <li>Encryption of data in transit and at rest</li>
                        <li>Regular security assessments and updates</li>
                        <li>Access controls and authentication procedures</li>
                        <li>Secure data storage and processing facilities</li>
                    </ul>
                    <p>However, no method of transmission over the internet or electronic storage is 100% secure, and we cannot guarantee absolute security.</p>
                </div>

                <div class="policy-section">
                    <h2>5. Cookies and Tracking Technologies</h2>
                    <p>We use cookies and similar tracking technologies to enhance your experience on our website:</p>
                    <ul>
                        <li><strong>Essential Cookies:</strong> Required for the website to function properly</li>
                        <li><strong>Analytics Cookies:</strong> Help us understand how visitors interact with our website</li>
                        <li><strong>Functional Cookies:</strong> Remember your preferences and settings</li>
                        <li><strong>Marketing Cookies:</strong> Used to deliver relevant advertisements</li>
                    </ul>
                    <p>You can control cookie preferences through your browser settings, but disabling certain cookies may affect website functionality.</p>
                </div>

                <div class="policy-section">
                    <h2>6. Your Rights and Choices</h2>
                    <p>You have certain rights regarding your personal information:</p>
                    <ul>
                        <li><strong>Access:</strong> Request a copy of the personal information we hold about you</li>
                        <li><strong>Correction:</strong> Request correction of inaccurate or incomplete information</li>
                        <li><strong>Deletion:</strong> Request deletion of your personal information</li>
                        <li><strong>Portability:</strong> Request transfer of your data to another service</li>
                        <li><strong>Opt-out:</strong> Unsubscribe from marketing communications</li>
                    </ul>
                    <p>To exercise these rights, please contact us using the information provided below.</p>
                </div>

                <div class="policy-section">
                    <h2>7. Data Retention</h2>
                    <p>We retain your personal information for as long as necessary to provide our services, comply with legal obligations, resolve disputes, and enforce our agreements. The specific retention periods vary depending on the type of information and the purpose for which it was collected.</p>
                </div>

                <div class="policy-section">
                    <h2>8. International Data Transfers</h2>
                    <p>Your information may be transferred to and processed in countries other than your own. We ensure that such transfers comply with applicable data protection laws and implement appropriate safeguards to protect your information.</p>
                </div>

                <div class="policy-section">
                    <h2>9. Children's Privacy</h2>
                    <p>Our services are not intended for children under 13 years of age. We do not knowingly collect personal information from children under 13. If we become aware that we have collected personal information from a child under 13, we will take steps to delete such information.</p>
                </div>

                <div class="policy-section">
                    <h2>10. Changes to This Privacy Policy</h2>
                    <p>We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last updated" date. We encourage you to review this Privacy Policy periodically.</p>
                </div>

                <div class="policy-section">
                    <h2>11. Contact Us</h2>
                    <p>If you have any questions about this Privacy Policy or our privacy practices, please contact us:</p>
                    <div class="contact-info">
                        <p><strong>Email:</strong> privacy@elevate.com</p>
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
        name: 'PrivacyPolicy',
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

/* Privacy Content */
.privacy-content {
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