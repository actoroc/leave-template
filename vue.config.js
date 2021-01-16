module.exports = {
  configureWebpack: {
    resolve: {
      alias: {
        assets: '@/assets',
        components: '@/components',
        views: '@/views',
        notwork: '@/notwork',
      },
      extensions: ['.js', '.css', '.vue', '.json'],
    },
    devServer: {
      proxy: {
        '/api': {
          // 需要代理的url
          target: 'http://localhost:80/',
          changeOrigin: true,
          ws: true,
          pathRewrite: {
            '^/api': '/',
          },
        },
      },
    },
  },
};
