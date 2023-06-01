import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from "tailwindcss";
import autoprefixer from 'autoprefixer';
import sassGlobImports from 'vite-plugin-sass-glob-import';

export default defineConfig({
    server: {
        hmr: {
            host: 'localhost',
        },
    },
    css: {
        postcss: {
          plugins: [
            tailwindcss,
            autoprefixer,
          ],//オートプレフィックス付与
        },
        devSourcemap: true,//ソースマップを付与
    },

    plugins: [
        sassGlobImports(),
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
