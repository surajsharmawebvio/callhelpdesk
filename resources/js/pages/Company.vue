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
                                                    <span itemprop="name">All Companies</span>
                                                    <meta itemprop="position" content="1" />
                                                </a>
                                                <span>&nbsp;&rsaquo;&nbsp;</span>
                                            </li>
                                            <li itemprop="itemListElement" itemtype="http://schema.org/ListItem" itemscope="">
                                                <a itemprop="item" class="p-r" href="ACN.html">
                                                    <span itemprop="name">{{ company.name }}</span>
                                                    <meta itemprop="position" content="2" />
                                                </a>
                                            </li>
                                        </ol>
                                    </div>
                                    <div class="small">
                                        Updated
                                        <time datetime="2025-10-31T15:10:39+00:00">October 31, 2025</time>
                                    </div>
                                </div>
                            </div>

                            <h1>{{ company.name }}</h1>
                            <h2>Phone Number & Contact Info</h2><a id="contact"></a>
                            <div class="card stk top">
                                <div>
                                    <div>
                                        <h3>{{ company.name }} Best Phone Number</h3><a class="link-jumbo und"
                                            style="padding: 0.2rem 1px"
                                            title="{{ company.name }}'s best customer service phone number is 877-226-1010"
                                            href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -48 512 544" class="phone in-icon">
                                                <path
                                                    d="M457 322c0 5-1 12-3 20-2 9-4 15-6 20-4 10-15 20-35 30-17 10-35 15-53 15-5 0-10 0-15-1s-10-2-16-4c-6-1-11-3-14-4s-8-3-16-6c-7-3-12-4-14-5-18-7-35-14-50-24-24-15-49-35-75-61s-47-51-62-76c-9-14-17-31-23-50-1-1-3-6-6-14-2-7-4-13-5-16s-3-7-5-13c-1-6-2-12-3-17-1-4-1-9-1-15 0-17 5-35 14-53 11-19 21-31 31-35 4-2 11-4 19-6 9-1 15-2 20-2h6c4 2 9 9 16 22 2 4 5 9 8 16 4 6 7 12 10 18l9 15c1 1 2 3 5 7s5 8 6 10c1 3 2 6 2 8 0 4-3 9-8 15-5 5-11 11-18 15-6 5-12 10-17 16-6 5-9 9-9 13 0 1 1 4 2 6 1 3 2 5 2 6 1 1 2 4 4 7s3 5 4 5c14 26 31 49 49 67 19 19 41 36 67 50 1 0 3 1 6 3s5 4 7 4c1 1 3 2 6 3 2 1 4 1 6 1 3 0 8-2 13-8 5-5 11-11 15-18 5-6 10-12 16-17 6-6 10-8 14-8 3 0 6 0 8 2 3 1 7 3 11 6 4 2 6 4 7 5 4 3 10 6 15 9s11 6 18 10c7 3 12 6 16 8 13 7 20 12 21 15 1 2 1 4 1 6z">
                                                </path>
                                            </svg><span>{{ company.phone }}</span></a>
                                        <div class="ul-pad tile-right" style="margin-bottom: 0" v-html="company.ulpad">
                                            
                                        </div>

                                        <div><b>Free tools for easier calling</b></div>
                                        <div class="ul-pad tile-right">
                                            <a style="margin-right: 1.5rem" class="und" href="#">
                                                We talk to them for you
                                            </a>
                                            <a style="margin-right: 1.5rem" class="und" href="#">
                                                Skip waiting on hold
                                            </a>
                                            <a style="margin-right: 1.5rem" class="und" href="#">
                                                Schedule a call
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ Section -->
                            <div class="card bot">
                                <div v-for="(question, index) in company.questions" :key="question._id || index">
                                    <div class="ul-pad text-sembld"><span class="bul">Q:</span>
                                        <h3>{{ question.question }}</h3>
                                    </div>
                                    <div class="ul-pad mt-r"><span class="bul">A:</span><span v-html="question.answer"></span></div>
                                </div>
                                <div v-if="!company.questions || company.questions.length === 0">
                                    <div class="ul-pad text-sembld"><span class="bul">Q:</span>
                                        <h3>How do I talk to a live human at {{ company.name }}?</h3>
                                    </div>
                                    <div class="ul-pad mt-r"><span class="bul">A:</span><span>Our free phone can help you navigate phone menus to get a live human for you.</span></div>
                                </div>
                            </div>

                            <div>
                                <img src="https://picsum.photos/600/200?random=2" alt="Random image"
                                    style="width: 100%; height: 200px; border-radius: 8px; margin: 20px 0;">
                            </div>

                            <div><a name="phone-numbers"></a>
                                <h2>{{ company.name }} Customer Phone Numbers</h2>
                                <div class="list-block mb-u">
                                    <div class="list-block">
                                        <h3 class="min">Technical Support</h3><a class="link-med trunc und"
                                            style="margin-bottom: 0" href="#"
                                            title="ACN's Technical Support phone number"><svg
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 -48 512 544"
                                                class="phone in-icon">
                                                <path
                                                    d="M457 322c0 5-1 12-3 20-2 9-4 15-6 20-4 10-15 20-35 30-17 10-35 15-53 15-5 0-10 0-15-1s-10-2-16-4c-6-1-11-3-14-4s-8-3-16-6c-7-3-12-4-14-5-18-7-35-14-50-24-24-15-49-35-75-61s-47-51-62-76c-9-14-17-31-23-50-1-1-3-6-6-14-2-7-4-13-5-16s-3-7-5-13c-1-6-2-12-3-17-1-4-1-9-1-15 0-17 5-35 14-53 11-19 21-31 31-35 4-2 11-4 19-6 9-1 15-2 20-2h6c4 2 9 9 16 22 2 4 5 9 8 16 4 6 7 12 10 18l9 15c1 1 2 3 5 7s5 8 6 10c1 3 2 6 2 8 0 4-3 9-8 15-5 5-11 11-18 15-6 5-12 10-17 16-6 5-9 9-9 13 0 1 1 4 2 6 1 3 2 5 2 6 1 1 2 4 4 7s3 5 4 5c14 26 31 49 49 67 19 19 41 36 67 50 1 0 3 1 6 3s5 4 7 4c1 1 3 2 6 3 2 1 4 1 6 1 3 0 8-2 13-8 5-5 11-11 15-18 5-6 10-12 16-17 6-6 10-8 14-8 3 0 6 0 8 2 3 1 7 3 11 6 4 2 6 4 7 5 4 3 10 6 15 9s11 6 18 10c7 3 12 6 16 8 13 7 20 12 21 15 1 2 1 4 1 6z">
                                                </path>
                                            </svg><span>{{ company.phone }}</span></a>
                                        <div style="margin-bottom: 0"><span>Toll-free</span><span class="sep"> &middot;
                                            </span><span>24 hours, 7 days</span><span class="sep"> &middot;
                                            </span><span>Press 1 then 2 then 4 then enter the phone number associated
                                                with your account</span><span class="sep"> &middot; </span><em>Flash
                                                Services - not in English.</em><span class="sep"> &middot;
                                            </span><span>Free tools available: Talk for me, Skip the wait, Schedule my
                                                call</span></div>
                                        <div><a href="ACN/tech-support/_22212.html">More details</a></div>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <img src="https://picsum.photos/600/200?random=3" alt="Random image"
                                            style="width: 100%; height: 200px; border-radius: 8px; margin: 20px 0;">
                                    </div>
                                </div>
                            </div>

                            <div class="rich-content" v-html="processedContent"></div>

                        </div>

                        <!-- Right Layout -->
                        <div id="lay-fl-right">
                            <!-- right add -->
                            <div class="live-agent-card">
                                <img src="https://picsum.photos/90/90?random=8" alt="Live Agent">
                                <h2>Talk to a Live Agent</h2>
                                <p>Talk to a live expert get instant help with {{ company.name }} customer service.</p>
                                <a :href="'tel:' + company.phone" class="call-button">
                                    <i class="bi bi-telephone"></i> {{ company.phone }}
                                </a>
                            </div>

                            <div>
                                <div class="h4">What's on this page</div>
                                <nav class="list-block mb-u" role="navigation">
                                    <a v-for="(heading, index) in extractedHeadings" :key="index" :href="'#' + heading.toLowerCase().replace(/\s+/g, '-').replace(/[^\w-]/g, '')" @click="scrollToHeading(heading, $event)">
                                        {{ heading }}
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
                                <div class="mt-u"><a title="Call ACN Customer Service phone number 877-226-1010"
                                        href="#"><span style="margin-left: 1.5rem;">Call {{ company.phone }} Now</span></a>
                                </div>
                            </div>
                            <h3 class="min" style="margin-bottom: 0.67rem">Compare ACN Customer Service</h3>
                            <div class="list-block"><a href="AirBnB.html">AirBnB Customer Service</a><a
                                    href="Capital-One.html">Capital One Customer Service</a><a
                                    href="Comcast.html">Comcast Customer Service</a></div>
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
                                        href="http://www.facebook.com/sharer/sharer.php?m2w&amp;s=100&amp;p[url]=https%3A%2F%2Fgethuman.com%2Fphone-number%2FACN&amp;p[title]=ACN%20Customer%20Service%20Phone%20Number%20877-226-1010%3A%20Call%20Support">
                                        <div class="bg-icon facebook bg-icon-lg"
                                            style="background-image: url('/img/icon/white/facebook.svg')"
                                            title="Share with Facebook"></div>
                                    </a><a class="btn-share-t" rel="noopener" target="_blank"
                                        href="http://twitter.com/intent/tweet?text=ACN%20Customer%20Service%20Phone%20Number%20877-226-1010%3A%20Call%20Support&amp;url=https%3A%2F%2Fgethuman.com%2Fphone-number%2FACN">
                                        <div class="bg-icon twitter bg-icon-lg"
                                            style="background-image: url('/img/icon/white/twitter.svg')"
                                            title="Share via Twitter"></div>
                                    </a><a class="btn-share-e"
                                        href="mailto:?body=https%3A%2F%2Fgethuman.com%2Fphone-number%2FACN&subject=ACN%20Customer%20Service%20Phone%20Number%20877-226-1010%3A%20Call%20Support">
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
                                                    itemprop="name">All Companies</span>
                                                <meta itemprop="position" content="1" />
                                            </a><span>&nbsp;&rsaquo;&nbsp;</span></li>
                                        <li itemprop="itemListElement" itemtype="http://schema.org/ListItem"
                                            itemscope=""><a itemprop="item" class="p-r" href="ACN.html"><span
                                                    itemprop="name">ACN Customer Service</span>
                                                <meta itemprop="position" content="2" /></a></li>
                                    </ol>
                                </div>
                                <div class="small">Updated <time datetime="2025-10-31T15:10:39+00:00">October 31,
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
    // import DefaultLayout from '@/Layouts/DefaultLayout.vue';
    import '@/../css/company_detail.css'
    import company from '@/routes/company';
    import { computed } from 'vue';

    export default {
        // layout: DefaultLayout,
        props: {
            company: Object,
        },
        computed: {
            processedContent() {
                const parser = new DOMParser();
                const doc = parser.parseFromString(this.company.content, 'text/html');
                const headings = doc.querySelectorAll('h2');
                headings.forEach(h2 => {
                    const id = h2.textContent.trim().toLowerCase().replace(/\s+/g, '-').replace(/[^\w-]/g, '');
                    h2.id = id;
                });
                return doc.body.innerHTML;
            },
            extractedHeadings() {
                const parser = new DOMParser();
                const doc = parser.parseFromString(this.company.content, 'text/html');
                return Array.from(doc.querySelectorAll('h2')).map(h2 => h2.textContent.trim());
            }
        },
        methods: {
            isDesktop() {
                return window.innerWidth >= 768;
            },
            scrollToHeading(heading, event) {
                if (this.isDesktop()) {
                    event.preventDefault();
                    const targetId = heading.toLowerCase().replace(/\s+/g, '-').replace(/[^\w-]/g, '');
                    const targetElement = document.getElementById(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({ behavior: 'smooth' });
                    }
                }
            }
        }
    };

</script>
<style>
.rich-content p img,
.rich-content div img,
.rich-content figure img,
.rich-content span img,
.rich-content img {
    width: 100% !important;
}

/* .rich-content img:hover { */
    /* transform: scale(1.02) !important; */
    /* box-shadow: 0 8px 16px -2px rgba(0, 0, 0, 0.15) !important; */
/* } */

/* Rich content typography */
.rich-content p {
    margin-bottom: 1rem !important;
    line-height: 1.6 !important;
}

.rich-content h1,
.rich-content h2,
.rich-content h3,
.rich-content h4,
.rich-content h5,
.rich-content h6 {
    margin-top: 1.5rem !important;
    margin-bottom: 0.75rem !important;
    font-weight: 600 !important;
}

.rich-content ul,
.rich-content ol {
    margin-left: 1.5rem !important;
    margin-bottom: 1rem !important;
}

.rich-content a {
    color: var(--primary, #4361ee) !important;
    text-decoration: none !important;
}

.rich-content a:hover {
    text-decoration: underline !important;
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
</style>
