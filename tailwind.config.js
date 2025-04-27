const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
export default  {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/react/**/*.{js,jsx,ts,tsx}',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // todo: low - choose brand colors and fonts
                primary: '',
                primaryForeground: '',
                secondary: '',
                secondaryForeground: '',
                success: '',
                warning: '',
                error: '',
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
