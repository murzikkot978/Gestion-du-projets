const plugin = require('tailwindcss/plugin')
const {theme} = require('./theme.js')

module.exports = {
    content: [
        './template-parts/**/*.php',
        './**/*.php',
        './*.php',
        './template-parts/',
    ],
    theme: {
        ...theme,
        fontFamily: Object.entries(theme.fontFamily).reduce((newObj, [key, val]) => {
            return {
                ...newObj,
                [key]: val.substring(1, val.length-1)}
        }, {}),
    },
    plugins: [
        plugin(function ({ addComponents, theme }) {

        })
    ],
  
}