/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["**/*.php"],
  theme: {
    extend: {
        colors: {
          primary: {
              DEFAULT: "#fcb215",
              dark: "#d18f1c"
          }
        }
    },
  },
  plugins: [],
}

