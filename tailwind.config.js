/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: '#15243b', // Based on JWC logo colors
        secondary: '#bf9448', // JWC gold
        dark: '#0a101d', // Tafaul-like dark background
      },
      fontFamily: {
        sans: ['Tajawal', 'ui-sans-serif', 'system-ui', 'sans-serif'], // Popular Arabic font
        machina: ['Tajawal', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
