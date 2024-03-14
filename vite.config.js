import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({

    plugins: [
        laravel({
            input: [
                'resources/sass/main-backoffice.scss',
                'resources/sass/main-public.scss',
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
            watch: ['resources/**/*.scss'],
        }),
    ],
});
