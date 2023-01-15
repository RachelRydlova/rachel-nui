
    const path = require('path');

    const dir = path.resolve(__dirname, '.');

    module.exports = {
        entry: './www/assets/js/index.js',
        output: {
            filename: 'main.js',
            path: dir + '/www/src/'
        },
        devtool: 'source-map',
        module: {
            rules: [
                {

                }
            ]
        },
        resolve: {
            alias: {
                jquery: "jquery/assets/jquery"
            }
        }

    }