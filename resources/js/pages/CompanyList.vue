<template>
    <div class="viewMainServer">
        <div>
            <div id="lay-fl" class="google-auto-placed">
                <div id="lay-fl-nav-left">
                    <a href="#" title="CallHelpDesk">
                        <img src="/images/fav-1.png" alt="callhelpdesk logo" width="120">
                    </a>
                    <div>
                        <nav role="navigation" class="left list-block">
                            <a href="#">Home</a>
                            <a href="#">Search Company Customer Service Information</a>
                            <a href="#">Companies A-Z</a>
                            <a href="#">About GetHuman</a>
                        </nav>
                    </div>
                    <small>&copy; GetHuman Inc.</small>
                </div>
                <div id="lay-fl-con">
                    <div id="lay-fl-nav-top">
                        <a id="top" title="GetHuman"></a>
                        <div id="nav-top-l">
                            <a href="#" title="Home"><svg xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 -48 512 544" class="home in-icon">
                                    <path d="M448 256L256 32 64 256h48v160h96V288h96v128h96V256z"></path>
                                </svg>
                            </a>
                        </div>
                        <div id="nav-top-r"><a href="#" title="Search Companies">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -48 512 544" class="search in-icon">
                                    <path d="M493 384L368 259c18-29 29-62 29-99 0-106-86-192-192-192S13 54 13 160s86 192 192 192c36 0 70-11 99-28l125 124c9 9 23 9 32 0l32-32c9-9 9-23 0-32zm-288-96c-71 0-128-57-128-128S134 32 205 32c70 0 128 57 128 128s-58 128-128 128z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div id="lay-fl-mandr">
                        <div id="lay-fl-main">

                            <div class="crumbs no-mob">
                                <div class="extremes">
                                    <div class="trunc">
                                        <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                                            <li itemprop="itemListElement" itemtype="http://schema.org/ListItem" itemscope="">
                                                <a itemprop="item" class="p-r" href="#">
                                                    <span itemprop="name">Phone Numbers & Contact Info</span>
                                                    <meta itemprop="position" content="1" />
                                                </a>
                                                <span>&nbsp;&rsaquo;&nbsp;</span>
                                            </li>
                                            <li itemprop="itemListElement" itemtype="http://schema.org/ListItem" itemscope="">
                                                <a itemprop="item" class="p-r" href="#">
                                                    <span itemprop="name">Starts with the letter {{ currentLetter.toUpperCase() }}</span>
                                                    <meta itemprop="position" content="2" />
                                                </a>
                                            </li>
                                        </ol>
                                    </div>
                                    <div class="small">
                                        Updated
                                        <time datetime="2025-11-13T15:10:39+00:00">November 13, 2025</time>
                                    </div>
                                </div>
                            </div>

                            <h1>Customer Service Information for Companies Starting with {{ currentLetter.toUpperCase() }} - Page {{ currentPage }} of {{ totalPages }}</h1>

                            <!-- Alphabet Navigation -->
                            <div class="alphabet-nav">
                                <div class="alphabet-container">
                                    <a v-for="letter in alphabet"
                                       :key="letter"
                                       :href="'/companies?letter=' + letter"
                                       :class="['alphabet-link', { 'active': letter === currentLetter }]">
                                        {{ letter.toUpperCase() }}
                                    </a>
                                </div>
                            </div>

                            <!-- Most Popular Companies Section -->
                            <div class="popular-companies">
                                <h3>Most Popular Letter {{ currentLetter.toUpperCase() }} Companies ({{ totalCompanies }} total)</h3>
                                <div class="companies-grid">
                                    <div v-for="company in paginatedCompanies"
                                         :key="company._id || company.id"
                                         class="company-card">
                                        <a :href="'/phone-number/' + encodeURIComponent(company.name.toLowerCase().replace(/\s+/g, '-'))" class="company-link">
                                            <div class="company-name">{{ company.name }}</div>
                                            <div class="company-description">Customer Service Phone Number and Contact Information</div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Pagination -->
                            <div v-if="totalPages > 1" class="pagination">
                                <div class="pagination-container">
                                    <a v-if="currentPage > 1"
                                       :href="'/companies?letter=' + currentLetter + '&page=' + (currentPage - 1)"
                                       class="pagination-link">
                                        ‹ Previous
                                    </a>

                                    <span v-for="page in visiblePages"
                                          :key="page"
                                          :class="['pagination-link', { 'active': page === currentPage }]"
                                          @click="page !== '...' ? goToPage(page) : null">
                                        {{ page }}
                                    </span>

                                    <a v-if="currentPage < totalPages"
                                       :href="'/companies?letter=' + currentLetter + '&page=' + (currentPage + 1)"
                                       class="pagination-link">
                                        Next ›
                                    </a>
                                </div>
                            </div>

                        </div>

                        <!-- Right Layout -->
                        <div id="lay-fl-right">
                            <!-- Live Agent Card -->
                            <div class="live-agent-card">
                                <img src="https://picsum.photos/90/90?random=8" alt="Live Agent">
                                <h2>Talk to a Live Agent</h2>
                                <p>Talk to a live expert get instant help with customer service.</p>
                                <a href="tel:1-800-123-4567" class="call-button">
                                    <i class="bi bi-telephone"></i> 1-800-123-4567
                                </a>
                            </div>

                            <div>
                                <div class="h4">Browse Companies</div>
                                <nav class="list-block mb-u" role="navigation">
                                    <a v-for="letter in alphabet"
                                       :key="'nav-' + letter"
                                       :href="'/companies?letter=' + letter">
                                        Companies Starting with {{ letter.toUpperCase() }}
                                    </a>
                                </nav>
                            </div>

                            <div>
                                <div class="h4">Call with our free super-powered phone</div>
                                <ul>
                                    <li>Can talk to customer service for you</li>
                                    <li>Can wait on hold for you</li>
                                    <li>Automatically re-schedules if they're closed</li>
                                    <li>Get a summary & transcript after</li>
                                    <li>Easy to re-try if needed</li>
                                    <li>Free and no account needed</li>
                                </ul>
                                <div class="mt-u"><a title="Call Customer Service"
                                        href="#"><span style="margin-left: 1.5rem;">Call Now</span></a>
                                </div>
                            </div>

                            <div class="sticky-top">
                                <img src="https://picsum.photos/600/800?random=9" alt="Random image"
                                    style="width: 100%; height: auto; border-radius: 8px; margin: 20px 0;">
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div id="lay-fl-bottom">
                        <div class="sec-below">
                            <div>
                                <div class="list-tiled"><b>Was this page helpful?</b><a href="#">Yes</a><a
                                        href="#">Needs
                                        work</a></div>
                                <div class="mb-100">Sharing is what powers GetHuman's free customer service contact
                                    information and tools. You can help!</div>
                                <div class="bar-share"><a class="btn-share-f" rel="noopener" target="_blank"
                                        href="http://www.facebook.com/sharer/sharer.php?m2w&amp;s=100&amp;p[url]=https%3A%2F%2Fgethuman.com%2Fcompanies&amp;p[title]=Customer%20Service%20Information%20%7C%20Companies%20Starting%20with%20A%20%7C%20Page%201">
                                        <div class="bg-icon facebook bg-icon-lg"
                                            style="background-image: url('/img/icon/white/facebook.svg')"
                                            title="Share with Facebook"></div>
                                    </a><a class="btn-share-t" rel="noopener" target="_blank"
                                        href="http://twitter.com/intent/tweet?text=Customer%20Service%20Information%20%7C%20Companies%20Starting%20with%20A%20%7C%20Page%201&amp;url=https%3A%2F%2Fgethuman.com%2Fcompanies">
                                        <div class="bg-icon twitter bg-icon-lg"
                                            style="background-image: url('/img/icon/white/twitter.svg')"
                                            title="Share via Twitter"></div>
                                    </a><a class="btn-share-e"
                                        href="mailto:?body=https%3A%2F%2Fgethuman.com%2Fcompanies&subject=Customer%20Service%20Information%20%7C%20Companies%20Starting%20with%20A%20%7C%20Page%201">
                                        <div class="bg-icon email bg-icon-lg"
                                            style="background-image: url('/img/icon/white/email.svg')"
                                            title="Share via Email"></div>
                                    </a></div>
                            </div>
                        </div>
                        <div class="crumbs">
                            <div>
                                <div>
                                    <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                                        <li itemprop="itemListElement" itemtype="http://schema.org/ListItem"
                                            itemscope=""><a itemprop="item" class="p-r" href="#"><span
                                                    itemprop="name">Phone Numbers & Contact Info</span>
                                                <meta itemprop="position" content="1" /></a><span>&nbsp;&rsaquo;&nbsp;</span></li>
                                        <li itemprop="itemListElement" itemtype="http://schema.org/ListItem"
                                            itemscope=""><a itemprop="item" class="p-r" href="#"><span
                                                    itemprop="name">Companies Starting with {{ currentLetter.toUpperCase() }}</span>
                                                <meta itemprop="position" content="2" /></a></li>
                                    </ol>
                                </div>
                                <div class="small">Updated <time datetime="2025-11-13T15:10:39+00:00">November 13,
                                        2025</time></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import '@/../css/company_detail.css'

