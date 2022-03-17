module.exports = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    container: {
      center: true
    },
    extend: {
      screens: {},
      colors: {
        'gray-light': '#D6D6D6',
        'gray-dark': '#C0C0C0',
        'green-dark': '#58E530',
        'green-light': '#CFF336',
      },
    },
  },
  plugins: [],
};
