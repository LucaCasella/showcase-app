import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from   'react-refresh';
export default defineConfig({

    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/css/app.css',
                'resources/sass/main-backoffice.scss',
                'resources/sass/main-public.scss',
            ],
            refresh: true,
            watch: ['resources/**/*.scss'],
        }),
        react
    ],
});
