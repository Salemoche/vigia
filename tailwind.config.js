module.exports = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    container: {
      center: true
    },
    screens: {
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1280px',
      '2xl': '1536px',
      '3xl': '1920px'
    },
    fontSize: {
      xs: ['0.875rem', { lineHeight: '1.125rem' }], // 14px
      sm: ['1.125rem', { lineHeight: '1.375' }], // 18px
      base: ['1.625rem', { lineHeight: '1.875rem' }], // 26px
      lg: ['2.25rem', { lineHeight: '2.5rem' }],  // 36px
      xl: ['4.5rem', { lineHeight: '4.75rem' }],  // 72px
    },
    extend: {
      spacing: {
        15: '3.75rem',
      },
      colors: {
        'gray-light': '#D6D6D6',
        'gray-medium': '#C0C0C0',
        'gray-dark': '#646464',
        'green-dark': '#58E530',
        'green-light': '#CFF336',
      },
      borderWidth: {
        3: '3px'
      },
      transitionDuration: {
        'short': '100ms',
        'medium': '300ms',
        'long': '600ms'
      }
    }
  },
  plugins: [],
};
