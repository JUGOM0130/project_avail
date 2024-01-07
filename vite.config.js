/**20230713追記 vueの本体？ */
import vue from '@vitejs/plugin-vue'
/**20230907追記 エイリアスを設定するのに必要 */
import path from 'path'
import {
    defineConfig
} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({

    mode:'production',
    base:'/project_avail/',
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/contact/create.js',
                'resources/js/contact/edit.js'
            ],
            refresh: true,
        }),
        /**20230713_追記 */
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
/**20230713_追記 */
    //ホットリロードが効かないときに使用すると良い
    server: {
        host: '133.18.242.137',
        port:'8081',
        /*
        hmr: {
            host: 'localhost',
        },
        watch: {
            usePolling: true
        }
        */
    },
    /**20230907追記 */
    resolve: {
        alias: {
            'vue': 'vue/dist/vue.esm-bundler.js',
            '@@' : path.join(__dirname, 'resources/')
        },
    },
});
