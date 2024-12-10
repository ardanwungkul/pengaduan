import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                watercouse: {
                    50: "#edfcf4",
                    100: "#d3f8e4",
                    200: "#aaf0ce",
                    300: "#73e2b2",
                    400: "#3acd92",
                    500: "#17b279",
                    600: "#0b9062",
                    700: "#086c4c",
                    800: "#095c41",
                    900: "#094b38",
                    950: "#042a20",
                },
                curious: {
                    50: "#eff9ff",
                    100: "#def2ff",
                    200: "#b6e7ff",
                    300: "#75d7ff",
                    400: "#2cc3ff",
                    500: "#00a2e9",
                    600: "#0089d4",
                    700: "#006dab",
                    800: "#005c8d",
                    900: "#064d74",
                    950: "#04304d",
                },
            },
        },
    },

    plugins: [forms, require("flowbite/plugin")],
};
