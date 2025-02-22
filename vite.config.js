import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import * as path from "node:path";
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
    resolve: {
        alias: {
            '~': path.resolve(__dirname, 'resources/js/react'),
        },
    },
});
