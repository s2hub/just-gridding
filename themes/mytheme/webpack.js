const MiniCssExtractPlugin = require("mini-css-extract-plugin")
const path = require('path')

module.exports = {
    mode: 'development',
    entry: {
        app: './src/javascript/index.js',
        css: './src/css/app.css'
    },
    output: {
        filename: "javascript/[name].js",
        path: path.resolve(__dirname, "./dist"),
        chunkFilename: "dist/javascript/[name].js"
    },
    // devServer: {
    //     host: "0.0.0.0",
    //     port: 8000,
    //     open: false,
    //     watchFiles: ["./templates/**/*.ss","../../app/templates/**/*.ss"],
    //     proxy: {
    //         context: () => true,
    //         target: "http://web",
    //         onError(err) {
    //             console.log("Suppressing WDS proxy upgrade error:", err);
    //         },
    //     },
    // },
    plugins: [
        new MiniCssExtractPlugin({
            filename: 'css/[name].css',
            chunkFilename: "[name].css"
        }),
    ],
    module: {
        rules: [
            {
                test: /\.css$/i,
                include: path.resolve(__dirname, 'src'),
                use: [MiniCssExtractPlugin.loader, 'css-loader', 'postcss-loader'],
            },
        ],
    },
    watchOptions: {
        poll: 1000,
    }
}
