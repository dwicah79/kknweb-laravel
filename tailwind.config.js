import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Jakarta Sans", ...defaultTheme.fontFamily.sans],
            },
            fontWeight: {
                light: 300,
                regular: 400,
                medium: 500,
                semibold: 600,
                bold: 700,
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
