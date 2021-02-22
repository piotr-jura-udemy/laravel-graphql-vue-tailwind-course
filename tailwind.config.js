module.exports = {
  purge: [
    "./resources/**/*.vue",
    "./resources/views/**/*.php"
  ],
  theme: {
    extend: {},
  },
  variants: {},
  plugins: [
    require('@tailwindcss/forms'),
  ],
  darkMode: 'class'
}
