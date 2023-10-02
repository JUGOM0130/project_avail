/**20230713追記 vueの本体？ */
import vue from '@vitejs/plugin-vue'
/**20230907追記 エイリアスを設定するのに必要 */
import path from 'path'
import {
    defineConfig
} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({

            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/scss/app.scss'
            ],
            /**
             * 監視対象ページ(配列を指定することもできる)
             * app/View/Components/**
             * lang/**
             * resources/lang/**
             * resources/views/**
             * routes/**
             */
            refresh: true,
        }),
        /**20230713_追記 */
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                }
            }
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
        alias: [{
            find: "@@",
            replacement: path.join(__dirname, 'resources/'),
        }],
    },
});
