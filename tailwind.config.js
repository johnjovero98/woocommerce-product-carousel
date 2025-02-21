/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{php,html,js}","./template-parts/*.{php,html,js}"],
  theme: {  
    spacing:{
      '0':'0px',
      '1': '8px',
      '2': '13.5px',
      '3': '27px',
      '4': '54px',
      '5': '81px',
      '6': '108px',
      '7': '135px',
    },
    
    fontSize:{
      base:'18px'
    },
    extend: {
      fontSize: {
        h1:['3.815rem', {lineHeight:'4.5rem'}], 
        h2:['3.052rem', {lineHeight:'4.5rem'}], 
        h3:['2.441rem', {lineHeight:'3rem'}], 
        h4:['1.953rem ', {lineHeight:'3rem'}], 
        h5:['1.563rem', {lineHeight:'3rem'}], 
        h6:['1.25rem', {lineHeight:'3rem'}], 
        p:['1rem', {lineHeight:'1.5rem'}], 
        small:['0.8rem', {lineHeight:'1.5rem'}], 
      },

      fontFamily: {
        body: ['"Montserrat"','san-serif'],
        heading : ['"Chewy"','serif']
      },

      colors:{
        transparent:'transparent',
        'gold':{
          100:'#FBF0DB',
          300:'#F2D293',
          500:'#E9B44B',
        },
        'black':'#1D130D',
        'white':'#FAF6F3',
      },

      boxShadow: {
        'inner-strong': 'inset 0 2px 4px 0 rgb(0 0 0 / 0.5)',
      }
    },
  },
  plugins: [],
}
