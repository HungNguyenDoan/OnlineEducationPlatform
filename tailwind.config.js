/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/views/layouts/**/*.blade.php",
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    fontSize: {
      '2xs': '0.625rem',
      '3xl': '2rem',
    },
    extend: {},
  },
  plugins: [],
}
