const colors = require('tailwindcss/colors')

const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    //mode: 'jit',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/css/*.css'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    corePlugins: {
        // ...
       container: false,
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
