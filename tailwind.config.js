/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/views/layouts/**/*.blade.php",
    "./resources/views/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    fontSize: {
      sm: '0.8rem',
      base: '1rem',
      xl: '1.25rem',
      '2xl': '1.563rem',
      '2xs': '0.625rem',
      '3xl': '2rem',
      '4xl' : '3rem',
    },
    extend: {},
  },
  plugins: [],
}