export default {
    name: 'Companies',
    props: {
        companies: {
            type: Array,
            default: () => []
        },
        currentLetter: {
            type: String,
            default: 'a'
        },
        currentPage: {
            type: Number,
            default: 1
        },
        totalPages: {
            type: Number,
            default: 1
        },
        totalCompanies: {
            type: Number,
            default: 0
        },
        pagination: {
            type: Object,
            default: () => ({})
        }
    },
    data() {
        return {
            alphabet: 'abcdefghijklmnopqrstuvwxyz'.split(''),
            companiesPerPage: 20
        }
    },
    computed: {
        paginatedCompanies() {
            // Companies are already paginated from server
            return this.companies;
        },
        visiblePages() {
            const pages = [];
            const total = this.totalPages;
            const current = this.currentPage;

            if (total <= 7) {
                for (let i = 1; i <= total; i++) {
                    pages.push(i);
                }
            } else {
                if (current <= 4) {
                    pages.push(1, 2, 3, 4, 5, '...', total);
                } else if (current >= total - 3) {
                    pages.push(1, '...', total - 4, total - 3, total - 2, total - 1, total);
                } else {
                    pages.push(1, '...', current - 1, current, current + 1, '...', total);
                }
            }

            return pages;
        }
    },
    methods: {
        setCurrentLetter(letter) {
            // Navigate to new letter using Inertia
            this.$inertia.visit('/companies', {
                data: { letter: letter, page: 1 },
                preserveState: false,
                preserveScroll: false
            });
        },
        goToPage(page) {
            if (page >= 1 && page <= this.totalPages) {
                // Navigate to new page using Inertia
                this.$inertia.visit('/companies', {
                    data: { letter: this.currentLetter, page: page },
                    preserveState: false,
                    preserveScroll: false
                });
            }
        }
    }
};
</script>

