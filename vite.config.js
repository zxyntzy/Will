import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        watch: {
            usePolling: true,
            interval: 1000
        }
    },
    // vite.config.js
  build: {
    outDir: 'dist', // Pastikan ini mengarah ke 'dist'
  }

});

