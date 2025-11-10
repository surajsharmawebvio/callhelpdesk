<template>
    <Header />

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1>Get Human Support <span>Faster Than Ever</span></h1>
                <p>Connect with real customer service representatives in minutes, not hours. Skip the automated systems
                    and get the help you need right away.</p>
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
                <h2>Why Choose Elevate?</h2>
                <p>We provide the fastest and most effective way to connect with customer support representatives.</p>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3>Lightning Fast</h3>
                    <p>Get connected to a human representative in under 3 minutes on average.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>100% Secure</h3>
                    <p>Your information is protected with bank-level encryption and security protocols.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3>Global Support</h3>
                    <p>We help customers from over 50 countries connect with support in their language.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works">
        <div class="container">
            <div class="section-title">
                <h2>How It Works</h2>
                <p>Getting the support you need is simple with our three-step process.</p>
            </div>

            <div class="steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <h3>Tell Us Your Issue</h3>
                    <p>Describe the problem you're facing and which company you need help with.</p>
                </div>

                <div class="step">
                    <div class="step-number">2</div>
                    <h3>We Find the Best Contact</h3>
                    <p>Our system identifies the fastest way to reach a human representative.</p>
                </div>

                <div class="step">
                    <div class="step-number">3</div>
                    <h3>Get Connected</h3>
                    <p>We connect you directly or provide the exact steps to reach a person quickly.</p>
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
            <h2>Ready to Skip the Wait?</h2>
            <p>Join thousands of satisfied customers who get the support they need in minutes.</p>
            <a href="#" class="btn">Get Started For Free</a>
        </div>
    </section>

    <Footer />

    <!-- Back to Top Button (Mobile Only) -->
    <button 
        v-if="showBackToTop" 
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

/* Prevent horizontal scroll */
* {
    max-width: 100%;
    box-sizing: border-box;
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
    width: 100%;
    max-width: 100%;
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
    box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
    cursor: pointer;
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px) scale(0.8);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 999;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
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

/* Hide on desktop */
@media (min-width: 769px) {
    .back-to-top-btn {
        display: none !important;
    }
}
</style>
