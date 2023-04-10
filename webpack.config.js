const Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addEntry('app', './assets/js/app.js')
    .addEntry('dashboard', './assets/css/dashboard.css')
    .addEntry('emailValidation', './assets/js/emailValidation.js')
    .enableSassLoader()
    .enablePostCssLoader()
    .autoProvidejQuery()
    .enableSourceMaps(!Encore.isProduction())
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSingleRuntimeChunk();

module.exports = Encore.getWebpackConfig();
