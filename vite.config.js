import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'


export default defineConfig({
    plugins: [
        vue([
            'resources/css/app.css',
        ]),
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
    ],
});