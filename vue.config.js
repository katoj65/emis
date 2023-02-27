module.exports = {
    //option
    //Basic path
    publicPath = process.env.NODE_ENV === 'production' ? './' : '/',
    //Output directory at build time
    outputDir = '',
    //Set directory for static resources
    assetsDir: 'static',
    //Output path of html
    indexPath: '/resources/views/welcome.blade.php',
    //File name hash
    filenameHashing: true,
    //For multi page configuration, default is undefined
    pages: {
        //page's entry file
        entry: '/resources/js/app.js',
        //template file
        template: '/resources/views/welcome.blade.php',
        //Output file in dist/index.html
        filename: 'welcome.blade.php',
        // When using the page title option,
        // The title tag in template needs to be <title><%= htmlWebpackPlugin.options.title %></title>
        title: 'EMIS - central',
        // The blocks contained in this page, by default, contain
        // Extracted general chunks and vendor chunk s.
        chunks: ['chunk-vendos', 'chunk-common', 'welcome.blade'],
    },
    // When using the entry only string format,
    // Template file defaults to `public/subpage.html`
    // If not, go back to `public/index.html`.
    // The default output file is `subpage.html`.
    subpage: '/resources/views/login.blade.php',
    //Whether to use it when saving`eslint-loader`Inspection
    lintOnSave: true,
    //Use full build with in browser editor
    runtimeCompiler: false,
    //  Babel loader will skip node modules dependency by default.
    transpileDependencies: [ /* string or regex */ ],
    //  Build build for production environment or not source map？
    productionSourceMap: true,
    //  Set in generated HTML <link rel="stylesheet"> and <script> Labelling crossorigin Attribute.
    crossorigin: "",
    //  In the generated HTML <link rel="stylesheet"> and <script> Enabled on label Subresource Integrity (SRI).
    integrity: false,
    //  Adjust the internal webback configuration
    configureWebpack: (config) => {

    }, //(Object | Function)
    chainWebpack: (config) => {
        // Because it is multi page, cancel chunks, and each page only corresponds to a separate JS / CSS
        config.optimization
            .splitChunks({
                cacheGroups: {}
        });

        // 'src/lib' External library file under directory, not involved eslint Testing
        config.module
        .rule('eslint')
        .exclude
        .add('/Users/maybexia/Downloads/FE/community_built-in/src/lib')
        .end()
    },
    // Configure the webpack dev server behavior.
    devServer: {
        open: process.platform === 'darwin',
        host: '0.0.0.0',
        port: 8080,
        https: false,
        hotOnly: false,
        // See https://github.com/vuejs/vue-docs-zh-cn/blob/master/vue-cli/cli-service.md#Configuration agent
        proxy: {
            '/api': {
                target: 'http://localhost:8000/',
                changeOrigin: true,
                secure: false,
                pathRewrite: {
                    "^/api": ""
                }
            }
        },
        disableHostCheck: true
    },
    // The configuration is higher than that of css loader in chainWebpack
    css: {
        // Whether to enable foo.module.css
        modules: false,
        // Whether to use the css separation plug-in ExtractTextPlugin and load it in a separate style file instead of using the <style> Method inline to html In file
        extract: true,
        // Whether to build style map or not, false will improve the construction speed
        sourceMap: false,
        // css preset configuration item
        loaderOptions: {
            css: {
                // options here will be passed to css-loader
            },
            postcss: {
                // options here will be passed to postcss-loader
            }
        }
    },
    // Enable multiprocess processing babel compilation at build time
    parallel: require('os').cpus().length > 1,

    // https://github.com/vuejs/vue-cli/tree/dev/packages/%40vue/cli-plugin-pwa
    pwa: {},

    // Third party plug-in configuration
    pluginOptions: {},
    transpileDependencies: [
        '/\/node_modules\/vue-wcharts\//'
    ],
    transformIgnorePatterns: [
        '/node_modules/(?!vue-wcharts|d3-array|d3-scale|d3-shape)',
    ],
}
