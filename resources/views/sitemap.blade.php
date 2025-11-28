@extends('layouts.app')

@section('content')
@include('components.header')

<div class="page-container">
    <div class="container">
        <div class="page-header">
            <h1>Sitemap</h1>
            <p>Find all the important pages and companies on CallHelpDesk</p>
        </div>

        <div class="sitemap-content">
            <!-- Main Pages Section -->
            <div class="sitemap-section">
                <h2>Main Pages</h2>
                <div class="row">
                    <div class="col-4 sitemap-item"><a href="{{ route('home') }}">Home</a></div>
                    <div class="col-4 sitemap-item"><a href="{{ route('companies.index') }}">All Companies</a></div>
                    <div class="col-4 sitemap-item"><a href="{{ route('about-us') }}">About Us</a></div>
                    <div class="col-4 sitemap-item"><a href="{{ route('contact-us') }}">Contact Us</a></div>
                    <div class="col-4 sitemap-item"><a href="{{ route('privacy-policy') }}">Privacy Policy</a></div>
                    <div class="col-4 sitemap-item"><a href="{{ route('terms-and-conditions') }}">Terms and Conditions</a></div>
                </div>
            </div>

            <!-- Companies Section -->
            @if($companies->count() > 0)
            <div class="sitemap-section">
                <h2>Companies</h2>
                <div class="row" id="companies-container">
                    @foreach($companies as $company)
                    <div class="col-4 sitemap-item">
                        <a href="{{ $company->url }}">{{ $company->name }}</a>
                    </div>
                    @endforeach
                </div>
                <div id="loading-spinner" style="display: none; text-align: center; padding: 20px;">
                    <div class="spinner"></div>
                    <p>Loading more companies...</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@include('components.footer')

<style>
.page-container {
    min-height: calc(100vh - 200px);
    padding: 100px 0 80px;
    background-color: #f8f9fa;
}

.page-header {
    text-align: center;
    margin-bottom: 60px;
}

.page-header h1 {
    font-size: 48px;
    font-weight: 700;
    color: #333;
    margin-bottom: 15px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.page-header p {
    font-size: 18px;
    color: #666;
    max-width: 600px;
    margin: 0 auto;
}

.sitemap-content {
    max-width: 1200px;
    margin: 0 auto;
}

.sitemap-section {
    background: white;
    padding: 40px;
    margin-bottom: 30px;
    border-radius: 16px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

.sitemap-section h2 {
    font-size: 32px;
    font-weight: 700;
    color: #333;
    margin-bottom: 30px;
    padding-bottom: 15px;
    border-bottom: 3px solid var(--primary);
}

.sitemap-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sitemap-list li {
    padding: 10px 0;
    border-bottom: 1px solid #f0f0f0;
}

.sitemap-list li:last-child {
    border-bottom: none;
}

.sitemap-section a {
    color: #333;
    text-decoration: none;
    font-size: 16px;
    transition: color 0.3s ease, padding-left 0.3s ease;
    display: inline-block;
}

.sitemap-section a:hover {
    color: var(--primary);
    padding-left: 10px;
}

.sitemap-item {
    padding: 10px 0;
    border-bottom: 1px solid #f0f0f0;
}

.sitemap-item:last-child {
    border-bottom: none;
}

.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 25px;
    margin-top: 20px;
}

.category-box {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 12px;
    border: 2px solid #e9ecef;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.category-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.category-box h3 {
    font-size: 22px;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 15px;
}

.category-box .sitemap-list li {
    padding: 8px 0;
    font-size: 15px;
    color: #666;
}

.letter-group {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 12px;
}

.letter-heading {
    font-size: 28px;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 2px solid var(--primary);
}

.letter-group .sitemap-list li {
    padding: 8px 0;
    font-size: 15px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .page-container {
        padding: 80px 0 60px;
    }

    .page-header h1 {
        font-size: 36px;
    }

    .page-header p {
        font-size: 16px;
    }

    .sitemap-section {
        padding: 30px 20px;
    }

    .sitemap-section h2 {
        font-size: 26px;
    }

    .categories-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .category-box {
        padding: 20px;
    }

    .category-box h3 {
        font-size: 20px;
    }

    .letter-heading {
        font-size: 24px;
    }
}

@media (max-width: 480px) {
    .page-header h1 {
        font-size: 28px;
    }

    .sitemap-section {
        padding: 25px 15px;
    }

    .sitemap-section h2 {
        font-size: 22px;
    }
}

/* Loading Spinner */
.spinner {
    border: 4px solid #f3f3f3;
    border-top: 4px solid var(--primary);
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
    margin: 0 auto 10px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>

<script>
let currentPage = 4;
let hasMore = {{ $companies->hasMorePages() ? 'true' : 'false' }};
let isLoading = false;

function loadMoreCompanies() {
    if (isLoading || !hasMore) return;
    
    isLoading = true;
    document.getElementById('loading-spinner').style.display = 'block';
    
    fetch(`{{ route('sitemap') }}?page=${currentPage + 1}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        const container = document.getElementById('companies-container');
        
        Object.keys(data.companies).forEach(letter => {
            data.companies[letter].forEach(company => {
                const companyDiv = document.createElement('div');
                companyDiv.className = 'col-4 sitemap-item';
                companyDiv.innerHTML = `<a href="${company.url}">${company.name}</a>`;
                container.appendChild(companyDiv);
            });
        });
        
        hasMore = data.has_more;
        currentPage = data.next_page;
        isLoading = false;
        document.getElementById('loading-spinner').style.display = 'none';
    })
    .catch(error => {
        console.error('Error loading companies:', error);
        isLoading = false;
        document.getElementById('loading-spinner').style.display = 'none';
    });
}

// Infinite scroll detection
window.addEventListener('scroll', () => {
    const scrollPosition = window.innerHeight + window.scrollY;
    const pageHeight = document.documentElement.scrollHeight;
    
    // Load more when user is 200px from bottom
    if (scrollPosition >= pageHeight - 500) {
        loadMoreCompanies();
    }
});
</script>
@endsection
