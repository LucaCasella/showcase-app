import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/backoffice.scss',
                'resources/sass/public.scss',
                'resources/css/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
            watch: ['resources/**/*.scss'],
        }),
    ],
});
