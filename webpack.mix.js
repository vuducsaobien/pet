const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
// Combine css
mix.combine(
    [
        "public/news/css/main_styles.css",
        "public/news/css/responsive.css",
        "public/news/css/my-style.css"
    ],
    "public/news/css/combine-all.min.css"
);

// Combine js
mix.combine(
    [
        "public/news/js/jquery-3.2.1.min.js",
        "public/news/css/bootstrap-4.1.2/popper.js",
        "public/news/css/bootstrap-4.1.2/bootstrap.min.js",
        "public/news/js/greensock/TweenMax.min.js",
        "public/news/js/greensock/TimelineMax.min.js",
        "public/news/js/greensock/animation.gsap.min.js",
        "public/news/js/greensock/ScrollToPlugin.min.js",
        "public/news/js/OwlCarousel2-2.2.1/owl.carousel.js",
        "public/news/js/easing/easing.js",
        "public/news/js/parallax-js-master/parallax.min.js",
        "public/news/js/mustache.min.js",
        "public/news/js/custom.js",
        "public/news/js/my-js.js",
    ],
    "public/news/js/combine-all.min.js"
);