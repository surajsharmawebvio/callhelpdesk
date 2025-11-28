@extends('layouts.app')

@section('content')
@include('components.header')

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>Search, Find & Call Brands with  <span>CallHelpDesk</span></h1>
            <p>Tired of searching where to call for your issues? Not anymore! CallHelpDesk offers every contact information of leading American companies right at your fingertips! Easy to search, and quick at service! Connect with the experts instantly!</p>
            <div class="search-container" id="searchContainer">
                <div class="search-wrapper">
                    <input 
                        type="text" 
                        class="search-input" 
                        placeholder="Search for a company or service..." 
                        id="searchQuery"
                        autocomplete="off"
                    >
                    <div id="searchDropdown" class="search-dropdown" style="display: none;"></div>
                </div>
                <button class="search-btn btn btn-primary" onclick="handleSearch()">
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
            <h2>The Callhelpdesk Advantage </h2>
            <p>Just search for the brand and find contact information without any hassle! </p>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3>Wide Database</h3>
                <p>Find contact information for US registered companies from all domains only on our platform!</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-user-friends"></i>
                </div>
                <h3>Available 24/7</h3>
                <p>Our platform is up & running 24-7 for your convenience, so you can sort out your problems easily</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <h3>Stay Updated</h3>
                <p>We offer users like you the most updated information available for all the listed companies, so you aren’t left out!</p>
            </div>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section class="about-us">
    <div class="container">
        <div class="section-title">
            <h2>What We Provide</h2>
        </div>
        <div class="about-content">
            <p>CallHelpDesk brings all customer support details together in one place for quick and reliable access</p>
            
            <div class="about-features">
                <div class="about-feature">
                    <div class="feature-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Locating the Correct Number Is Easy as Ever</h4>
                        <p>An endless search just to contact information of a brand is nothing but tiresome, and we understand this. Our website's interface is as easy as it gets for you to search and find relevant information right away! Just read along right now</p>
                    </div>
                </div>
                
                <div class="about-feature">
                    <div class="feature-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Find Customer Helpline for Every Brand</h4>
                        <p>Our platform is built to make your search effortless, and with that in mind we are offering contact details for all well-known companies across industries right for you! Everything is designed for a smoother experience without any extra steps!</p>
                    </div>
                </div>
                
                <div class="about-feature">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Save Your Time Effortlessly with the Right Helpline!</h4>
                        <p>Instead of browsing multiple pages and searching through multiple domains, you can find the correct number and right information for your requirement in one place! CallHelpDesk helps you move quickly so you can fix your problem and save time!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Easy Access Section -->
