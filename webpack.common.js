const path = require('path');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const dir = path.resolve(__dirname, '.');

module.exports = {
	entry: './www/assets/js/index.js',
	output: {
		filename: '[name].[chunkhash:8].js',
		path: dir + '/src',
		publicPath: '/'
	},
	module: {
		rules: [
			{
				test: /\.(png|svg|jpe?g|gif)$/,
				use: [
					{
						loader: 'file-loader',
						options: {
							name: 'images/[name].[hash:8].[ext]'
						}
					}
				]
			}
		]
	},
	plugins: [
		new CleanWebpackPlugin(['src']),
	]
};