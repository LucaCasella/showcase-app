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
    server: {
        host: 'localhost',
        port: 3000,
        strictPort: true,
        // host: '0.0.0.0', // consente l’accesso dall’esterno (es. ngrok)
        // hmr: {
        //     host: 'localhost', // oppure il tuo dominio ngrok (facoltativo)
        //     protocol: 'ws',
        // }
    }
});
