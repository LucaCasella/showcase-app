import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';


export default defineConfig({
    server: {
        host: '127.0.0.1',

    },
    plugins: [
        react(),
        laravel({
            input: [
                'resources/js/app.js',
                'resources/css/app.css',
                'resources/sass/main-backoffice.scss',
                'resources/sass/main-public.scss',
                'resources/js/react/react-app.jsx',
            ],
            refresh: true,
            watch: ['resources/**/*.scss'],
        }),

    ],
});
