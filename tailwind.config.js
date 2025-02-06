/** @type {import('tailwindcss').Config} */
import preset from './vendor/filament/filament/tailwind.config.preset'
const colors = require('tailwindcss/colors');

export default {
  presets: [preset],
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './app/Filament/**/*.php',
    // './resources/views/filament/**/*.blade.php',
    './vendor/filament/**/*.blade.php',
    './vendor/awcodes/filament-curator/resources/**/*.blade.php',
    './vendor/filament/**/*.css', 
  ],
  theme: {
    extend: {
        colors: {
            primary: colors.blue, // Ensure "primary" color exists
        },
    },
},
  plugins: [],
};
