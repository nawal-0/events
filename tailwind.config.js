/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        'primary': '#f43f5e',
        'primary-dark': '#9f1239',
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

