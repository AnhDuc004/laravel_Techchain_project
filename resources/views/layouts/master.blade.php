<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>Gym Store | Healthy & Beauty</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="This is meta description">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Hugo 0.74.3" />

    <!-- theme meta -->
    <meta name="theme-name" content="reader" />

    <!-- plugins -->
    <link rel="stylesheet" href="theme/client/plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="theme/client/plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="theme/client/plugins/slick/slick.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="theme/client/css/style.css" media="screen">

    <!--Favicon-->
    <link rel="shortcut icon" href="theme/client/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="theme/client/images/favicon.png" type="image/x-icon">

    <meta property="og:title" content="Reader | Hugo Personal Blog Template" />
    <meta property="og:description" content="This is meta description" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:updated_time" content="2020-03-15T15:40:24+06:00" />
</head>
<style>
    body {
        font-family: 'Inter UI', sans-serif;
        margin: 0;
        padding: 100px;
    }

    .page {
        background: #eeebeb;
        display: flex;
        flex-direction: column;
        place-content: center;
        position: relative;
        width: calc(100% - 400px);
        height: calc(100% - 400px);
    }

    .container {
        display: flex;
        margin: 0 auto;
    }

    @media (max-width: 767px) {
        .container {
            flex-direction: column;
            height: 630px;
            width: 320px;
        }
    }

    .left {

        height: calc(100% - 40px);
        top: 20px;
        position: relative;
        width: 50%;
    }

    .eula {
        color: #999;
        font-size: 14px;
        line-height: 1.5;
        margin: 40px;
    }

    .login {
        font-size: 50px;
        font-weight: 900;
        margin: 50px 40px 40px;
    }

    .right {
        position: relative;
        width: 50%;
    }
</style>

<body>
    <!-- navigation -->
    @include('layouts.header')
    <!-- /navigation -->

    <!-- start of banner -->
    @include('layouts.banner')
    <!-- end of banner -->
    {{-- <section class="section pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5">
                    <h2 class="h5 section-title">Editors Pick</h2>
                    <article class="card">
                        <div class="post-slider slider-sm">
                            <img src="theme/client/images/post/post-1.jpg" class="card-img-top" alt="post-thumb">
                        </div>

                        <div class="card-body">
                            <h3 class="h4 mb-3"><a class="post-title" href="post-details.html">Use apples to give
                                    your bakes caramel and a moist texture</a></h3>
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a href="author-single.html" class="card-meta-author">
                                        <img src="theme/client/images/john-doe.jpg">
                                        <span>Charls Xaviar</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-timer"></i>2 Min To Read
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-calendar"></i>14 jan, 2020
                                </li>
                                <li class="list-inline-item">
                                    <ul class="card-meta-tag list-inline">
                                        <li class="list-inline-item"><a href="tags.html">Color</a></li>
                                        <li class="list-inline-item"><a href="tags.html">Recipe</a></li>
                                        <li class="list-inline-item"><a href="tags.html">Fish</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <p>It’s no secret that the digital industry is booming. From exciting startups to …</p>
                            <a href="post-details.html" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 mb-5">
                    <h2 class="h5 section-title">Trending Post</h2>

                    <article class="card mb-4">
                        <div class="card-body d-flex">
                            <img class="card-img-sm" src="theme/client/images/post/post-3.jpg">
                            <div class="ml-3">
                                <h4><a href="post-details.html" class="post-title">Advice From a Twenty Something</a>
                                </h4>
                                <ul class="card-meta list-inline mb-0">
                                    <li class="list-inline-item mb-0">
                                        <i class="ti-calendar"></i>14 jan, 2020
                                    </li>
                                    <li class="list-inline-item mb-0">
                                        <i class="ti-timer"></i>2 Min To Read
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>

                    <article class="card mb-4">
                        <div class="card-body d-flex">
                            <img class="card-img-sm" src="theme/client/images/post/post-2.jpg">
                            <div class="ml-3">
                                <h4><a href="post-details.html" class="post-title">The Design Files - Homes
                                        Minimalist</a></h4>
                                <ul class="card-meta list-inline mb-0">
                                    <li class="list-inline-item mb-0">
                                        <i class="ti-calendar"></i>14 jan, 2020
                                    </li>
                                    <li class="list-inline-item mb-0">
                                        <i class="ti-timer"></i>2 Min To Read
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>

                    <article class="card mb-4">
                        <div class="card-body d-flex">
                            <img class="card-img-sm" src="theme/client/images/post/post-4.jpg">
                            <div class="ml-3">
                                <h4><a href="post-details.html" class="post-title">The Skinny Confidential</a></h4>
                                <ul class="card-meta list-inline mb-0">
                                    <li class="list-inline-item mb-0">
                                        <i class="ti-calendar"></i>14 jan, 2020
                                    </li>
                                    <li class="list-inline-item mb-0">
                                        <i class="ti-timer"></i>2 Min To Read
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4 mb-5">
                    <h2 class="h5 section-title">Popular Post</h2>

                    <article class="card">
                        <div class="post-slider slider-sm">
                            <img src="theme/client/images/post/post-5.jpg" class="card-img-top" alt="post-thumb">
                        </div>
                        <div class="card-body">
                            <h3 class="h4 mb-3"><a class="post-title" href="post-details.html">How To Make Cupcakes
                                    and Cashmere Recipe At Home</a></h3>
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a href="author-single.html" class="card-meta-author">
                                        <img src="theme/client/images/kate-stone.jpg" alt="Kate Stone">
                                        <span>Kate Stone</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-timer"></i>2 Min To Read
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-calendar"></i>14 jan, 2020
                                </li>
                                <li class="list-inline-item">
                                    <ul class="card-meta-tag list-inline">
                                        <li class="list-inline-item"><a href="tags.html">City</a></li>
                                        <li class="list-inline-item"><a href="tags.html">Food</a></li>
                                        <li class="list-inline-item"><a href="tags.html">Taste</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <p>It’s no secret that the digital industry is booming. From exciting startups to …</p>
                            <a href="post-details.html" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </article>
                </div>
                <div class="col-12">
                    <div class="border-bottom border-default"></div>
                </div>
            </div>
        </div>
    </section> --}}
    @include('layouts.products')

    @yield('content')

    @include('layouts.footer')

</html>
