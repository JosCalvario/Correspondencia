const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            colors : {
                sc_greener: '#0C231E',
                sc_green: '#13322B',
                sc_greeny: '#3B5B50',
                sc_red: '#A42145',
                sc_sandy: '#C2BA98',
                sc_rat: '#61615F',
                sc_gravel: '#BBBABA',
                sc_quartz: '#FFFFFF',
                
            }
        },
    },

    plugins: [require('flowbite/plugin'), require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
