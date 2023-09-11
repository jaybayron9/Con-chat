/** @type {import('tailwindcss').Config} */
const withMT = require("@material-tailwind/html/utils/withMT");
module.exports = withMT({
  content: [
    "./resources/views/**/*.{php,html,js}"
  ],
  theme: {
    extend: {  
      fontWeight: {
        'extra-bold': '600',
      },
      fontFamily: {
        'poppins': ['Poppins', 'sans-serif'],
      },
      colors: {
        'bg': '#dde1e7',
        'text': '#595959'
      },
      boxShadow: {
        'out': '-3px -3px 7px #ffffff73, 2px 2px 5px rgba(94,104,121,0.288)',
        'in': 'inset 2px 2px 5px #BABECC, inset -5px -5px 10px #ffffff73;',
        'in-after': 'inset 1px 1px 2px #BABECC, inset -1px -1px 2px #ffffff73;'
      },
      height: {
        'contact': '38rem',
        'contact-list': '24rem', 
        'contact-list-ph': '32rem', 
        'head-image': '3.5rem', 
        'chat-box': '28rem',  
      },
      width: {
        'insight-text': '68%;'
      },
      minHeight: {
        'contact-image': '64px', 
        'chat-profile': '2rem'
      },
      minWidth: {
        'contact-image': '64px', 
        'chat-profile': '2rem'
      }
    },
  },
  plugins: [ 
  ],
});

