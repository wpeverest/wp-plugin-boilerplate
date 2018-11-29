/**
 * External dependencies
 */
const path = require( 'path' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const CleanWebpackPlugin = require( 'clean-webpack-plugin' );
const NODE_ENV = process.env.NODE_ENV || 'development';

const webpackConfig = {
	mode: NODE_ENV,
	entry: {
		admin: './assets/index.js'
	},
	output: {
		path: path.resolve( __dirname, './build/' ),
		filename: '[name].js',
		libraryTarget: 'this',
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				loader: 'babel-loader',
				exclude: /node_modules/,
			},
			{
				test: /\.s[c|a]ss$/,
				use: [
					'style-loader',
					MiniCssExtractPlugin.loader,
					'css-loader',
					'postcss-loader',
					{
						loader: 'sass-loader'
					},
				],
			}
		]
	},
	plugins: [
		new CleanWebpackPlugin( 'build', {} ),
		new MiniCssExtractPlugin( {
			filename: '[name].css',
		} ),
	],
}

if ( webpackConfig.mode !== 'production' ) {
	webpackConfig.devtool = process.env.SOURCEMAP || 'source-map';
}

module.exports = webpackConfig;
