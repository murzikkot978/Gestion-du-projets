const glob = require('glob-all');
const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const webpack = require('webpack');
const { theme } = require('./theme.js');


module.exports = (env) => {
  switch (env.mode) {
    case 'production':
      console.log('========================================================');
      console.log(' 🔥  🚀 🔥 🚀 🔥 Building for production 🔥 🚀 🔥 🚀 🔥');
      console.log('========================================================');
      break;
    case 'development':
      console.log('=================================================');
      console.log('  🛠️ ✨ 🛠️  Building for development  🛠️ ✨ 🛠️');
      console.log('=================================================');
      break;

    default:
      break;
  }
  return {
    mode: env.mode,

    entry: glob.sync('./src/js/**.js').reduce(function (obj, el) {
      obj[path.parse(el).name] = el;
      return obj
    }, {}),
    output: {
      filename: 'js/[name].[chunkhash].js',
      path: path.resolve(__dirname, 'dist'),
      clean: true,
    },

    watch: env.watch,
    watchOptions: {
      aggregateTimeout: 600,
      poll: 1000,
    },

    module: {
      rules: [
        {
          test: /\.[tj]s?$/,
          loader: 'babel-loader',
        },
  
       
        {
          test: /\.(sa|sc|c)ss$/,
          use: [
            MiniCssExtractPlugin.loader,
            "css-loader",
            "postcss-loader",
            'sass-loader'
          ],
        }
      ]
    },

    resolve: {
      extensions: ['.ts', '.js', '.scss', '.css', '.php'],
      modules: [
        path.resolve('./template-parts/gutenberg-blocks'),
        path.resolve('./src/js'),
        path.resolve('./src'),
        path.resolve('./node_modules')
      ]
    },

    plugins: [
      new MiniCssExtractPlugin({
        filename: 'css/[name].[chunkhash].css',
        chunkFilename: 'css/chunk-[id].css',
      }),
      new webpack.DefinePlugin({
		    'CUSTOM_THEME': JSON.stringify(theme)
		  }),
    ]
  };
}