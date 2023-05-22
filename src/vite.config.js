import { defineConfig } from 'vite';
// import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        // vue(),
        laravel([
            'resources/scss/app.sass',
            'resources/js/holiday.js',
        ])
    ]
})
