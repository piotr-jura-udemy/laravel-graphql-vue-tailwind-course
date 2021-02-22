module.exports = {
  purge: [
    "./resources/**/*.vue",
    "./resources/views/**/*.php"
  ],
  theme: {
    extend: {},
  },
  variants: {
    rotate: ['group-hover']
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
  darkMode: 'class'
}
