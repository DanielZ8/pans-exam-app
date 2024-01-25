import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 
            'resources/js/app.js',
            'resources/js/layout.js',
            'resources/css/global.css',
            'resources/css/admin.css',
            'resources/css/animation.css',
            'resources/css/fontello.css',
            'node_modules/tinymce/skins/content/default/content.css' 

        ],
            refresh: true,
        }),
    ],
});
