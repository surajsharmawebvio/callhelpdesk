(function() {
    // Header scroll functionality
    function handleHeaderScroll() {
        const header = document.getElementById('header');
        const heroSection = document.querySelector('.hero');
        const searchBar = document.getElementById('headerSearchBar');
        
        if (!header) return;
        
        const scrollPosition = window.scrollY;
        
        // Add scrolled class to header
        if (scrollPosition > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
        
        // Show search bar when scrolled past hero
        if (heroSection && searchBar) {
            const heroBottom = heroSection.offsetTop + heroSection.offsetHeight;
            if (scrollPosition > heroBottom - 100) {
                searchBar.classList.add('visible');
            } else {
                searchBar.classList.remove('visible');
            }
        }
    }

    // Search functionality
    let searchTimeout = null;
    let searchLoading = false;

    async function handleSearch(inputElement, dropdownElement) {
        const query = inputElement.value.trim();
        
        // Clear previous timeout
        if (searchTimeout) {
            clearTimeout(searchTimeout);
        }

        if (!query) {
            dropdownElement.style.display = 'none';
            return;
        }

        // Debounce search
        searchTimeout = setTimeout(async () => {
            searchLoading = true;
            dropdownElement.innerHTML = '<div class="search-item loading"><div class="company-info"><div class="company-name"><i class="fas fa-spinner fa-spin"></i> Searching...</div></div></div>';
            dropdownElement.style.display = 'block';
            
            try {
                const response = await fetch(`/api/companies/search?query=${encodeURIComponent(query)}`);
                const companies = await response.json();
                
                if (companies.length > 0) {
                    dropdownElement.innerHTML = companies.map(company => `
                        <div class="search-item" onclick="window.location.href='${company.url}'">
                            <div class="company-info">
                                <div class="company-name">${company.name}</div>
                                ${company.category ? `<div class="company-category">${company.category}</div>` : ''}
                            </div>
                        </div>
                    `).join('');
                } else {
                    dropdownElement.innerHTML = '<div class="search-item no-results"><div class="company-info"><div class="company-name">No companies found</div></div></div>';
                }
                
                dropdownElement.style.display = 'block';
            } catch (error) {
                console.error('Search error:', error);
                dropdownElement.innerHTML = '<div class="search-item no-results"><div class="company-info"><div class="company-name">Error searching</div></div></div>';
            } finally {
                searchLoading = false;
            }
        }, 300);
    }

    // Initialize header search
    function initHeaderSearch() {
        const headerSearchInput = document.getElementById('headerSearchInput');
        const headerSearchDropdown = document.getElementById('headerSearchDropdown');
        const headerSearchBtn = document.getElementById('headerSearchBtn');
        
        if (headerSearchInput && headerSearchDropdown) {
            headerSearchInput.addEventListener('input', () => {
                handleSearch(headerSearchInput, headerSearchDropdown);
            });
            
            headerSearchInput.addEventListener('focus', () => {
                if (headerSearchInput.value.trim()) {
                    headerSearchDropdown.style.display = 'block';
                }
            });
            
            headerSearchInput.addEventListener('blur', () => {
                setTimeout(() => {
                    headerSearchDropdown.style.display = 'none';
                }, 200);
            });
        }
        
        if (headerSearchBtn) {
            headerSearchBtn.addEventListener('click', () => {
                const query = headerSearchInput.value.trim();
                if (query) {
                    console.log('Searching for:', query);
                }
            });
        }
    }

    // Initialize hero search
    function initHeroSearch() {
        const heroSearchInput = document.getElementById('heroSearchInput');
        const heroSearchDropdown = document.getElementById('heroSearchDropdown');
        const heroSearchBtn = document.getElementById('heroSearchBtn');
        
        if (heroSearchInput && heroSearchDropdown) {
            heroSearchInput.addEventListener('input', () => {
                handleSearch(heroSearchInput, heroSearchDropdown);
            });
            
            heroSearchInput.addEventListener('focus', () => {
                if (heroSearchInput.value.trim()) {
                    heroSearchDropdown.style.display = 'block';
                }
            });
            
            heroSearchInput.addEventListener('blur', () => {
                setTimeout(() => {
                    heroSearchDropdown.style.display = 'none';
                }, 200);
            });
        }
        
        if (heroSearchBtn) {
            heroSearchBtn.addEventListener('click', () => {
                const query = heroSearchInput.value.trim();
                if (query) {
                    console.log('Searching for:', query);
                }
            });
        }
    }

    // Back to top functionality
    function initBackToTop() {
        const backToTopBtn = document.getElementById('backToTopBtn');
        
        if (backToTopBtn) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) {
                    backToTopBtn.classList.add('visible');
                } else {
                    backToTopBtn.classList.remove('visible');
                }
            });
            
            backToTopBtn.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
    }

    // Initialize all on DOM ready
    document.addEventListener('DOMContentLoaded', () => {
        // Add scroll listener
        window.addEventListener('scroll', handleHeaderScroll);
        handleHeaderScroll(); // Check initial state
        
        // Initialize search
        initHeaderSearch();
        initHeroSearch();
        initBackToTop();
    });
})();