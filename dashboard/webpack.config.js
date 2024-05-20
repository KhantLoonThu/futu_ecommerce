// webpack.config.js

const path = require('path');

module.exports = {
    mode: 'development', // or 'production'
    entry: './src/script.ts',
    output: {
        filename: 'main.js',
        path: path.resolve(__dirname, './public'),
    },
    module: {
        rules: [
            {
                test: /\.tsx?$/,
                use: 'ts-loader',
                exclude: /node_modules/,
            },
        ],
    },
    resolve: {
        extensions: ['.tsx', '.ts', '.js'],
    },
};
