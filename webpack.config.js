const ExtractTextPlugin = require( 'extract-text-webpack-plugin' );
const autoprefixer = require( 'autoprefixer' );
const svgFragments = require( 'postcss-svg-fragments' );
const path = require( 'path' );

module.exports = {
  entry: {
    app: [
	  // 'webpack-dev-server/client?http://localhost:8881/',
      './assets/js/src/App.js'
    ]
  },

  output: {
    // path: path.resolve( __dirname, 'assets' ),
	path: __dirname,
    publicPath: '/',
    filename: '/assets/js/main.js',
    sourceMapFilename: 'main.js.map'
  },

  resolve: {
    extensions: ['', '.js', '.jsx', '.es6'],
    modulesDirectories: ['node_modules']
  },

  module: {
    preloaders: [
      { test: /\.jsx$|\.es6$|\.js$/, loader: 'source-map', query: { presets: ['react', 'latest'] }, exclude: /(node_modules|bower_components)/ }
    ],
    loaders: [
      { test: /\.jsx$|\.es6$|\.js$/, loader: 'babel', query: { presets: ['react', 'es2015'] }, exclude: /(node_modules|bower_components)/ },
      { test: /\.scss$|\.css$/, loader: ExtractTextPlugin.extract('style-loader', 'css-loader?sourceMap!postcss-loader!sass-loader?outputStyle=expanded&sourceMap=true&sourceMapContents=true') },
      { test: /.*\.(gif|png|jpe?g|svg)$/i, loaders: ['file?hash=sha512&digest=hex&name=[hash].[ext]', 'image-webpack?bypassOnDebug&optimizationLevel=5'] }
    ]
  },

  devtool: "eval",

  postcss: function() {
    return [
	autoprefixer( { browsers: ['last 2 versions'] } ),
	svgFragments
    ];
  },

  plugins: [
    new ExtractTextPlugin( 'style.css', {
      allChunks: true
    } )
  ]
};