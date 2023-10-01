/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],

  theme: {
    extend: {
        height: {
            '128': '32rem',
            '160': '40rem',
            '192': '42rem',
            '224': '56rem',
          },
    },
  },

  plugins: [],
}

