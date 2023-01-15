const path = require('path');
const merge = require('webpack-merge');
const common = require('./webpack.common.js');
const webpack = require('webpack');

module.exports = merge(common, {
	mode: 'development',
	devtool: 'source-map',
	module: {
		rules: [
			{
				test: /\.css$/,
				use: [
					'style-loader',
					'css-loader'
				]
			}
		]
	},
	devServer: {
		publicPath: '/'
	},
	plugins: [
		new webpack.HotModuleReplacementPlugin()
	]
});