<style>
/* Import existing styles from Company.vue */
.rich-content p img,
.rich-content div img,
.rich-content figure img,
.rich-content span img,
.rich-content img {
    width: 100% !important;
}

/* Navigation link colors */
#lay-fl-nav-left a {
    color: white !important;
    opacity: 1 !important;
}

#lay-fl-nav-left a:hover {
    color: #f0f0f0 !important;
}

/* Sticky right sidebar */
.sticky-top {
    position: sticky;
    top: 20px;
    height: fit-content;
}

/* Live Agent Card */
.live-agent-card {
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 100%;
    padding: 24px;
    margin: 20px 0;
}

.live-agent-card img {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 16px;
    border: 3px solid #1565ff;
}

.live-agent-card h2 {
    font-size: 20px;
    font-weight: 600;
    color: #0d2b66;
    margin-bottom: 8px;
}

.live-agent-card p {
    font-size: 14px;
    color: #555;
    line-height: 1.5;
    margin-bottom: 20px;
}

.call-button {
    display: inline-block;
    background-color: #1565ff;
    color: #fff;
    text-decoration: none;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    transition: background-color 0.3s ease;
}

.call-button:hover {
    background-color: #0e4ad4;
}

/* Ringing animation for telephone icon */
.call-button .bi-telephone {
    animation: ring 1s infinite;
    display: inline-block;
    margin-right: 5px;
}

