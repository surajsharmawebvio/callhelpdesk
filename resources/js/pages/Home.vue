<template>
    <Header />

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1>Skip the Wait. Get Bookings <span>Done Right Away.</span></h1>
                <p>Tired of spending hours on hold and dealing with endless robotic callers and their responses? Connect with Call Help Desk and speak directly with a live representative to book or resolve any airline issues.</p>
                <div class="search-container" :class="{ 'hidden-on-scroll': hideSearchInHero }">
                    <div class="search-wrapper">
                        <input 
                            type="text" 
                            class="search-input" 
                            placeholder="Search for a company or service..." 
                            v-model="searchQuery"
                            @input="searchCompanies"
                            @focus="showDropdown = true"
                            @blur="hideDropdown"
                        >
                        <div v-if="showDropdown && searchResults.length > 0" class="search-dropdown">
                            <div 
                                v-for="company in searchResults" 
                                :key="company._id || company.id"
                                class="search-item"
                                @mousedown="selectCompany(company)"
                            >
                                <div class="company-info">
                                    <div class="company-name">{{ company.name }}</div>
                                    <div class="company-category" v-if="company.category">{{ company.category }}</div>
                                </div>
                            </div>
                        </div>
                        <div v-if="showDropdown && searchQuery && searchResults.length === 0 && !searchLoading" class="search-dropdown">
                            <div class="search-item no-results">
                                <div class="company-info">
                                    <div class="company-name">No companies found</div>
                                </div>
                            </div>
                        </div>
                        <div v-if="searchLoading && showDropdown" class="search-dropdown">
                            <div class="search-item loading">
                                <div class="company-info">
                                    <div class="company-name">
                                        <i class="fas fa-spinner fa-spin"></i>
                                        Searching...
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="search-btn btn btn-primary" @click="handleSearch">
                        <i class="fas fa-search"></i>
                        Search
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <div class="section-title">
                <h2>Features</h2>
                <p>We provide real travel solutions to real problems without any delays or bots in between.</p>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>No More Waiting on Hold</h3>
                    <p>End the endless phone quests and chat with a live agent the second you call, and get bookings done.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <h3>24/7 Support from Real Agents</h3>
                    <p>Whether you need help at 3 am or on Christmas eve, Call Help Desk is here for you round-the-clock.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3>Help from Airline & Travel Experts</h3>
                    <p>Our team has airline and travel experts who’ll make your booking, changes, and refunds a total breeze.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="about-us">
        <div class="container">
            <div class="section-title">
                <h2>About Us</h2>
            </div>
            <div class="about-content">
                <p>Getting stuck on the calls for hours is frustrating, and we understand that. That's why CallHelp Desk has made it its mission to assist its users with real human help, no bots. With zero to no waiting time, we are present to help you round-the-clock across the United States. Our focus is simple - to bring focus to the digital chaos and make customer service quick, easy, and hassle-free.</p>
                
                <div class="about-features">
                    <div class="about-feature">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="feature-text">
                            <h4>Hassle-free support</h4>
                            <p>Thousands of travelers have put their trust in us to handle their bookings, changes, and cancellations. Now it's your turn!</p>
                        </div>
                    </div>
                    
                    <div class="about-feature">
                        <div class="feature-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="feature-text">
                            <h4>All-round support</h4>
                            <p>No matter which customer service numbers you're looking for, all are present on this platform to resolve your issues in one go.</p>
                        </div>
                    </div>
                    
                    <div class="about-feature">
                        <div class="feature-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="feature-text">
                            <h4>Live human representative</h4>
                            <p>Talk to a real human for your travel needs without the unnecessary wait times and get the help that you need.</p>
                        </div>
                    </div>

                    <div class="about-feature">
                        <div class="feature-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="feature-text">
                            <h4>Expert guidance</h4>
                            <p>Our experienced travel specialists provide personalized assistance for all your booking and support needs.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works">
        <div class="container">
            <div class="section-title">
                <h2>FEATURES</h2>
                <p>We provide real travel solutions to real problems without any delays or bots in between.</p>
            </div>

            <div class="steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <h3>Connect Instantly to a Real Expert</h3>
                    <p>No more waiting and direct calling to a live agent to get the answers to your travel problems. Reschedule your calls at any time that suits your schedule, and speak to an agent.</p>
                </div>

                <div class="step">
                    <div class="step-number">2</div>
                    <h3>Round-the-Clock Support</h3>
                    <p>Travel needs don’t arise within business hours. Therefore, we are here for you 24/7 to assist you with a booking or answer your queries. Call us when you feel and get solutions to your problems.</p>
                </div>

                <div class="step">
                    <div class="step-number">3</div>
                    <h3>Multi-Brand Assistance</h3>
                    <p>Stop juggling from website to website for contact numbers and simply call us for all your needs. We connect you with whichever company you want to talk to within the United States or even internationally.</p>
                </div>

                <div class="step">
                    <div class="step-number">4</div>
                    <h3>No Stress, Only Solutions</h3>
                    <p>From early bookings to last-minute ones, get support from Call Help Desk professionals without waiting time. Travel with peace of mind with expert guidance and reliable support at every step.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq">
        <div class="container">
            <div class="section-title">
                <h2>Frequently Asked Questions</h2>
                <p>Find answers to common questions about our service</p>
            </div>

            <div class="faq-list">
                <div class="faq-item">
                    <h3>Why use CallHelpDesk.com instead of Google for support numbers?</h3>
                    <p>With Call Help Desk, you get support numbers and instant assistance without hunting Google for hours. Our platform is trusted by thousands to get to those customer service lines fast and connect with a human agent, skipping all the hassle.</p>
                </div>

                <div class="faq-item">
                    <h3>Is the Call Help Desk available 24/7?</h3>
                    <p>Yes. Call Help Desk is there for your travel needs round-the-clock, offering you support. We're available anytime you want and get answers to your needs regardless of time zones or emergencies.</p>
                </div>

                <div class="faq-item">
                    <h3>Does Call Help Desk handle emergency flight issues or last-minute bookings?</h3>
                    <p>If you want support, like for cancellations or rescheduling, Call Help Desk is there for you. For flight bookings or last-minute reservations, we suggest you talk to the concerned company's agent directly or use their emergency support number.</p>
                </div>

                <div class="faq-item">
                    <h3>Is my personal and booking information safe with CallHelpDesk?</h3>
                    <p>Yes. Whatever personal data you provide, Call Help Desk is secure with us. We protect your personal information through secure protocols. For details, we suggest you read our Privacy Policy thoroughly.</p>
                </div>

                <div class="faq-item">
                    <h3>Can I book new flights directly through CallHelpDesk?</h3>
                    <p>Yes, you can book a flight to your desired destination from multiple airlines with Call Help Desk. Our goal is to connect you with airline support for inquiries, cancellations, or changes, and also assist you with flight booking whenever needed.</p>
                </div>

                <div class="faq-item">
                    <h3>Do I need to wait on hold to speak with CallHelpDesk?</h3>
                    <p>No, you don't have to wait longer to speak with an agent here. We aim to reduce the hold time by connecting you to live agents directly and offering "zero wait time" support.</p>
                </div>

                <div class="faq-item">
                    <h3>Is CallHelpDesk.com free?</h3>
                    <p>Yes, Call Help Desk is free to use for those seeking airline support. There aren't any charges for getting the assistance, which makes us a convenient resource for travelers.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <div class="section-title">
                <h2>What Our Users Say</h2>
                <p>Thousands of customers have saved time and frustration with our service.</p>
            </div>

            <div class="testimonials-container">
                <div class="testimonial-slider">
                    <div class="testimonial-track">
                        <div class="testimonial-slide">
                            <div class="testimonial-avatar">
                                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah Johnson">
                            </div>
                            <p class="testimonial-text">"I was on hold for over an hour with my airline. With Elevate, I
                                got through to a representative in just 4 minutes! This service is a lifesaver."</p>
                            <h4 class="testimonial-author">Sarah Johnson</h4>
                            <p class="testimonial-role">Frequent Traveler</p>
                        </div>

                        <div class="testimonial-slide">
                            <div class="testimonial-avatar">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Michael Chen">
                            </div>
                            <p class="testimonial-text">"As a small business owner, time is money. Elevate has saved me
                                countless hours navigating automated phone systems. Worth every penny!"</p>
                            <h4 class="testimonial-author">Michael Chen</h4>
                            <p class="testimonial-role">Business Owner</p>
                        </div>

                        <div class="testimonial-slide">
                            <div class="testimonial-avatar">
                                <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Jessica Williams">
                            </div>
                            <p class="testimonial-text">"I used to dread calling customer service. Now with Elevate, I
                                know I'll get help quickly. The peace of mind is incredible."</p>
                            <h4 class="testimonial-author">Jessica Williams</h4>
                            <p class="testimonial-role">Satisfied Customer</p>
                        </div>
                    </div>
                </div>

                <div class="slider-nav">
                    <div class="slider-dot active" data-slide="0"></div>
                    <div class="slider-dot" data-slide="1"></div>
                    <div class="slider-dot" data-slide="2"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <h2>Talk to a Pro in Seconds!</h2>
            <p>Call Help Desk values your time and thus connects you instantly to an actual human with no waiting times who handles all your travel needs quickly.</p>
            <a href="#" class="btn">Get Started</a>
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
    // import '@/../../public/assets/css/main.css';
    import '@/../css/home.css'

    export default {
        name: 'Home',
        layout: DefaultLayout,
        components: {
            DefaultLayout,
            Header,
            Footer
        },
        data() {
            return {
                hideSearchInHero: false,
                searchQuery: '',
                searchResults: [],
                showDropdown: false,
                searchLoading: false,
                searchTimeout: null,
                showBackToTop: false
            }
        },
        methods: {
            handleScroll() {
                const heroSection = document.querySelector('.hero');
                if (heroSection) {
                    const heroBottom = heroSection.offsetTop + heroSection.offsetHeight;
                    const scrollPosition = window.scrollY;
                    
                    // Hide search in hero when scrolled past it
                    this.hideSearchInHero = scrollPosition > heroBottom - 100;
                }
                
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
            async searchCompanies() {
                const query = this.searchQuery.trim();
                
                // Clear previous timeout
                if (this.searchTimeout) {
                    clearTimeout(this.searchTimeout);
                }

                if (!query) {
                    this.searchResults = [];
                    this.showDropdown = false;
                    return;
                }

                // Debounce search to avoid too many API calls
                this.searchTimeout = setTimeout(async () => {
                    this.searchLoading = true;
                    
                    try {
                        const response = await fetch(`/api/companies/search?query=${encodeURIComponent(query)}`);
                        const companies = await response.json();
                        
                        this.searchResults = companies;
                        this.showDropdown = true;
                    } catch (error) {
                        console.error('Search error:', error);
                        this.searchResults = [];
                    } finally {
                        this.searchLoading = false;
                    }
                }, 300); // 300ms debounce
            },
            
            selectCompany(company) {
                this.searchQuery = company.name;
                this.showDropdown = false;
                this.searchResults = [];
                
                // Navigate to company page or handle selection
                console.log('Selected company:', company.url);
                // You can add navigation here, e.g.:
                this.$inertia.visit(company.url);
            },
            
            hideDropdown() {
                // Delay hiding to allow for click events
                setTimeout(() => {
                    this.showDropdown = false;
                }, 200);
            },
            
            handleSearch() {
                if (this.searchQuery.trim()) {
                    // Handle search functionality here
                    console.log('Searching for:', this.searchQuery);
                    // You can add navigation or API call here
                }
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

            // Testimonial slider
            const track = document.querySelector('.testimonial-track');
            const slides = document.querySelectorAll('.testimonial-slide');
            const dots = document.querySelectorAll('.slider-dot');
            let currentSlide = 0;

            function goToSlide(slideIndex) {
                track.style.transform = `translateX(-${slideIndex * 100}%)`;

                // Update active dot
                dots.forEach(dot => dot.classList.remove('active'));
                dots[slideIndex].classList.add('active');

                currentSlide = slideIndex;
            }

            // Add click events to dots
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    goToSlide(index);
                });
            });

            // Auto slide
            setInterval(() => {
                let nextSlide = (currentSlide + 1) % slides.length;
                goToSlide(nextSlide);
            }, 5000);
        },
        beforeUnmount() {
            window.removeEventListener('scroll', this.handleScroll);
        }
    };