<section class="how-it-works">
    <div class="container">
        <div class="section-title">
            <h2>Easy Access to Customer Care Contact Details</h2>
            <p>Our website is designed with a clear intention and a simple goal; We are here to provide users updated contact information of all the leading companies of United States for no charges at all! Just type the company name and you get the number within seconds. No delays.</p>
        </div>

        <div class="steps">
            <div class="step">
                <div class="step-number">1</div>
                <h3>Get Helpline Info Quickly</h3>
                <p>Search and find contact info of your desired company right away with our platform</p>
            </div>

            <div class="step">
                <div class="step-number">2</div>
                <h3>Information Updated Frequently</h3>
                <p>Our team updates and reviews every piece of information for your convenience</p>
            </div>

            <div class="step">
                <div class="step-number">3</div>
                <h3>Clean and Simple Layout</h3>
                <p>CallHelpDesk is just as easy as it looks with its simple design and layout!</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq">
    <div class="container">
        <div class="section-title">
            <h2>Your Questions, Our Answers</h2>
            <p>Find answers to the common queries of our users</p>
        </div>

        <div class="accordion accordion-flush" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Are the customer support details on CallHelpDesk free to use?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes. All the numbers are completely free to access. Reach out to us now to get the contact details of any company
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Are the numbers on CallHelpDesk updated?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes! Our team regularly checks and updates the numbers to maintain accuracy. Our only goal is to make your job easier
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Can I access CallHelpDesk anytime?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        CallHelpDesk remains accessible 24/7. You can look for support numbers anytime, day or night, weekend or weekdays, without any restrictions
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Will I get contact numbers for most leading companies on CallHelpDesk?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        CallHelpDesk provides customer support numbers for a wide range of registered companies. This includes all the leading companies as well
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Are customer numbers of different industries available on CallHelpDesk?
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes, absolutely. We offer customer care contact details of the leading companies in different domains. Our only target is to help you out with the support contact numbers
                    </div>
                </div>
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
            <div class="owl-carousel owl-theme testimonials-carousel">
                <div class="testimonial-slide">
                    <div class="testimonial-avatar">
                        <img src="{{ asset('images/review/John Vallelonga.jpg') }}" alt="John Vallelonga">
                    </div>
                    <p class="testimonial-text">"Call Help Desk just does it right! I found the contact details of my airline within seconds, and I am glad I didn’t go through an hour-long search just to fix my reservation!"</p>
                    <h4 class="testimonial-author">John Vallelonga</h4>
                </div>

                <div class="testimonial-slide">
                    <div class="testimonial-avatar">
                        <img src="{{ asset('images/review/Sarah Jones.jpg') }}" alt="Sarah Jones">
                    </div>
                    <p class="testimonial-text">"I had issues with my reservations, and I couldn’t find my ticket on mail, I found this website, and it has been my life savior! I searched for the airline helpline and called them for assistance right away. Great experience!"</p>
                    <h4 class="testimonial-author">Sarah Jones</h4>
                </div>

                <div class="testimonial-slide">
                    <div class="testimonial-avatar">
                        <img src="{{ asset('images/review/Michael Turner.jpg') }}" alt="Michael Turner">
                    </div>
                    <p class="testimonial-text">"Changing my travel dates felt impossible until I landed on Call Help Desk. The site showed me the exact number I needed, and the airline resolved my issue in minutes. It saved me from a long chain of emails."</p>
                    <h4 class="testimonial-author">Michael Turner</h4>
                </div>

                <div class="testimonial-slide">
                    <div class="testimonial-avatar">
                        <img src="{{ asset('images/review/Daniel Brooks.jpg') }}" alt="Daniel Brooks">
                    </div>
                    <p class="testimonial-text">"I was stuck with a payment error while booking, and the app kept crashing. I came across this platform and got the official support line without any confusion. Quick, simple, and genuinely helpful."</p>
                    <h4 class="testimonial-author">Daniel Brooks</h4>
                </div>

                <div class="testimonial-slide">
                    <div class="testimonial-avatar">
                        <img src="{{ asset('images/review/Ana Ribeiro.jpg') }}" alt="Ana Ribeiro">
                    </div>
                    <p class="testimonial-text">"I needed to update the passenger name on my reservation, and most websites sent me in circles. Call Help Desk directed me to the right team straightaway. The clarity and accuracy really impressed me."</p>
                    <h4 class="testimonial-author">Ana Ribeiro</h4>
                </div>

                <div class="testimonial-slide">
                    <div class="testimonial-avatar">
                        <img src="{{ asset('images/review/Leonard White.jpg') }}" alt="Leonard White">
                    </div>
                    <p class="testimonial-text">"My flight got canceled suddenly, and I was unsure how to request compensation. I used Call Help Desk to get the official helpline, called in, and sorted everything without hassle. A dependable resource every traveler should bookmark."</p>
                    <h4 class="testimonial-author">Leonard White</h4>
                </div>
            </div>
        </div>
</section>

<!-- CTA Section -->
<section class="cta">
    <div class="container">
        <h2>Still Searching? Let us Assist You!</h2>
        <p>We completely understand the feeling, that is why we have our support team ready for help round the clock for your convenience! Connect Now to Connect with Our Experts!</p>
        <a href="mailto:connect@callhelpdesk.com" class="btn">Connect Now</a>
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

<style>
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
    border-radius: 50px !important;
}

.search-btn {
    font-size: 18px !important;
    padding: 16px 24px !important;
    min-height: 56px !important;
    border-radius: 50px !important;
}

.search-wrapper {
    position: relative;
    max-width: 600px;
}

/* Search Dropdown Styles */
.search-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    max-height: 300px;
    overflow-y: auto;
}

