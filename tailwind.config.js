/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}",
    "./*.{html,js}",
    "./html/*.{html,js}"],
  theme: {
    extend: {
      backgroundImage: {
        'bgLogin': "url('/assets/bgLogin.jpg')"
      }
    },
  },
  plugins: [],
}

