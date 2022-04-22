const plugin = require('tailwindcss/plugin')

module.exports = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  safelist: [
    'lg:grid-cols-1',
    'lg:grid-cols-2',
    'lg:grid-cols-3',
    'lg:grid-cols-4',
    'min-h-0'
  ],
  theme: {
    container: {
      center: true
    },
    fontSize: {
      0: ['0px', { lineHeight: '0px'}],
      xs: ['0.875rem', { lineHeight: '1.125rem' }], // 14px
      'xs2': ['0.9rem', { lineHeight: '1.2rem' }], // korrektur
      sm: ['1.125rem', { lineHeight: '1.375rem' }], // 18px
      'sm2': ['1.125rem', { lineHeight: '1.34rem' }], // korrektur
      base: ['1.625rem', { lineHeight: '1.875rem' }], // 26px
      'base2': ['1.52rem', { lineHeight: '1.9rem' }], // korrektur
      lg: ['2.25rem', { lineHeight: '2.5rem' }],  // 36px
      xl: ['4.5rem', { lineHeight: '4.75rem' }],  // 72px
      '2xl': ['12.5rem', { lineHeight: '12.5rem' }],  // 100px
      '3xl': ['25rem', { lineHeight: '25rem' }],  // 200px
    },
    extend: {
      screens: {
        sm: '640px',
        md: '768px',
        lg: '1024px',
        xl: '1280px',
        '2xl': '1536px',
        '3xl': '1920px'
      },
      spacing: {
        15: '3.75rem',
        18: '4.4rem',
        20: '5rem',
        'screen-minus-nav': 'calc(100vh - 60px - 9px)',
      },
      colors: {
        'gray-light': '#D6D6D6',
        'gray-medium': '#C0C0C0',
        'gray-dark': '#808080',
        'green-dark': '#58E530',
        'green-light': '#CFF336',
      },
      borderWidth: {
        3: '3px',
        5: '5px'
      },
      transitionDuration: {
        'short': '100ms',
        'medium': '300ms',
        'long': '600ms',
        'extra-long': '1000ms',
      },
      backgroundImage: {
        'arrow-left': "url('/resources/images/Arrow_Left.svg')",
        'arrow-left-negative': "url('/resources/images/Arrow_Left_Negative.svg')",
        'arrow-right': "url('/resources/images/Arrow_Right.svg')",
        'arrow-right-negative': "url('/resources/images/Arrow_Right_Negative.svg')",
        'arrow-up': "url('/resources/images/Arrow_Up.svg')",
        'arrow-up-negative': "url('/resources/images/Arrow_Up_Negative.svg')",
        'arrow-down': "url('/resources/images/Arrow_Down.svg')",
        'arrow-down-negative': "url('/resources/images/Arrow_Down_Negative.svg')",
        'arrow-up-right': "url('/resources/images/Arrow_UpRight.svg')",
        'arrow-up-right-negative': "url('/resources/images/Arrow_UpRight_Negative.svg')",
        'arrow-up-right-gray': "url('/resources/images/Arrow_UpRight_Gray.svg')",
      },
      gridTemplateColumns: {
        'payment': '1.25rem auto'
      },
      maxWidth: {
        '1/4': '25%',
        '1/2': '50%',
        '3/4': '75%',
        'max-content-width': '951px',
      }
    }
  },
  plugins: [
    plugin(function ({ addVariant }) {
      addVariant('second', '&:nth-child(2)')
      addVariant('third', '&:nth-child(3)')
      addVariant('fourth', '&:nth-child(4)')
      addVariant('second-last', '&:nth-last-child(2)')
      addVariant('third-last', '&:nth-last-child(3)')
      addVariant('fourth-last', '&:nth-last-child(4)')
      addVariant('every-second', '&:nth-child(2n)')
      addVariant('every-third', '&:nth-child(3n)')
      addVariant('every-fourth', '&:nth-child(4n)')
    })
  ]
};