.search-item {
    padding: 12px 16px;
    cursor: pointer;
    border-bottom: 1px solid #f0f0f0;
    transition: background-color 0.2s ease;
}

.search-item:hover {
    background-color: #f8f9fa;
}

.search-item:last-child {
    border-bottom: none;
}

.company-info {
    display: flex;
    flex-direction: column;
}

.company-name {
    font-weight: 600;
    color: #333;
    margin-bottom: 4px;
}

.company-category {
    font-size: 14px;
    color: #666;
}

.search-item.loading,
.search-item.no-results {
    color: #666;
    font-style: italic;
}

.cta p {
    font-size: 1.2rem;
    max-width: 800px;
    margin: 0 auto 30px;
    opacity: .9;
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

/* About Us Section Styles */
.about-us {
    padding: 0 !important;
}

.about-content {
    max-width: 1200px;
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
    grid-template-columns: repeat(3, 1fr);
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
        padding: 0 !important;
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
    padding: 0 !important;
    background-color: #f8f9fa;
}

.faq .container {
    max-width: 1200px;
}

.accordion-flush .accordion-item {
    border-left: 0;
    border-right: 0;
    border-radius: 0;
}

.accordion-flush .accordion-item:first-child {
    border-top: 0;
}

.accordion-flush .accordion-item:last-child {
    border-bottom: 0;
}

.accordion-button {
    background-color: #fff;
    border: 0;
    border-radius: 0 !important;
    box-shadow: none;
    font-size: 1.1rem;
    font-weight: 500;
    color: #212529;
    padding: 1rem 1.25rem;
}

.accordion-button:not(.collapsed) {
    background-color: #fff;
    color: var(--primary);
    box-shadow: none;
}

.accordion-button:focus {
    box-shadow: none !important;
    outline: none !important;
}

.accordion-body {
    padding: 0 1.25rem 1rem 1.25rem;
    background-color: #f8f9fa;
    color: #6c757d;
    font-size: 1rem;
    line-height: 1.6;
}

/* Responsive adjustments for FAQ */
@media (max-width: 768px) {
    .faq {
        padding: 0 !important;
    }
    
    .accordion-button {
        padding: 0.75rem 1rem;
        font-size: 1rem;
    }
    
    .accordion-body {
        padding: 0 1rem 0.75rem 1rem;
        font-size: 0.95rem;
    }
}
button {
    border-radius: 50px !important;
}
.hero-content{
    text-align: center;
}
.testimonial-text {
    font-size: 1.1rem !important;
    height: 280px !important;
}
.testimonial-slide {
    padding: 50px 50px 20px 50px !important;
}
.accordion-button {
    background: #ffffff78 !important;
    color: #212529 !important;
}

</style>

<script>
let searchTimeout = null;
let searchResults = [];

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
                if (!backToTopBtn.classList.contains('visible')) {
                    backToTopBtn.style.display = 'none';
                }
            }, 300);
        }
    }
}

async function searchCompanies(searchInput, searchDropdown) {
    const searchQuery = searchInput.value.trim();
    
    // Clear previous timeout
    if (searchTimeout) {
        clearTimeout(searchTimeout);
    }

    if (!searchQuery) {
        searchResults = [];
        searchDropdown.style.display = 'none';
        return;
    }

    // Debounce search to avoid too many API calls
    searchTimeout = setTimeout(async () => {
        searchDropdown.innerHTML = '<div class="search-item loading"><div class="company-info"><div class="company-name"><i class="fas fa-spinner fa-spin"></i> Searching...</div></div></div>';
        searchDropdown.style.display = 'block';
        
        try {
            const response = await fetch(`/api/companies/search?query=${encodeURIComponent(searchQuery)}`);
            const companies = await response.json();
            
            searchResults = companies;
            displaySearchResults(companies, searchDropdown);
        } catch (error) {
            console.error('Search error:', error);
            searchResults = [];
            searchDropdown.innerHTML = '<div class="search-item no-results"><div class="company-info"><div class="company-name">Error searching companies</div></div></div>';
        }
    }, 300);
}

