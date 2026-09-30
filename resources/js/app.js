import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';


// Recover automatically when a new deployment replaces Vite's hashed chunks
// while a visitor still has an older SPA shell open. Without this, Inertia
// navigation can appear completely unresponsive until the browser is refreshed.
if (typeof window !== 'undefined') {
    window.addEventListener('vite:preloadError', (event) => {
        event.preventDefault();

        const key = 'awqaf-vite-reload-at';
        const lastReload = Number(sessionStorage.getItem(key) || 0);
        const now = Date.now();

        // Guard against reload loops if the origin itself is unavailable.
        if (now - lastReload > 10000) {
            sessionStorage.setItem(key, String(now));
            window.location.reload();
        }
    });
}

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
