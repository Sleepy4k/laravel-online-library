import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/js/app.js",
                "resources/js/bootstrap.js",
                "resources/js/mazer.js",
                "resources/js/swal.js",
                "resources/js/image.js",
                "resources/js/horizontal-layout.js",
                "resources/js/form-select.js",
                "resources/css/app.css",
                "resources/css/app-dark.css",
                "resources/css/auth.css",
                "resources/css/error.css",
                "resources/css/iconly.css",
                "resources/css/fontawesome.css",
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            "@": "/resources/js",
        },
    },
});
