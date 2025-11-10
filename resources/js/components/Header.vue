<!-- make header component -->
<template>
    <header id="header">
        <div class="container header-container">
            <a href="#" class="logo">
                <div class="logo-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <div class="logo-text">Elevate<span>Support</span></div>
            </a>

            <!-- Search bar -->
             

        </div>
    </header>
</template>

<script>
    export default {
        name: 'Header'
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

.search-bar {
    display: flex;
    align-items: center;
    gap: 10px;
    max-width: 400px;
    flex: 1;
    margin: 0 20px;
}

.search-wrapper {
    flex: 1;
    position: relative;
}

.search-input {
    width: 100%;
    padding: 8px 16px;
    border: 2px solid #e1e5e9;
    border-radius: 25px;
    font-size: 14px;
    outline: none;
    transition: all 0.3s ease;
    background-color: white;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.search-input:focus {
    border-color: var(--primary);
    box-shadow: 0 4px 15px rgba(67, 97, 238, 0.2);
}

.search-input::placeholder {
    color: var(--gray);
    font-weight: 400;
}

.search-btn {
    padding: 8px 16px;
    border: 2px solid var(--primary);
    border-radius: 25px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 40px;
}

.search-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(67, 97, 238, 0.4);
}

.search-btn i {
    font-size: 14px;
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
    .search-bar {
        margin: 0 10px;
        max-width: 250px;
    }
    
    .search-input {
        padding: 6px 12px;
        font-size: 13px;
    }
    
    .search-btn {
        padding: 6px 12px;
        min-width: 35px;
    }
    
    .search-dropdown {
        border-radius: 10px;
    }
    
    .search-item {
        padding: 10px 12px;
    }
}
</style>
