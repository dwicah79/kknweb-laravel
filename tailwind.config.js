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
                sans: ["Poppins", ...defaultTheme.fontFamily.sans],
            },
            fontWeight: {
                light: 300,
                regular: 400,
                medium: 500,
                semibold: 600,
                bold: 700,
            },
            colors: {
                primary: {
                    100: "#E6F6FF",
                    200: "#BFE8FF",
                    300: "#99DBFF",
                    400: "#4DC0FF",
                    500: "#00A5FF",
                    600: "#0096E6",
                    700: "#006399",
                    800: "#004D73",
                    900: "#00364D",
                },
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
