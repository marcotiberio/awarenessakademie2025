/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    '*.php',
    'templates/**/*.{php,twig}',
    './Components/**/*.{php,twig}'
  ],
  theme: {
    borderRadius: {
      none: '0',
      DEFAULT: '25px'
    },
    borderWidth: {
      DEFAULT: '1px',
      0: '0',
      2: '2px',
      3: '3px'
    },
    colors: {
      white: '#fff',
      black: '#000',
      blue: '#1079d7',
      orange: '#fc6b16',
      green: '#27ad50',
      yellow: '#f5cc5a',
      brown: '#a76d61',
      red: '#ff0000',
      grey: '#f9f9f9',
      darkgrey: '#333',
      beige: '#edecd9',
      acqua: '#51bad9',
      azulgrey: '#e6ecee',
      darkblue: '#001028',
      current: 'currentColor',
      transparent: 'transparent'
    },
    fontSize: {
      body: ['1.25rem'],
      button: ['1rem'],
      superTitle: ['4.375rem'],
      superSubtitle: ['1.875rem'],
      h1: ['4.875rem'],
      h2: ['2.375rem'],
      h3: ['1.25rem'],
      menu: ['1rem']
    },
    screens: {
      sm: '640px',
      md: '780px',
      lg: '1180px',
      xl: '1440px',
      xxl: '1680px',
      max: '1920px'
    },
    extend: {
      aspectRatio: {
        '16/3': '16 / 3',
        '4/3': '4 / 3',
        '3/4': '3 / 4',
        '2/1': '2 / 1',
        '9/16': '9 / 16'
      },
      borderWidth: {
        DEFAULT: '1px',
        0: '0',
        0.5: '0.5px',
        2: '2px',
        3: '3px',
        4: '4px',
      },
      fontFamily: {
        sans: ['"FavoritLight"'],
        serif: ['"FavoritLight"']
      },
      gridColumnStart: {
        1: '1',
        2: '2',
        3: '3',
        4: '4'
      },
      gridColumnEnd: {
        0: '1',
        1: '2',
        2: '3',
        3: '4',
        4: '5'
      },
      spacing: {
        xxxs: '5px',
        xxs: '15px',
        xs: '20px',
        sm: '35px',
        md: '50px',
        lg: '75px',
        xl: '100px',
        xxl: '120px',
        max: '200px',
        navHeightMobile: '75px',
        navHeightDesktop: '150px'
      }
    }
  },
  plugins: []
}
