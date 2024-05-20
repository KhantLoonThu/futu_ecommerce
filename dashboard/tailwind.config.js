/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}", "./public/**/*.{html,js,php}"],
  darkMode: 'selector',
  theme: {
    extend: {
      width: {
        '1/8': 'calc(90% / 8)',
      }
    },
  },
  plugins: [],
}