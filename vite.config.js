import { defineConfig } from 'vite';
import laravel, {refreshPaths} from 'laravel-vite-plugin';
// import react from '@vitejs/plugin-react';
// import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ]
        ,
        refresh: [
            ...refreshPaths,
            'app/Http/Livewire/**',
        ],
        // Agregar configuración de Alpine.js aquí
        optimizeDeps: {
            include: ['alpinejs'], // Incluye Alpine.js como dependencia a optimizar
        },
            })
        // react(),
        // vue({
        //     template: {
        //         transformAssetUrls: {
        //             base: null,
        //             includeAbsolute: false,
        //         },
        //     },
        // }),
    ],
});