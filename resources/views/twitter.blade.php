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
                                             <li data-menuanchor="connection" class="list-group-item"><a href="#connection">CONNECTION</a></li>
                                             <li data-menuanchor="about" class="list-group-item"><a href="#about">ABOUT</a></li>
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
                                        <p class="text-dark size-sm">
                                            <a href="{{ route('stories.index') }}">
                                                <img id="img-logo" src="{{ asset('images/app_icon.png') }}" width="450">
                                            </a>
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
                                        <h1 class="text-dark mb-3 cambon">We believe in positivity, doing good, saying Hi - and any real moment where people can look each other in the eye and connect. </h1>

                                        <a href="#about" class="pill-button mt-3 mb-lg-0">Learn More</a>
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
                                <p class="text-dark">Connection</p>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="hero-content text-center">
                                        <h1 class="text-dark mb-3 cambon"> What is <span style="color: #0085ad;">Connection</span>?</h1>

                                        <p class="text-dark mb-3 text-justify">It’s an unexpected laugh together. The biggest hug ever. When you realize you’re both from the same hometown that’s 800 miles from here. Telling another person you believe in her. A high five. A smile. Sitting down on the curb beside a stranger. Moving your books so someone else can sit down to study. <b>It’s a return to real-life interaction</b>.</p>
                                        <p class="text-dark mb-3 text-justify">Connection is delicate and mighty; finite and expansive; detailed and abstract; scientific and unexplainable. 
                                        </p>
                                        <p class="text-dark mb-3 text-justify">It’s that special feeling when two hearts align or when two souls meet. When people choose to elevate and inspire each other. <b>It’s human magic</b>.</p>
                                        <p class="text-dark mb-3 text-center"> <b>Connection Coin is a movement committed to bringing more of all these good vibes to our world.</b>
                                        </p>
                                        <a href="#about" class="pill-button mt-3 mb-lg-0">How does it work?</a>
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
                                <div class="col-lg-6">
                                    <div class="hero-content text-center">
                                        <h1 class="text-dark mb-3 cambon1"> Are you a <span style="color: #0085ad;">Connector</span>?</h1>

                                        <p class="text-dark mb-3 cambon1"> Start sharing your power of connection - by giving coins to others.
                                        </p>

                                        <a href="#" data-toggle="modal" data-target="#connectorcoin" class="pill-button mt-3 mb-lg-0">Get coins</a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="hero-content text-center">
                                        <h1 class="text-dark mb-3 cambon1"> Received a <span style="color: #0085ad;">Coin</span>?</h1>

                                        <p class="text-dark mb-3 cambon1"> We’re so glad you’re here! Here’s what you need to do now. 
                                        </p>

                                        <a href="#" data-toggle="modal" data-target="#receivedcoin" class="pill-button mt-3 mb-lg-0">Learn more</a>
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
                                <div class="col-lg-7 col-sm-12 col-md-12">
                                    <div class="text-left">
                                        <h2 class="text-dark">See The <span class="base-color">Connections</span></h2>
                                        <p class="text-muted mt-1">Connection Coins are being shared in real life all over the WORLD</p>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-sm-12 col-md-12">
                                    <div class="text-center">
                                        <a href="{{ route('stories.index') }}" class="pill-button mt-3 mb-lg-0">See The Connections</a>
                                    </div>
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

            <!--    Hero Start    -->
            <section class="section pp-scrollable hero hero-01" id="about" data-navigation-color="#fff" data-navigation-tooltip="ABOUT US" data-background-image="">
                <div class="display-table">
                    <div class="display-content">
                        <div class="container">
                            <div class="title-small">
                                <p class="text-dark">About Us</p>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="hero-content text-center">
                                        <h1 class="text-dark mb-3 cambon"> About <span style="color: #0085ad;">Us</span></h1>

                                        <p class="text-dark mb-3 text-center">Welcome to Connection Coin, a community of people who believe intentional, positive connections between friends, co-workers and even strangers can change the world.</p>

                                        <p class="text-dark mb-3 text-center">Through Connection Coin you can give, receive and track coins with positive sayings and unique pin numbers as they pass from person to person spreading positivity, love, and encouragement. Think of "paying it forward" that is trackable! Our goal is that each coin in circulation is passed again and again, creating countless positive face to face connections for people from all over the world. We hope to inspire a return to real life interactions by sharing and celebrating the stories and moments of connection on our news feed.
                                        </p>

                                        <a href="#coin" class="pill-button mt-3 mb-lg-0">Get started</a><br/>

                                        <a href="#founder" class="pill-button mt-3 mb-lg-0">Message from our founder</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--    Hero End    -->

            <!--    Hero Start    -->
            <section class="section pp-scrollable hero hero-01" id="founder" data-navigation-color="#fff" data-navigation-tooltip="Founder" data-background-image="">
                <div class="display-table">
                    <div class="display-content">
                        <div class="container">
                            <div class="title-small">
                                <p class="text-dark">Message</p>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="hero-content text-center">
                                        <h1 class="text-dark mb-3 cambon"> Message from our <span style="color: #0085ad;">Founder</span></h1>

                                        <p class="text-dark mb-3 text-center">It all started with a $2 bill.</p>

                                        <p class="text-dark mb-3 text-center">
                                            Several years ago I was going through a tough time, and my best friend Jason gave me a $2
                                            bill. Someone had given it to Jason when he needed it and now it was his turn to pass it on and
                                            he gave it to me. It was positivity, love, and good vibes - a nod to hang in there, to stay
                                            connected, to remember we’re here for each other.
                                        </p>

                                        <p class="text-dark mb-3 text-center">
                                            Some time later, I was walking out of a grocery store and noticed a girl sitting on a bench and I
                                            could tell that she was upset. I simply asked if I could sit down next to her to see if she was ok.
                                            She told me her entire story and the struggle she was going through. In that moment, I
                                            remembered that I had the $2 bill in my wallet from when Jason gave it to me. I took it out and
                                            gave it to her. She was so moved that she broke down in tears and I found myself hugging a
                                            total stranger, both of us wiping away tears from the moment we were sharing. Tears of
                                            support, love and the power of human connection.
                                        </p>

                                        <p class="text-dark mb-3 text-center">
                                            Inspired by these special and personal experiences, I wanted to find a way to inspire more real
                                            life connections. I wanted to be able to know who she gave the $2 bill to next. I wanted to be
                                            able to check in on her. I wanted more moments of connection like this with friends and
                                            strangers, but there wasn’t a platform to do it. This led me to launching Connection Coin in
                                            2019.
                                        </p>

                                        <p class="text-dark mb-3 text-center">
                                            I believe that in each of us lies the power to change the world. If we can connect with another
                                            person, lift them up, love them, support them when they need it, or simply see them for the
                                            amazing person they are, then we have created a ripple. A ripple that can help build a never
                                            ending wave of positivity, kindness and inspiration. That is why we have those 3 powerful
                                            words on each coin. The hope that each day you will carry a coin with you. Looking for a
                                            moment to connect. With anyone and with everyone. To share a smile, to share a laugh and to
                                            feel to witness the amazing way you can change the world by connecting with the people right
                                            in front of you.
                                        </p>

                                        <p class="text-dark mb-3 text-center">
                                            We are all in this journey together. It is going to be more powerful, more meaningful and there
                                            will be more laughs and smiles along the way if we do it together.
                                            Big love, Court
                                        </p>

                                        <p class="text-dark mb-3 text-center">
                                            To see the video of me sharing the $2 bill story at the Connection Coin launch party here it is:
                                            <br><a href="https://www.youtube.com/watch?v=GTt5fVvXhKg&t=325s" target="_blank">https://www.youtube.com/watch?v=GTt5fVvXhKg&t=325s</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--    Hero End    -->

            <!--    Hero Start    -->
            <section class="section pp-scrollable hero hero-01" id="faq" data-navigation-color="#fff" data-navigation-tooltip="FAQ" data-background-image="">
                <div class="display-table">
                    <div class="display-content">
                        <div class="container">
                            <div class="title-small">
                                <p class="text-dark">FAQ</p>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="hero-content text-center">
                                        <h1 class="text-dark mb-3 cambon"> Frequently Asked <span style="color: #0085ad;">Questions</span></h1>

                                        <p class="text-dark mb-3 text-center">
                                            The goal of Connection Coin is to bring us all closer together. With that in mind, here is a bit more about who we are and more importantly, who we are not
                                        </p>

                                        <div class="accordion" id="accordionExample">
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                    <h5 class="mb-0">
                                                        <button style="color: black; text-decoration: none;" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            How do I make a post?
                                                        </button>
                                                    </h5>
                                                </div>

                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                         The only way a post can be made is when two people connect. Our mission is to celebrate the
                                                        shared human experience, so posts only happen when you connect with someone and have the coin information to enter.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <h5 class="mb-0">
                                                        <button style="color: black; text-decoration: none;" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                            Do I have to give the coin to a stranger?
                                                        </button>
                                                    </h5>
                                                </div>

                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        Simply put, no. A coin is your opportunity to create a moment of connection. It
                                                        could be a family member or long time friend. Our mission is to foster real, face to face connections in whatever form
                                                        feels right for you.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header" id="headingThree">
                                                    <h5 class="mb-0">
                                                        <button style="color: black; text-decoration: none;" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                            What personal information do I have to share?
                                                        </button>
                                                    </h5>
                                                </div>

                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        You share as much or little about yourself as you want. We just ask that
                                                        you share a name and hopefully a profile pic. If you want to link to your other social media accounts, or leave a detailed
                                                        bio that’s great! Our goal is to help you connect with others and vise versa in a way that feels safe and comfortable.
                                                        Anyone who abuses this platform with negativity or harassment will be removed.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header" id="headingFour">
                                                    <h5 class="mb-0">
                                                        <button style="color: black; text-decoration: none;" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                                            What do you do with my information?
                                                        </button>
                                                    </h5>
                                                </div>

                                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        Nothing. We do not sell, share, or link your information to any 3rd parties.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header" id="headingFive">
                                                    <h5 class="mb-0">
                                                        <button style="color: black; text-decoration: none;" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                                            The coin locations are shared, how does that work? 
                                                        </button>
                                                    </h5>
                                                </div>

                                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                         When a connection is made, the person receiving a coin shares
                                                        “where” the connection happened. We use that information to drop a pin on the map. Neither the coin, nor your
                                                        location is being tracked by Connection Coin. We do want, nor desire to track movements, just want to share where
                                                        each moments of connection took place!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--    Hero End    -->

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

        <div class="modal fade" tabindex="-1" role="dialog" id="receivedcoin">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Received a coin?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-dark mb-3 text-justify">We can't wait to hear about your connection!</p>
                        <p class="text-dark mb-3 text-justify"> Click the "Create Connection" button and enter the number and phrase of the coin you received. </p>
                        <p class="text-dark mb-3 text-justify">Share the story of how you received the coin and a picture that tells the story of the connection. This information will show up in the connections news feed on our site with all of the other connections being made. Be sure to create your profile to track where the coin goes and include a cover picture, bio and links to your social media if you like.</p> Now it's your turn to pass the coin to the next person! Want to create even more connections? Follow steps below!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="connectorcoin">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Are you a Connector?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-dark mb-3 text-justify"> Ready to join the community and start giving out coins?</p>

                        <p class="text-dark mb-3 text-justify"> Click the <a href="https://store.connectioncoin.com">"Get Coins Here"</a> button and order your Starter Pack. When you receive your coins in the mail, visit ConnectionCoin.com to register each coin on your profile. Now you're the catalyst, giving out coins and creating new connections with each coin you share! Be sure to encourage the person who receives the coin from you to log the story of the connection on ConnectionCoin.com before passing it along. On your profile you can track each coin and count how many connections you help create. Watch as your coins travel across the globe and remember to get your coin refill packs to keep the good vibes flowing!
                                    </p>

                        <p class="text-dark text-justify"> Check out the <a href="https://www.youtube.com/channel/UCwwtAQ4HgzCB8UX-xvIUOlA">Connection Coin YouTube page</a> for directions on how to register your coins, tips for giving them out, the story behind Connection Coin and more! Tag us @connectioncoin on social media and watch as we share amazing stories of people like you creating beautiful connections all over the world!
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


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