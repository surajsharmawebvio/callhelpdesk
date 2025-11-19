import '../css/app.css';
import 'bootstrap';
import AOS from 'aos';
import Swiper from 'swiper/bundle';
import 'swiper/css';
import GLightbox from 'glightbox/dist/js/glightbox.js';
import '@fortawesome/fontawesome-free/js/all.min.js';

// Extend window interface for libraries
declare global {
    interface Window {
        GLightbox: any;
        Swiper: any;
        AOS: any;
    }
}

// Make libraries globally available
window.GLightbox = GLightbox;
window.Swiper = Swiper;
window.AOS = AOS;

// Initialize AOS
AOS.init();
