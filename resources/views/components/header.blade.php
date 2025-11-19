<header id="header">
    <div class="container header-container">
        <a href="{{ route('home') }}" class="logo">
            <img src="/images/logo-2.png" alt="callhelpdesk logo" width="220">
        </a>

        <!-- Search bar that appears on scroll -->
        <div class="search-bar" id="headerSearchBar">
            <div class="search-wrapper">
                <input 
                    type="text" 
                    class="search-input" 
                    placeholder="Search for a company or service..." 
                    id="headerSearchInput"
                >
                <div class="search-dropdown" id="headerSearchDropdown" style="display: none;">
                    <!-- Search results will be dynamically inserted here -->
                </div>
            </div>
            <button class="search-btn btn btn-primary" id="headerSearchBtn">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</header>

<style>
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

/* Search Bar Styles */
.search-bar {
    display: flex;
    gap: 10px;
    align-items: center;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.3s ease;
}

.search-bar.visible {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.search-wrapper {
    position: relative;
    width: 400px;
}

.search-input {
    width: 100%;
    padding: 12px 20px;
    border: 2px solid #e0e0e0;
    border-radius: 25px;
    font-size: 14px;
    outline: none;
    transition: all 0.3s ease;
}

.search-input:focus {
    border-color: var(--primary);
}

.search-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    margin-top: 5px;
    max-height: 400px;
    overflow-y: auto;
    z-index: 1001;
}

.search-item {
    padding: 12px 20px;
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
    font-size: 13px;
    color: #666;
}

.search-item.no-results,
.search-item.loading {
    text-align: center;
    color: #666;
}

.search-item {
    padding: 12px 20px;
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

.company-name {
    font-weight: 600;
    color: #333;
    margin-bottom: 4px;
}

.company-category {
    font-size: 13px;
    color: #666;
}

.search-item.no-results,
.search-item.loading {
    text-align: center;
    color: #666;
}

.search-btn {
    padding: 12px 24px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.search-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
}

@media (max-width: 768px) {
    .search-wrapper {
        width: 250px;
    }
    
    .search-input {
        font-size: 13px;
        padding: 10px 16px;
    }
    
    .search-btn {
        padding: 10px 20px;
        font-size: 13px;
    }
}
</style>
