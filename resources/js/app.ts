import '../css/app.css';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import type { DefineComponent } from 'vue';
import { createApp, h } from 'vue';
import 'bootstrap';
import AOS from 'aos';
import Swiper from 'swiper/bundle';
import 'swiper/css';
import GLightbox from 'glightbox/dist/js/glightbox.js';

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

// Import main.js after GLightbox is set up
import './main.js';
import '@fortawesome/fontawesome-free/js/all.min.js';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),
    resolve: (name) => resolvePageComponent(`./pages/${name}.vue`, import.meta.glob<DefineComponent>('./pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
