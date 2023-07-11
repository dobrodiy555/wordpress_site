const path = require('path');
const miniCss = require('mini-css-extract-plugin');

module.exports = {
  mode: 'development',
  entry: './src/index.js', // where read what to bundle
  output: {
    path: path.resolve(__dirname, 'dist'), // folder
    filename: 'scripts.js' // создастся после сборки
  },
  module: {
    rules: [
      {
        test: /\.(scss|css)$/,
        use: [
          miniCss.loader,
          {
            loader : 'css-loader',
            options: { url : false }
          },
          'sass-loader'
        ],
      },
    ],
  },
  plugins: [
    new miniCss({
      filename: './style.css',
    }),
  ]
};