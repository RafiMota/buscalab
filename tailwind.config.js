/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}",
    "./*.{html,js}",
    "./html/*.{html,js}"],
  theme: {
    extend: {
      backgroundImage: {
        'bgLogin': "url('/assets/bgLogin.jpg')",
        'capa_lab_cybepunk': "url('/assets/cyberpunk/capa-lab-cyberpunk.png')"
      }
    },
  },
  plugins: [],
}

