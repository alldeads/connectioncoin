<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="Connecting the worlds">
    <meta name="keywords" content="Connection Coin,Coin Connection Home,Connection,Coin,Connection Coin Home,creating connection">

    @auth
        <meta name="user-id" content="{{ auth()->id() }}">
    @endauth

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('images/icons/connection.ico') }}" rel="icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
    <style type="text/css">
        .badge-notify{
           background: red;
           position:relative;
           top: -15px;
           left: -8px;
        }

        .list-group-item {
            width: 350px;
        }

        #notification {
            z-index: 2;
            position: absolute;
        }


        .connection_emoji {
            width: 45px;
            padding-bottom: 15px;
        }

          #arrow a span {
              position: absolute;
              margin-top: 110%;
              top: 0;
              left: 50%;
              width: 24px;
              height: 24px;
              margin-left: -12px;
              border-left: 1px solid #fff;
              border-bottom: 1px solid #fff;
              -webkit-transform: rotate(-45deg);
              transform: rotate(-45deg);
              -webkit-animation: sdb07 2s infinite;
              animation: sdb07 2s infinite;
              opacity: 0;
              box-sizing: border-box;
            }
            #arrow a span:nth-of-type(1) {
                border-color: black;
              -webkit-animation-delay: 0s;
              animation-delay: 0s;
            }
            #arrow a span:nth-of-type(2) {
              top: 16px;
              border-color: black;
              -webkit-animation-delay: .15s;
              animation-delay: .15s;
            }
            #arrow a span:nth-of-type(3) {
              top: 32px;
              border-color: black;
              -webkit-animation-delay: .3s;
              animation-delay: .3s;
            }
            @-webkit-keyframes sdb07 {
              0% {
                opacity: 0;
              }
              50% {
                opacity: 1;
              }
              100% {
                opacity: 0;
              }
            }
            @keyframes sdb07 {
              0% {
                opacity: 0;
              }
              50% {
                opacity: 1;
              }
              100% {
                opacity: 0;
              }
            }
    </style>
    @yield('css')
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                <div class="row">
                    <div class="col-md-12 col-md-12 col-lg-12 col-sm-12 col-12" style="background-color: #0085ad !important;">
                        <img width="100%" src="{{ asset('images/connectioncoin_logo.png') }}" alt="">
                    </div>

                    <div class="col-md-12 col-lg-12 col-sm-12 col-12 text-center py-4">
                        <h5> <a id="aboutLink" href="#"> Learn More</a></h5>
                        <h4> Received a Coin?</h4>
                        <p><a href="{{ route('connections.create') }}" style="background-color: #0085ad; border-radius: 100px; color: white; width: 230px;" class="btn btn-lg btn-default"> Click Here</a></p>
                        <h4> Want to Connect?</h4>
                        <p>
                            <a href="https://store.connectioncoin.com" style="background-color: #0085ad; border-radius: 100px; color: white; width: 230px; border-color: #0085ad;" class="btn btn-lg btn-info">
                                    Get Coins Here
                            </a>
                        </p>

                        <br>

                        <h5> Connect with others. Change the World.</h5>
                        <a href="{{ route('login') }}" style=" border-radius: 100px; color: white; width: 230px; margin-bottom: 10px; color: #0085ad;  border-color: #0085ad;" class="btn btn-lg btn-default"> Sign Up/Login</a>
                    </div>
                </div>

                <div class="row" style="background-color: #0085ad !important;">
                    <div class="col-lg-6 col-md-6 col-6" style="margin: auto;">
                        <a href="#" class="d-block mb-4 h-100">
                            <img width="100%" src="{{ asset('images/connectioncoin_logo.png') }}" alt="">
                          </a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6" style="margin: auto; padding: 0px; margin-bottom: -24px;">
                        <a href="#" class="d-block mb-4 h-100">
                            <img width="100%" src="{{ asset('images/home/3.jpg') }}" alt="">
                          </a>
                    </div>

                    <div class="col-lg-6 col-md-6 col-6" style="margin: auto; padding: 0px;margin-bottom: -24px;">
                        <a href="#" class="d-block mb-4 h-100">
                            <img width="100%" src="{{ asset('images/home/6.jpg') }}" alt="">
                          </a>
                    </div>

                    <div class="col-lg-6 col-md-6 col-6" style="margin: auto; padding: 0px; margin-bottom: -24px;">
                        <a href="#" class="d-block mb-4 h-100">
                            <img width="100%" src="{{ asset('images/home/7.jpg') }}" alt="">
                          </a>
                    </div>
                </div>

                <div id="arrow">
                    <a id="scroll" href="#content"><span></span><span></span><span></span></a>
                </div>

                <div id="content">
                    @foreach ($stories as $story)
                        @if( strlen( $story->title ) != 0 && strlen( $story->description ) != 0 )
                            <div class="row justify-content-center">
                                <div class="col-md-12 py-2 col-sm-12">
                                    <div class="panel shadow" style="background-color:white; margin-bottom: 12px; border-radius: 1.5%;">
                                        <div class="fotorama" data-fit="cover" data-arrows="true" data-click="true" data-swipe="false" data-ratio="800/800" data-width="100%" style="border-radius: 1.5%;">
                                          @foreach( $story->images as $image )
                                              <img src="{{ $image->getCompressImage( $image->filepath ) }}" class="card-img-top" alt="{{ $story->title }}">
                                          @endforeach
                                        </div>
                                    
                                        <div class="card h-100 shadow">
                                            <div class="card-body">
                                                @include('shared.user-connection-lists')
                                                <a href="{{ route('stories.show', ['story' => $story->id]) }}" class="custom-card">
                                                  <h5 class="card-title">{{ $story->title }}</h5>
                                                  <p class="card-text">{!! $story->theDescription !!}</p>
                                                </a>
                                                @include('layouts._emotions', ['story' => $story])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="modal fade" id="aboutus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">About Us</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <p>Welcome to Connection Coin, a community of people who believe intentional, positive connections between friends, co-workers and even strangers can change the world.</p>

                                <p>Through Connection Coin you can give, receive and track coins with positive sayings and unique pin numbers as they pass from person to person spreading positivity, love, and encouragement. Think of "paying it forward" that is trackable! Our goal is that each coin in circulation is passed again and again, creating countless positive face to face connections for people from all over the world. We hope to inspire a return to real life interactions by sharing and celebrating the stories and moments of connection on our news feed. </p>

                                <p style="font-weight:bolder;"><b>Received a coin?</b></p>
                                <p>We can't wait to hear about your connection! Click the "Create Connection" button and enter the number and phrase of the coin you received. Share the story of how you received the coin and a picture that tells the story of the connection. This information will show up in the connections news feed on our site with all of the other connections being made. Be sure to create your profile to track where the coin goes and include a cover picture, bio and links to your social media if you like. Now it's your turn to pass the coin to the next person! Want to create even more connections? Follow steps below!</p>

                                <p style="font-weight:bolder;"><b>Ready to join the community and start giving out coins?</b></p>
                                <p>Click the "Get Coins Here" button and order your Starter Pack. When you receive your coins in the mail, visit ConnectionCoin.com to register each coin on your profile. Now you're the catalyst, giving out coins and creating new connections with each coin you share! Be sure to encourage the person who receives the coin from you to log the story of the connection on ConnectionCoin.com before passing it along. On your profile you can track each coin and count how many connections you help create. Watch as your coins travel across the globe and remember to get your coin refill packs to keep the good vibes flowing!</p>

                                <p>Check out the <a href="https://www.youtube.com/channel/UCwwtAQ4HgzCB8UX-xvIUOlA">Connection Coin YouTube page</a> for directions on how to register your coins, tips for giving them out, the story behind Connection Coin and more! Tag us @connectioncoin on social media and watch as we share amazing stories of people like you creating beautiful connections all over the world! </p>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    {{ $stories->links() }}
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        $(function() {
            $("#aboutLink").on('click', function () {
                $('#aboutus').modal('show')
            });

          $('#scroll').on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
          });
        });
    </script>

</body>
</html>
