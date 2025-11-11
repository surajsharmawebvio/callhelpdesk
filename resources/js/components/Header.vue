<!-- make header component -->
<template>
    <header id="header" :class="{ 'scrolled': isScrolled }">
        <div class="container header-container">
            <a href="#" class="logo">
                <div class="logo-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <div class="logo-text">Elevate<span>Support</span></div>
            </a>

            <!-- Search bar that appears on scroll -->
            <div class="search-bar" :class="{ 'visible': showSearchInHeader }">
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
                </button>
            </div>

        </div>
    </header>
</template>

<script>
    export default {
        name: 'Header',
        data() {
            return {
                showSearchInHeader: false,
                isScrolled: false,
                searchQuery: '',
                searchResults: [],
                showDropdown: false,
                searchLoading: false,
                searchTimeout: null
            }
        },
        methods: {
            handleScroll() {
                const heroSection = document.querySelector('.hero');
                if (heroSection) {
                    const heroBottom = heroSection.offsetTop + heroSection.offsetHeight;
                    const scrollPosition = window.scrollY;
                    
                    // Show search in header when scrolled past hero section
                    this.showSearchInHeader = scrollPosition > heroBottom - 100;
                    this.isScrolled = scrollPosition > 50;
                }
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
                
                // Navigate to company page
                console.log('Selected company:', company.url);
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
                    console.log('Searching for:', this.searchQuery);
                }
            }
        },
        mounted() {
            window.addEventListener('scroll', this.handleScroll);
            this.handleScroll(); // Check initial state
        },
        beforeUnmount() {
            window.removeEventListener('scroll', this.handleScroll);
        }
    }
</script>

<style scoped>
:root {
    --primary: #4361ee;
    --secondary: #3a0ca3;
    --accent: #f72585;
    --light: #f8f9fa;
    --dark: #212529;
    --gray: #6c757d;
}

/* Header Styles */
header {
    background-color: white;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
    transition: all 0.3s ease;
}

header.scrolled {
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}

.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 0;
    transition: padding 0.3s ease;
}

.logo {
    display: flex;
    align-items: center;
    text-decoration: none;
}

.logo-icon {
    font-size: 28px;
    color: var(--primary);
    margin-right: 10px;
}

.logo-text {
    font-size: 24px;
    font-weight: 700;
    color: var(--dark);
}

.logo-text span {
    color: var(--primary);
}

.search-bar {
    display: flex;
    align-items: center;
    gap: 15px;
    max-width: 600px;
    flex: 1;
    margin: 0 30px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-20px) scale(0.95);
    transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.search-bar.visible {
    opacity: 1;
    visibility: visible;
    transform: translateY(0) scale(1);
    transition-delay: 0.1s;
    filter: drop-shadow(0 4px 12px rgba(67, 97, 238, 0.15));
}

.search-wrapper {
    flex: 1;
    position: relative;
}

.search-input {
    width: 100%;
    padding: 12px 20px;
    border: 2px solid #e1e5e9;
    border-radius: 30px;
    font-size: 16px;
    outline: none;
    transition: all 0.3s ease;
    background-color: white;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.search-input:focus {
    border-color: var(--primary);
    box-shadow: 0 4px 15px rgba(67, 97, 238, 0.2), 0 0 0 3px rgba(67, 97, 238, 0.1);
}

.search-input::placeholder {
    color: var(--gray);
    font-weight: 400;
}

.search-btn {
    padding: 12px 20px;
    border: 2px solid var(--primary);
    border-radius: 30px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 50px;
}

.search-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(67, 97, 238, 0.4);
}

.search-btn i {
    font-size: 16px;
}

.search-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    z-index: 9999;
    max-height: 300px;
    overflow-y: auto;
    margin-top: 5px;
    border: 1px solid #e1e5e9;
}

.search-item {
    padding: 12px 16px;
    cursor: pointer;
    transition: all 0.3s ease;
    border-bottom: 1px solid #f1f3f4;
    display: flex;
    align-items: center;
}

.search-item:last-child {
    border-bottom: none;
}

.search-item:hover {
    background-color: rgba(67, 97, 238, 0.05);
    padding-left: 20px;
}

.search-item.no-results {
    cursor: default;
    color: var(--gray);
    font-style: italic;
}

.search-item.no-results:hover {
    background-color: transparent;
    padding-left: 16px;
}

.search-item.loading {
    cursor: default;
    color: var(--primary);
}

.search-item.loading:hover {
    background-color: transparent;
    padding-left: 16px;
}

.company-info {
    flex: 1;
}

.company-name {
    font-weight: 600;
    color: var(--dark);
    font-size: 14px;
    margin-bottom: 2px;
}

.company-category {
    font-size: 12px;
    color: var(--gray);
    font-weight: 400;
}

.search-item.loading .company-name i {
    margin-right: 8px;
    color: var(--primary);
}

/* Responsive */
@media (max-width: 768px) {
    .header-container {
        padding: 15px 0;
    }

    .logo-text {
        font-size: 20px;
    }

    .logo-icon {
        font-size: 24px;
    }

    .search-bar {
        margin: 0 10px;
        max-width: 300px;
        gap: 10px;
    }
    
    .search-input {
        padding: 10px 16px;
        font-size: 15px;
    }
    
    .search-btn {
        padding: 10px 16px;
        min-width: 45px;
    }
    
    .search-btn i {
        font-size: 15px;
    }
    
    .search-dropdown {
        border-radius: 10px;
    }
    
    .search-item {
        padding: 10px 12px;
    }
}
</style>
