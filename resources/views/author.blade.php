@extends('layouts.app')

@section('content')
@include('components.header')

<!-- Hero Section -->
<section class="hero">
    <div class="hero-container">
        <div class="hero-content">
            <h1>About the Author</h1>
            <p>Learn more about the creator behind CallHelpDesk</p>
        </div>
    </div>
</section>

<!-- Authors Section -->
<section class="authors-section">
    <div class="container">
        <h2>Meet Our Team</h2>
        <div class="authors-grid">
            @forelse($authors as $author)
            <div class="author-card" id="{{ \Illuminate\Support\Str::slug($author->name) }}">
                <div class="author-image">
                    @if($author->profile_image)
                        <img src="{{ asset('storage/' . $author->profile_image) }}" alt="{{ $author->name }}" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($author->name) }}&size=250&background=4361ee&color=ffffff'">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($author->name) }}&size=250&background=4361ee&color=ffffff" alt="{{ $author->name }}">
                    @endif
                </div>
                <div class="author-content">
                    <h3>{{ $author->name }}</h3>
                    <p class="author-role">{{ $author->designation }}</p>
                    <p>{{ $author->bio }}</p>
                    <div class="author-social">
                        @if($author->linkedin_url)
                            <a href="{{ $author->linkedin_url }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin"></i></a>
                        @endif
                        @if($author->twitter_url)
                            <a href="{{ $author->twitter_url }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if($author->github_url)
                            <a href="{{ $author->github_url }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-github"></i></a>
                        @endif
                        @if($author->website_url)
                            <a href="{{ $author->website_url }}" target="_blank" rel="noopener noreferrer"><i class="fas fa-globe"></i></a>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div style="text-align: center; padding: 3rem;">
                <p style="color: var(--text-muted); font-size: 1.1rem;">No authors found. Please add authors from the admin panel.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@include('components.footer')

<style scoped>
/* Hero Section */
.hero {
    padding-top: 80px;
    padding-bottom: 80px !important;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
    min-height: 50vh;
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

/* Authors Section */
.authors-section {
    padding: 4rem 0;
    background: white;
}

.authors-section h2 {
    text-align: center;
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 3rem;
    color: var(--dark);
}

.authors-grid {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.author-card {
    background: var(--light-bg);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    display: flex;
    flex-direction: row;
    align-items: stretch;
}

.author-card:hover {
    transform: translateY(-5px);
}

.author-card .author-image {
    flex-shrink: 0;
    width: 250px;
}

.author-card .author-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.author-card .author-content {
    padding: 2rem;
    text-align: left;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.author-card h3 {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    color: var(--dark);
}

.author-card .author-role {
    font-size: 1rem;
    color: var(--primary);
    font-weight: 600;
    margin-bottom: 1rem;
}

.author-card p {
    font-size: 1rem;
    line-height: 1.6;
    margin-bottom: 1.5rem;
    color: var(--text-muted);
}

.author-card .author-social {
    display: flex;
    gap: 0.5rem;
    justify-content: flex-start;
    margin-top: 1rem;
}

.author-card .author-social a {
    width: 40px;
    height: 40px;
    background: var(--primary);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    transition: all 0.3s ease;
    text-decoration: none;
}

.author-card .author-social a:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
}

/* Responsive Design */
@media (max-width: 768px) {
    .author-card {
        flex-direction: column;
    }

    .author-card .author-image {
        width: 100%;
        height: 200px;
    }

    .author-card .author-content {
        text-align: center;
    }

    .author-card .author-social {
        justify-content: center;
    }

    .hero-content h1 {
        font-size: 2.5rem;
    }
}

@media (max-width: 480px) {
    .hero {
        padding-top: 70px;
        min-height: 40vh;
    }

    .hero-content h1 {
        font-size: 2rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll to author based on URL hash
    const hash = window.location.hash;
    if (hash) {
        const targetElement = document.querySelector(hash);
        if (targetElement) {
            setTimeout(() => {
                // Calculate header height to offset scroll position
                const header = document.getElementById('header') || document.querySelector('header');
                const headerHeight = header ? header.offsetHeight : 80;
                
                // Get viewport height and element height to calculate center position
                const viewportHeight = window.innerHeight;
                const elementHeight = targetElement.offsetHeight;
                
                // Calculate position to center the element
                const elementPosition = targetElement.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - (viewportHeight / 2) + (elementHeight / 2);
                
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
                
                // Add highlight effect
                targetElement.style.transition = 'all 0.5s ease';
                targetElement.style.transform = 'scale(1.02)';
                targetElement.style.boxShadow = '0 15px 40px rgba(67, 97, 238, 0.25)';
                
                setTimeout(() => {
                    targetElement.style.transform = 'scale(1)';
                    targetElement.style.boxShadow = '';
                }, 1000);
            }, 100); // Small delay to ensure page is fully loaded
        }
    }
});
</script>
@endsection