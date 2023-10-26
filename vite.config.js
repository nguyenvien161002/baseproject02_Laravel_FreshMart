import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    server: {
        host: '0.0.0.0',
        hmr: {
            host: "localhost",
            protocol: 'ws',
        },
        watch: {
            usePolling: true,
        },
    },
    plugins: [
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/js/app.js",
                "resources/css/app.css",
                "resources/css/modal.css",
                "resources/css/toast.css",
                "resources/css/details/product.css",
                "resources/css/details/news.css",
                "resources/css/responsive/news.css",
                "resources/css/responsive/contact.css",
                "resources/css/responsive/products.css",
                "resources/css/responsive/favorite.css",
                "resources/css/login.css",
                "resources/css/admin.css"
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            $: "jQuery",
        },
    },
});
