const path = require('path')

module.exports = {
    entry: "./src/scripts/main.js",
    module: {
        rules: [
            {
                test: /\.tsx?$/,
                use: 'ts-loader',
                exclude: /node_modules/,
            },
            {
                test: /\.(jp(e?)g|png|svg|gif)$/,
                loader: 'url-loader',
                options: {
                    limit: 8192,
                    name: "[name].[ext]"
                },
            },
        ],
    },
    resolve: {
        extensions: ['.tsx', '.ts', '.js'],
    },
    output: {
        filename: 'bundle.js',
        path: path.join(__dirname, "public", "dist"),
    },
}