</script>

<style scoped>
/* Add padding to account for fixed header */
.hero {
    padding-top: 80px;
}

/* Make search elements bigger on home page */
.search-input {
    font-size: 18px !important;
    padding: 16px 20px !important;
    height: auto !important;
    min-height: 56px !important;
}

.search-btn {
    font-size: 18px !important;
    padding: 16px 24px !important;
    min-height: 56px !important;
}

.search-wrapper {
    position: relative;
    max-width: 600px;
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
        padding-top: 70px;
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

/* About Us Section Styles */
.about-us {
    padding: 80px 0;
    background-color: #f8f9fa;
}

.about-content {
    max-width: 1000px;
    margin: 0 auto;
    text-align: center;
}

.about-content p {
    font-size: 18px;
    line-height: 1.6;
    color: #666;
    margin-bottom: 50px;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

.about-features {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-top: 50px;
}

.about-feature {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    background: white;
    padding: 30px 20px;
    border-radius: 16px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
}

.about-feature:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.feature-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    color: white;
    font-size: 24px;
}

.checkmark {
    font-size: 28px;
    color: #28a745;
    margin-bottom: 15px;
    display: block;
    text-align: center;
}

.feature-text h4 {
    font-size: 22px;
    font-weight: 700;
    color: #333;
    margin-bottom: 15px;
    line-height: 1.3;
}

.feature-text p {
    font-size: 16px;
    line-height: 1.6;
    color: #666;
    margin: 0;
}

/* Responsive adjustments for About Us */
@media (max-width: 1200px) {
    .about-features {
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
    }
}

@media (max-width: 768px) {
    .about-us {
        padding: 60px 0;
    }
    
    .about-content p {
        font-size: 16px;
        margin-bottom: 40px;
    }
    
    .about-features {
        grid-template-columns: 1fr;
        gap: 20px;
        margin-top: 40px;
    }
    
    .about-feature {
        padding: 25px 20px;
    }
    
    .checkmark {
        font-size: 24px;
        margin-bottom: 12px;
    }
    
    .feature-icon {
        width: 50px;
        height: 50px;
        font-size: 20px;
        margin-bottom: 15px;
    }
    
    .feature-text h4 {
        font-size: 20px;
    }
    
    .feature-text p {
        font-size: 15px;
    }
}

/* FAQ Section Styles */
.faq {
    padding: 80px 0;
    background-color: #f8f9fa;
}

.faq-list {
    max-width: 1000px;
    margin: 0 auto;
}

.faq-item {
    background: white;
    padding: 30px;
    margin-bottom: 20px;
    border-radius: 16px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.faq-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.faq-item h3 {
    font-size: 20px;
    font-weight: 700;
    color: #333;
    margin-bottom: 15px;
    line-height: 1.4;
}

.faq-item p {
    font-size: 16px;
    line-height: 1.6;
    color: #666;
    margin: 0;
}

/* Responsive adjustments for FAQ */
@media (max-width: 768px) {
    .faq {
        padding: 60px 0;
    }
    
    .faq-item {
        padding: 25px 20px;
    }
    
    .faq-item h3 {
        font-size: 18px;
    }
    
    .faq-item p {
        font-size: 15px;
    }
}
</style>
