<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Connection Coin</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="Retrina group" />

        <!--  FavIcon  -->
        <link rel="shortcut icon" href="{{ asset('images/icons/connection.ico') }}">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Muli:400,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">

        <!--  bootstrap Css  -->
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <!--  pagepiling Css  -->
        <link rel="stylesheet" type="text/css" href="assets/css/jquery.pagepiling.css" />
        <!--  LineIcon Css  -->
        <link rel="stylesheet" href="assets/css/LineIcons.css">
        <!--  MagnificPopup Css  -->
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <!--  OwlCarousel Css  -->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <!--  Custom Style CSS  -->
        <link rel="stylesheet" href="assets/css/style.css">

    </head>
    <body class="pilling-page"  data-spy="scroll" data-target="#scrollspy" data-offset="1">

        <!--  Pre Loader  -->
        <div id="overlayer">
            <span class="spinner-grow spinner-grow-lg loader" role="status" aria-hidden="true"></span>
        </div>

        <!--  Page Pilling  Strat  -->
         <div id="pagepiling" class="pagepiling">

             <!--   Header Start -->
             <header>
                 <div class="logo-area">
                     <a href="/" class="logo">
                         <img src="{{ asset('images/app_icon.png') }}" width="250">
                     </a>
                 </div>
                 <div class="header-info-area">
                     <a class="overlay-menu-toggler lni-menu size-md" href="javascript:void(0);"></a>
                     <!--    Overlay Menu Start    -->
                     <div class="overlay-menu bg-blue py-3 px-4 text-center center-item">
                         <!-- Overlay Menu -->
                         <div id="scrollspy" class="overlay-menu-list">
                             <div class="container">
                                 <div class="row">
                                     <div class="col-lg-8 offset-lg-2 overlay-nav">
                                         <ul class="list-group text-left" id="myMenu">
                                             <li data-menuanchor="home" class="list-group-item"><a href="#home">HOME</a></li>
                                             <li data-menuanchor="story" class="list-group-item"><a href="#story">OUR STORY</a></li>
                                             <li data-menuanchor="connection" class="list-group-item"><a href="#connection">CONNECTION COIN</a></li>
                                             <li data-menuanchor="connector" class="list-group-item"><a href="#connector">CONNECTOR</a></li>
                                             <li data-menuanchor="coin" class="list-group-item"><a href="#coin">COIN</a></li>
                                             <li data-menuanchor="stories" class="list-group-item"><a href="#stories">STORIES</a></li>
                                         </ul>
                                         <ul class="list-group contact-info text-left mb-0">
                                             <li class="list-group-item"><span>Contact Info :</span></li>
                                             <li class="list-group-item"><span><i class="lni-map-marker"></i> NY 10018, USA</span></li>
                                             <li class="list-group-item"><span><i class="lni-phone-handset"></i> +1 212-695-1962</span></li>
                                             <li class="list-group-item"><span><i class="lni-envelope"></i> admin@connectioncoin.com</span></li>
                                             <li class="list-group-item"><span>Follow me :</span></li>
                                             <li class="list-group-item">
                                                 <ul class="list-inline socails">
                                                    <li class="list-inline-item"><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i class="lni-twitter-filled"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i class="lni-github-original"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i class="lni-linkedin-original"></i></a></li>
                                                </ul>
                                             </li>
                                         </ul>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!--    Overlay Menu End    -->
                 </div>
             </header>
             <!--   Header End   -->

            <!--    Hero Start    -->
            <section class="section pp-scrollable hero hero-01" id="home" data-navigation-color="#fff" data-navigation-tooltip="HOME" data-background-image="">
                <div class="display-table">
                    <div class="display-content">
                        <div class="container">
                            <div class="title-small">
                                <p class="text-dark">Home</p>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="hero-content text-center">
                                        <p> 
                                            <img src="{{ asset('images/app_icon.png') }}" width="300">
                                        </p>
                                        <h1 class="text-dark mb-3 cambon">A movement of humans who believe that the magic of real-life connection has the power to uplift, elevate, and inspire.</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--    Hero End    -->

            <!--    Hero Start    -->
            <section class="section pp-scrollable hero hero-01" id="story" data-navigation-color="#fff" data-navigation-tooltip="STORY" data-background-image="">
                <div class="display-table">
                    <div class="display-content">
                        <div class="container">
                            <div class="title-small">
                                <p class="text-dark">Our Story</p>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="hero-content text-center">
                                        <h1 class="text-dark mb-3 cambon">We believe in positivity, doing good, saying thank you - and any real moment where people can look each other in the eye and connect. </h1>
                                        <a href="javascript:void(0);" class="pill-button mt-3 mb-lg-0">See the stories</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--    Hero End    -->

            <!--    Hero Start    -->
            <section class="section pp-scrollable hero hero-01" id="connection" data-navigation-color="#fff" data-navigation-tooltip="CONNECTION" data-background-image="">
                <div class="display-table">
                    <div class="display-content">
                        <div class="container">
                            <div class="title-small">
                                <p class="text-dark">Connection Coin</p>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="hero-content text-center">
                                        <h1 class="text-dark mb-3 cambon"> What is <span style="color: #0085ad;">Connection</span>?</h1>

                                        <p class="text-dark mb-3 text-justify">It’s an unexpected laugh together. The biggest hug ever. When you realize you’re both from the same hometown that’s 800 miles from here. Telling another person you believe in her. A high five. A smile. Sitting down on the curb beside a stranger. Moving your books so someone else can sit down to study. It’s a return to real-life interaction.</p>
                                        <p class="text-dark mb-3 text-justify">Connection is delicate and mighty; finite and expansive; detailed and abstract; scientific and unexplainable. 
                                        </p>
                                        <p class="text-dark mb-3 text-justify">It’s that special feeling when two hearts align or when two souls meet. When people choose to elevate and inspire each other. It’s human magic.</p>
                                        <p class="text-dark mb-3 text-justify"> Connection Coin is a movement committed to bringing more of all these good vibes to our world.
                                        </p>
                                        <a href="javascript:void(0);" class="pill-button mt-3 mb-lg-0">See the stories</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--    Hero End    -->

            <!--    Hero Start    -->
            <section class="section pp-scrollable hero hero-01" id="connector" data-navigation-color="#fff" data-navigation-tooltip="CONNECTOR" data-background-image="">
                <div class="display-table">
                    <div class="display-content">
                        <div class="container">
                            <div class="title-small">
                                <p class="text-dark">Connector</p>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="hero-content text-center">
                                        <h1 class="text-dark mb-3 cambon"> Are you a <span style="color: #0085ad;">Connector</span>?</h1>

                                        <p class="text-dark mb-3 cambon"> Start sharing your power of connection - by giving coins to others.
                                        </p>

                                        <a href="https://store.connectioncoin.com" class="pill-button mt-3 mb-lg-0">Get Coins</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--    Hero End    -->

            <!--    Hero Start    -->
            <section class="section pp-scrollable hero hero-01" id="coin" data-navigation-color="#fff" data-navigation-tooltip="COIN" data-background-image="">
                <div class="display-table">
                    <div class="display-content">
                        <div class="container">
                            <div class="title-small">
                                <p class="text-dark">Coin</p>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="hero-content text-center">
                                        <h1 class="text-dark mb-3 cambon"> Received a <span style="color: #0085ad;">Coin</span>?</h1>

                                        <p class="text-dark mb-3 cambon"> We’re so glad you’re here! Here’s what you need to do now. 
                                        </p>

                                        <a href="{{ route('stories.create') }}" class="pill-button mt-3 mb-lg-0">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--    Hero End    -->

            <!--   Blog Start   -->
            <section id="stories" class="section pp-scrollable blog" data-navigation-color="#fff" data-navigation-tooltip="STORIES">
                <div class="display-table">
                    <div class="display-content">
                        <div class="container">
                            <div class="row">
                                <div class="title-small">
                                    <p class="text-dark">Stories</p>
                                </div>
                                <div class="col-9">
                                    <div class="text-left">
                                        <h2 class="text-dark">Track The <span class="base-color">Impact</span></h2>
                                        <p class="text-muted mt-1">Connection Coins are being shared in real life all over the WORLD</p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <a href="{{ route('stories.index') }}" class="pill-button mt-3 mb-lg-0">See The Stories</a>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <!-- Item-01 -->
                                @foreach( $stories as $story )
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="blog-item">
                                            <div class="image-blog">
                                                <img src="{{ $story->images[0]->getCompressImage( $story->images[0]->filepath ) }}" alt="/" class="img-fluid rounded-top">
                                            </div>
                                            <div class="blog-content rounded-bottom text-left p-3">
                                                <h5 class="mb-0 mt-3"><a href="javascript:void(0)" data-toggle="modal" data-target="#blog-single" class="text-dark font-weight-light">{{ $story->title }}</a></h5>
                                                <ul class="list-inline mt-3">
                                                    <li class="list-inline-item">
                                                        <a href="#">
                                                            <i class="base-color font-weight-bold">by</i>
                                                            <span class="text-dark font-italic">{{ $story->user->first_name }}</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <p class="text-muted mt-3">{{ substr($story->description , 0, 75) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--   Blog End   -->

             <!--   Footer Start   -->
             <div id="footer" class="section pp-scrollable footer" data-navigation-color="#fff" data-navigation-tooltip="FOOTER" data-background-image="">
                 <div class="container-fluid">
                     <div class="row py-6">
                         <div class="title-small">
                             <p class="text-dark">Footer</p>
                         </div>
                         <div class="text-center m-auto">
                             <p class="text-dark size-sm">
                                 <img src="{{ asset('images/app_icon.png') }}" width="250">
                             </p>
                             <ul class="list-inline socails">
                                 <li class="list-inline-item"><a class="text-white" href="#"><i class="lni-facebook-filled text-dark mr-2"></i></a></li>
                                 <li class="list-inline-item"><a class="text-white" href="#"><i class="lni-twitter-filled text-dark mr-2"></i></a></li>
                                 <li class="list-inline-item"><a class="text-white" href="#"><i class="lni-github-original text-dark mr-2"></i></a></li>
                                 <li class="list-inline-item"><a class="text-white" href="#"><i class="lni-linkedin-original text-dark mr-2"></i></a></li>
                             </ul>
                             <p class="pl-3 text-dark">Copyright © 2020. Connection Coin.</p>
                         </div>
                     </div>
                 </div>
             </div>
             <!--   Footer End   -->

             <!--   Color Scheme  -->
             <a class="color-scheme text-white bg-base-color d-inline-block" href="javascript:void(0)"><i class="lni-night"></i></a>

        </div>
        <!--  Page Pilling  End -->


        <!--  JavaScripts  -->
        <script src="assets/js/jquery-3.4.1.min.js"></script>
        <!--   Page Pilling Js     -->
        <script src="assets/js/jquery.pagepiling.js"></script>
        <!--  Bootstrap Js  -->
        <script src="assets/js/bootstrap.js"></script>
        <!--  Typed Js  -->
        <script src="assets/js/typed.js"></script>
        <!--  Count Js  -->
        <script src="assets/js/jquery.countTo.js"></script>
        <!--  Isotope Js  -->
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <!--  Pop UP JS  -->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <!--  Owl carousel Js  -->
        <script src="assets/js/owl.carousel.min.js"></script>
        <!-- Map Js -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcmB207_E3E4SkA8jTA8FQjSWTop9YxZU"></script>
        <!--  Custom JS  -->
        <script src="assets/js/nill.js"></script>
    </body>
</html>