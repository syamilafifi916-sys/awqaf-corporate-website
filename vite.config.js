import { fileURLToPath, URL } from 'node:url';
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            // Shared Tera Wakaf design-system source — same physical file
            // consumed by both awqaf-member-portal and awqaf-holdings-website.
            // See ../awqaf-design-system/README.md for the visual contract.
            '@awqaf-design-system': fileURLToPath(new URL('../awqaf-design-system', import.meta.url)),
        },
    },
});