function displaySearchResults(companies, searchDropdown) {
    if (companies.length === 0) {
        searchDropdown.innerHTML = '<div class="search-item no-results"><div class="company-info"><div class="company-name">No companies found</div></div></div>';
    } else {
        searchDropdown.innerHTML = companies.map(company => `
            <div class="search-item" onclick="selectCompany('${company.url}', '${company.name}')">
                <div class="company-info">
                    <div class="company-name">${company.name}</div>
                    ${company.category ? `<div class="company-category">${company.category}</div>` : ''}
                </div>
            </div>
        `).join('');
    }
    
    searchDropdown.style.display = 'block';
}

function selectCompany(url, name) {
    // Update both search inputs
    const homeSearchInput = document.getElementById('searchQuery');
    const headerSearchInput = document.getElementById('headerSearchInput');
    
    if (homeSearchInput) homeSearchInput.value = name;
    if (headerSearchInput) headerSearchInput.value = name;
    
    // Hide both dropdowns
    const homeDropdown = document.getElementById('searchDropdown');
    const headerDropdown = document.getElementById('headerSearchDropdown');
    
    if (homeDropdown) homeDropdown.style.display = 'none';
    if (headerDropdown) headerDropdown.style.display = 'none';
    
    window.location.href = url;
}

function handleSearch() {
    const homeSearchInput = document.getElementById('searchQuery');
    const headerSearchInput = document.getElementById('headerSearchInput');
    
    const searchQuery = homeSearchInput ? homeSearchInput.value.trim() : 
                       (headerSearchInput ? headerSearchInput.value.trim() : '');
    
    if (searchQuery) {
        console.log('Searching for:', searchQuery);
        // You can add navigation or API call here
    }
}

function syncSearchInputs(sourceInput) {
    const homeSearchInput = document.getElementById('searchQuery');
    const headerSearchInput = document.getElementById('headerSearchInput');
    
    if (sourceInput === homeSearchInput && headerSearchInput) {
        headerSearchInput.value = sourceInput.value;
    } else if (sourceInput === headerSearchInput && homeSearchInput) {
        homeSearchInput.value = sourceInput.value;
    }
}

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Add event listeners
document.addEventListener('DOMContentLoaded', function() {
    window.addEventListener('scroll', handleScroll);
    handleScroll();
    
    // Home search input listeners
    const homeSearchInput = document.getElementById('searchQuery');
    const homeSearchDropdown = document.getElementById('searchDropdown');
    
    if (homeSearchInput && homeSearchDropdown) {
        homeSearchInput.addEventListener('input', function() {
            syncSearchInputs(homeSearchInput);
            searchCompanies(homeSearchInput, homeSearchDropdown);
        });
        homeSearchInput.addEventListener('focus', function() {
            if (searchResults.length > 0) {
                homeSearchDropdown.style.display = 'block';
            }
        });
        homeSearchInput.addEventListener('blur', function() {
            setTimeout(() => {
                if (homeSearchDropdown) homeSearchDropdown.style.display = 'none';
            }, 200);
        });
    }
    
    // Header search input listeners
    const headerSearchInput = document.getElementById('headerSearchInput');
    const headerSearchDropdown = document.getElementById('headerSearchDropdown');
    
    if (headerSearchInput && headerSearchDropdown) {
        headerSearchInput.addEventListener('input', function() {
            syncSearchInputs(headerSearchInput);
            searchCompanies(headerSearchInput, headerSearchDropdown);
        });
        headerSearchInput.addEventListener('focus', function() {
            if (searchResults.length > 0) {
                headerSearchDropdown.style.display = 'block';
            }
        });
        headerSearchInput.addEventListener('blur', function() {
            setTimeout(() => {
                if (headerSearchDropdown) headerSearchDropdown.style.display = 'none';
            }, 200);
        });
    }
    
    // Header search button listener
    const headerSearchBtn = document.getElementById('headerSearchBtn');
    if (headerSearchBtn) {
        headerSearchBtn.addEventListener('click', handleSearch);
    }

    // Initialize Owl Carousel for testimonials
    $('.testimonials-carousel').owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 3
            }
        }
    });
});
</script>
@endsection
