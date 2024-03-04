/** @type {import('tailwindcss').Config} */
export default {
   content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue", 
     "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    theme: {
      extend: {
        dark: false,
      },
    },
  },
  plugins: [require('flowbite/plugin')],
  
}

