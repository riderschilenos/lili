const colors = require('tailwindcss/colors')

const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    //mode: 'jit',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    separator: '_',

    corePlugins: {
        preflight: false,
       container: false,
    },

    plugins:    [require('tailwindcss'),
                require('autoprefixer'),
                require('@tailwindcss/forms'), 
                require('@tailwindcss/typography'),
                require('postcss-import')],
};
