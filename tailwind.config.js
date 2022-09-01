const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './node_modules/flowbite/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                mono: ['Nunito', ...defaultTheme.fontFamily.mono],
                serif: ['Nunito', ...defaultTheme.fontFamily.serif],
            },
        },
        // screens: {
        //     'sm': '640px',
        //     // => @media (min-width: 640px) { ... }
      
        //     'md': '768px',
        //     // => @media (min-width: 768px) { ... }
      
        //     'lg': '1024px',
        //     // => @media (min-width: 1024px) { ... }
      
        //     'xl': '1280px',
        //     // => @media (min-width: 1280px) { ... }
      
        //     '2xl': '1536px',
        //     // => @media (min-width: 1536px) { ... }
        // }
    },

    plugins: [require('@tailwindcss/forms'), require('flowbite/plugin'), require('@tailwindcss/typography'), require('@tailwindcss/aspect-ratio')],
};
