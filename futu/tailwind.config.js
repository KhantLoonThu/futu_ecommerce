/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./public/index.html",
    "./src/**/*.{js,ts,jsx,tsx,vue}",
  ],
  theme: {
    extend: {
      colors: {
        light: {
          primary: '#f3f4f6', // Light gray
          secondary: '#ffffff', // White
          accent: '#ffeeba', // Bright cream
          tertiary: '#ededed', // Light gray
          dark: '#393939', // Dark gray
        },
        dark: {
          primary: '#00010c',
          secondary: '#000e20',
          accent: '#007ad7',
          tertiary: '#393939',
          light: '#a8a8ac',
        },
      },
      boxShadow: {
        neon: "0 0 5px #fff, 0 0 10px #fff, 0 0 20px #007ad7, 0 0 30px #007ad7, 0 0 40px #007ad7, 0 0 50px #007ad7, 0 0 60px #007ad7"
      }
      // screens: {
      //   'sm': '640px',
      //   'md': '768px',
      //   'lg': '1024px',
      //   'xl': '1280px',
      //   '2xl': '1536px',
      // },
    }
  },
  plugins: [],
}