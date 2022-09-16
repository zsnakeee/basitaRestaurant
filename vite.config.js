import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/vendors.css', 'resources/js/vendors.js'],
            refresh: true,
        }),
    ],
});
