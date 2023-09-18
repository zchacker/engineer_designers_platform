/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      
      colors:{
        transparent: 'transparent',
        current: 'currentColor',
        'primary' : '#8D71D3',
        'secondary': '#F3D864',
        'dark-purble' : '#3B3C87',
        'light-purble': '#9C9DF4',
        'happy-green' : '#79D45D',
        'dash-bg' : '#EFF0F1',
        'data-dash' : '#E3F2FC',
        'data-dash-items': '#F3D864',
        'normal-btn' : '#49E3D6'      
      }

    },
  },
  plugins: [],
}

