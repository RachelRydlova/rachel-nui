const glob = require('glob');
const path = require('path');
const merge = require('webpack-merge');
const common = require('./webpack.common.js');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const PurifyCSSPlugin = require('purifycss-webpack');

module.exports = merge(common, {
	mode: 'production',
	module: {
		rules: [
			{
				test: /\.js$/,
				exclude: /node_modules/,
				use: {
					loader: 'babel-loader'
				}
			},
			{
				test: /\.css$/,
				use: [
					MiniCssExtractPlugin.loader,
					'css-loader',
					'postcss-loader'
				]
			}
		]
	},
	plugins: [
		new MiniCssExtractPlugin({
			filename: '[name].[chunkhash:8].css',
			chunkFilename: "[id].css"
		}),
		new PurifyCSSPlugin({
			paths: glob.sync( path.join(__dirname, 'src/*.html') ),
			minimize: true
		})
	]
});