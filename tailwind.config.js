const defaultTheme = require('tailwindcss/defaultTheme')

const whitelist = ['gray', 'red', 'orange', 'yellow', 'green', 'teal', 'blue', 'purple', 'pink'].reduce(
  (result, color) => result.push(`text-${color}-600`, `bg-${color}-600`, `bg-${color}-500`) && result, [])
module.exports = {
  purge: {
    content: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue'
    ],
    options: {
      whitelist
    }
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter var', ...defaultTheme.fontFamily.sans]
      }
    },
    variants: {
      extend: {}
    }
  },
  plugins: [
    require('@tailwindcss/forms'),
  ]
}
