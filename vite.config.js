import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: [
              'resources/css/app.css',
                'resources/js/app.js',      // Laravel JS global
                'resources/js/App.jsx'      // Point d'entrée React
            ],
            refresh: true,
        }),
        react(),
    ],
});