@keyframes ring {
    0% { transform: rotate(0deg); }
    10% { transform: rotate(5deg); }
    20% { transform: rotate(-5deg); }
    30% { transform: rotate(5deg); }
    40% { transform: rotate(-5deg); }
    50% { transform: rotate(0deg); }
    100% { transform: rotate(0deg); }
}

/* Alphabet Navigation */
.alphabet-nav {
    background-color: #f8f9fa;
    border-radius: 8px;
    padding: 20px;
    margin: 20px 0;
    text-align: center;
}

.alphabet-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 8px;
}

.alphabet-link {
    display: inline-block;
    width: 32px;
    height: 32px;
    line-height: 32px;
    text-align: center;
    text-decoration: none;
    color: #1565ff;
    background-color: #ffffff;
    border: 1px solid #e9ecef;
    border-radius: 4px;
    font-weight: 600;
    transition: all 0.2s ease;
}

.alphabet-link:hover {
    background-color: #1565ff;
    color: #ffffff;
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(21, 101, 255, 0.2);
}

.alphabet-link.active {
    background-color: #1565ff;
    color: #ffffff;
    box-shadow: 0 2px 4px rgba(21, 101, 255, 0.3);
}

/* Info Section */
.info-section {
    background-color: #ffffff;
    border-radius: 8px;
    padding: 24px;
    margin: 20px 0;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.info-section h2 {
    color: #0d2b66;
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 16px;
}

.info-section p {
    color: #555;
    line-height: 1.6;
    font-size: 16px;
}

/* Popular Companies */
.popular-companies h3 {
    color: #0d2b66;
    font-size: 20px;
    font-weight: 600;
    margin: 24px 0 16px 0;
}

.companies-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 16px;
    margin: 20px 0;
}

.company-card {
    background-color: #ffffff;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 16px;
    transition: all 0.2s ease;
}

.company-card:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transform: translateY(-2px);
}

.company-link {
    text-decoration: none;
    color: inherit;
}

.company-name {
    font-size: 16px;
    font-weight: 600;
    color: #1565ff;
    margin-bottom: 4px;
    line-height: 1.4;
}

.company-name:hover {
    color: #0e4ad4;
}

.company-description {
    font-size: 14px;
    color: #666;
    line-height: 1.4;
}

/* Pagination */
.pagination {
    margin: 40px 0;
    text-align: center;
}

.pagination-container {
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.pagination-link {
    display: inline-block;
    padding: 8px 12px;
    text-decoration: none;
    color: #1565ff;
    background-color: #ffffff;
    border: 1px solid #e9ecef;
    border-radius: 4px;
    font-weight: 500;
    transition: all 0.2s ease;
    min-width: 40px;
    text-align: center;
}

.pagination-link:hover {
    background-color: #f8f9fa;
    color: #0e4ad4;
}

.pagination-link.active {
    background-color: #1565ff;
    color: #ffffff;
    border-color: #1565ff;
}

/* Responsive Design */
@media (max-width: 768px) {
    .companies-grid {
        grid-template-columns: 1fr;
    }

    .alphabet-container {
        gap: 4px;
    }

    .alphabet-link {
        width: 28px;
        height: 28px;
        line-height: 28px;
        font-size: 14px;
    }

    .company-card {
        padding: 12px;
    }
}
</style>