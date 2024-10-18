<?php
include_once 'config.php';
$counter_data = file_get_contents($url);
$arr = json_decode($counter_data, true);
//$arr['totalMined'] = 100032750;
//$totalMined=$arr['totalMined']-100;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!--common meta tag start-->
        <!--<base href="/"/>-->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Common meta end-->
        <!--meta for google search engine-->
        <meta name="title" content="Ringbit">
        <meta name="keywords" content="Ringbit, Ringid, buy Ringbit, sell Ringbit, Ringbitstore, bitcoin, bitcoin wallet, bitcoin news, bitcoin forum, buy bitcoin, sell bitcoin, bitcoin store, kin, ethereum,ringID, ringID coins,crypto currency, cryptocurrency, digital currency" />
        <meta name="robots" content="all,index,follow">
        <meta name="distribution" content="Global">
        <meta name="rating" content="Ringbit">
        <meta name="author" content="Ringbit">
        <meta name="copyright" content="Ringbit">
        <meta name="description" content="A decentralized cryptocurrency to create a borderless digital economy">
        <!--meta for google search engine end-->
        <title>ringbit | Home</title>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <!-- Google font -->
        <link href='//fonts.googleapis.com/css?family=Roboto:100,300,400,500,600' rel='stylesheet' type='text/css'>
        <!-- Bootstrap -->
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="css/font-awesome.css"/>
        <!-- owl.carousel -->
        <link type="text/css" rel="stylesheet" href="css/owl.theme.default.css"/>
        <link type="text/css" rel="stylesheet" href="css/owl.carousel.css"/>
        <!-- Custom stlyle -->
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!--top slider section-->
        <section id="home">
            <div class=" gradient-bg">
                <header  class="header">
                    <nav class="navbar">
                        <div class="container p-relative" style="max-width: 1600px;">
                            <div class="navbar-header">
                                <div class="logo">
                                    <a href="/" title="ringbit"><img style="margin-top: 14px;" src="images/lg.png" alt="logo"></a>
                                </div>
                            </div>
                            <!--  main navigation  -->
                            <ul class="nav navbar-nav navbar-right target-to hide-in-small">
                                <li class="hover-effect"><a href="#home">Home</a></li>
                                <li class="hover-effect"><a href="#generate">Generate</a></li>
                                <li class="hover-effect"><a href="#distribution">Distribution</a></li>

                                <li class="hover-effect"><a href="#supply">Supply</a></li>
                                <li class="hover-effect"><a href="#use">Use Case</a></li>
                                <li class="hover-effect"><a href="#exchange">Exchange</a></li>
                            </ul>
                            <!--main navigation -->
                            <!--mobile navigation-->
                            <div class="mobile-navigation hide-in-full">
                                <div class="nav-icon"><i class="fa fa-bars"></i></div>
                                <div id="mySidenav" class="sidenav  target-to">
                                    <div  class="close-icon"><i class="fa fa-times"></i></div>
                                    <ul class="nav navbar-nav navbar-right target-to">
                                        <li class="hover-effect"><a href="#home">Home</a></li>
                                        <li class="hover-effect"><a href="#generate">Generate</a></li>
                                        <li class="hover-effect"><a href="#distribution">Distribution</a></li>
                                        <li class="hover-effect"><a href="#supply">Supply</a></li>
                                        <li class="hover-effect"><a href="#use">Use Case</a></li>
                                        <li class="hover-effect"><a href="#exchange">Exchange</a></li>
                                    </ul>
                                    <div class="mobile-social">
                                        <a href="#"><i class="fa fa-facebook-official"></i></a>
                                        <a href="#"><i class="fa fa-twitter-square"></i></a>
                                        <a href="#"><i class="fa fa-linkedin-square"></i></a>
                                        <a href="#"><i class="fa fa-google-plus-square"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </header>
                <div class="row">
                    <div class="container" style="max-width: 1600px;">
                        <div class="col-lg-5">
                            <div class="crytotext t-a-l">
                                <div class="headline">A New Generation Cryptocurrency</div>
                                <div class="desc">A mainstream cryptocurrency to create a borderless economy for daily life transactions.</div>
                            </div>
                            <div class="btns">
                                <a href="//www.ringbit.org/images/whitepaper.pdf" target="_blank" class="header-btn read">READ WHITEPAPER</a>
                                <!--<a href="javascript:void(0);" class="header-btn read"  id="myBtn">READ WHITEPAPER</a>-->
                                <a href="//www.ringid.com/dl"  target="_blank"  class="header-btn join">START MINING</a>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="banner-right-img"><img src="images/coin.gif"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row counter-header">
                <div class="col-lg-4 one">
                    <div class="text-counter" style="height:90px;padding-top: 36px;">1 RBT = 1 USD</div>
                </div>
                <div class="col-lg-4 two">

                    <div class="text-counter"  style="height:90px;"><p style="font-size:55px;padding:20px 0;" class="count old_mined_counter" ><?php echo $arr['totalMined']; ?></p><p style="font-size:14px;">Total ringbit</p></div>
                </div>
                <div class="col-lg-4 three">
                    <div class="text-counter"  style="height:90px;"><p style="font-size:55px;padding:20px 0;" class="count old_reward_counter"><?php echo $arr['totalMined'] / 10; ?></p><p  style="font-size:14px;">Rewarded ringbit</p></div>
                </div>
            </div>
        </section>
        <!-- HEADER background image end-->
        <!-- about start-->
        <section id="generate"  class="about generation" style="background-color:#fff;">
            <div class="container" style="max-width: 1600px;">
                <!--4 column grid-->
                <div class="col-lg-5 t-a-l">
                    <div class="item" style="margin-top:70px;">
                        <div class="data-box-title data-box-title-about">Mechanism of <b><span style="color:#28AAEE; font-weight:300">ring</span><span style="color:#0071BC; font-weight:400">bit</span></b> Generation</div>
                        <div class="data-box-text car-text">
                            <p>The generation of ringbits in the ecosystem will happen in five phases. The phases will be determined by the number of users in the network</p>
                            <a href="#" class="btn pro_btn green_btn">Read More</a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-lg-7 hide360">
                    <img  src="images/generate.png">
                </div>
        </section>
        <!--about end-->
        <section id="distribution" class="distribution"  style="background-color:#f9faff;padding-top:50px;">
            <div class="section-title meet-c">
                <div class="section-title">
                    <h2 class="meet-our-c" style="border:0!important;"><b><span style="color:#28AAEE; font-weight:300">ring</span><span style="color:#0071BC; font-weight:400">bit</span></b> Generation & Distribution
                        <p style="font-size:16px;color:gray;padding-top:20px;">The following charts show the generation of ringbits by block based on the total users and its distribution</p>
                    </h2>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="data-box  mobile-box">
                            <img style="width: 80%;margin-top: 67px;" src="images/token.png">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <img   src="images/growth.png" alt="">
                        <!--                        
                        <div class="token-sale-details__distribution__item">
                            <span class="token-sale-details__distribution__item__number">1</span>
                            <p class="token-sale-details__distribution__item__text">
                                <strong>ringID – Core Development  (60%)</strong>
                                The largest portion of funds will go to completing the core development of ringID as described in the whitepaper. This includes the integration of ringbits, third party services, and more.
                            </p>
                        </div>
                        <div class="token-sale-details__distribution__item">
                            <span class="token-sale-details__distribution__item__number">2</span>
                            <p class="token-sale-details__distribution__item__text">
                                <strong>ringbit ICO – Public Sale (30%)</strong>
                                A significant portion will be made available during the Public Sale event.
                            </p>
                        </div>
                        <div class="token-sale-details__distribution__item">
                            <span class="token-sale-details__distribution__item__number">3</span>
                            <p class="token-sale-details__distribution__item__text">
                                <strong>Rewards System – User Rewards (10%)</strong>
                                The remaining portion will be distributed to users as rewards.
                            </p>
                        </div>
                        -->
                    </div>
                </div>
            </div>
        </section>


        <section id="about" class="width_adjust_mobile open-on" id="counter_expire">
            <!--<div id="particles-js" style="height:300px!important;">-->
            <div class="section-title meet-c">
                <div class="container">
                    <h2 class="meet-our-c" style="border:0!important;color:#29abe2;margin-bottom:20px;">Available from</h2>
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="meet-our-c" style="border:0!important;color:#29abe2;padding-bottom: 10px;font-size:28px;">Host Exchange</h2>
                            <div class="clearfix"></div>
                            <a class="header-btn join" href="https://www.ringid.com/dl" style="margin-top: 12px;margin-bottom: 18px; float: none; display: inline-block;">Available on ringID App</a>
                        </div>
                        <div class="col-lg-6">
                            <h2 class="meet-our-c" style="color:#29abe2;padding-bottom: 10px;font-size:28px;">ICO Market</h2>
                            <div class="clearfix"></div>
                            <h2 class="meet-our-c" style="margin:0 auto;height:96px;border:0!important;">

                                <div id="clockdiv">
                                    <div>
                                        <span id="days1"></span>
                                        <div class="smalltext">Days</div>
                                    </div>
                                    <div>
                                        <span id="hours1"></span>
                                        <div class="smalltext">Hours</div>
                                    </div>
                                    <div>
                                        <span id="minutes1"></span>
                                        <div class="smalltext">Minutes</div>
                                    </div>
                                    <div>
                                        <span id="seconds1"></span>
                                        <div class="smalltext">Seconds</div>
                                    </div>
                                </div>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <!--</div>-->
        </section>



        <section id="supply" class="static_data" style="background-color:#f9f9f9;">
            <div class="container">
                <div class="section-title">
                    <h2 class="meet-our-c" style="border:0!important;"><b><span style="color:#28AAEE; font-weight:300">ring</span><span style="color:#0071BC; font-weight:400">bit</span></b> Total Supply & Network Growth
                        <p  style="font-size:16px;color:gray;padding-top:20px;">The following charts show the growth of the network & supply of ringbits by block and the total ringbits in circulation at the end of each block</p>
                    </h2>
                </div>
                <div class="row">
                    <div class="col-lg-7 width_adjust_mobile">
                        <img  src="images/network.png" alt="">
                    </div>
                    <div class="col-lg-5">
                        <div class="data-box  mobile-box">
                            <img style="width: 80%;margin-top: 112px;" src="images/token2.png">
                        </div>
                    </div>

                </div>
            </div>
        </section>



        <section id="about" class="padd-b-20 width_adjust_mobile roadmap">
            <div class="section-title">
                <h2 class="meet-our-c" style="border:0!important;color:#fff;padding-bottom:0;">Road Map</h2>
            </div>
            <div class="container"  style="max-width:1600px;">
                <img src="images/future.png">
            </div>
        </section>


<!--        <section id="use"  class="use-of-bit about" style="background-color: #fff;">
            <div class="section-title meet-c">
                <div class="section-title">
                    <h2 class="meet-our-c" style="border:0!important;">ringbit Use Case</h2>
                </div>
            </div>
            <div class="container">
                4 column grid
                <div class="col-lg-12 t-a-l">
                    <div class="carousel-top">
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="col-lg-3 t-a-l">
                                    <img style="float:left;margin-right:10px;width:100%;min-height:300px;" src="images/use4.png">
                                </div>
                                <div class="col-lg-9 t-a-l">
                                    <div style="margin-top:0;">
                                        <div class="data-box-title  t-a-l">Flow of ringbits in Live</div>
                                        <div class="data-box-text car-text">
                                            <p>Live broadcasters may choose to broadcast to the audience for free or charge a fee to enter a Private Live Chat room. Broadcasters can accept ringbit as contributions from viewers.</p>
                                            <img style="float: left;" src="images/use1_1.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-lg-3 t-a-l">
                                    <img style="float:left;margin-right:10px;width:100%;" src="images/use5.png">
                                </div>
                                <div class="col-lg-9 t-a-l">
                                    <div style="margin-top:0;">
                                        <div class="data-box-title  t-a-l">Flow of ringbits in Ads</div>
                                        <div class="data-box-text car-text">
                                            <p>The businesses and companies are able to reach out to the target users for better conversion, while users are earning ringbits for their time and business. Let’s look at the diagram showing the exchange of ringbits by users viewing the ads</p>
                                            <img style="float: left;" src="images/use2_1.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-lg-3 t-a-l">
                                    <img style="float:left;margin-right:10px;width:100%;" src="images/use6.png">
                                </div>
                                <div class="col-lg-9 t-a-l">
                                    <div style="margin-top:0;">
                                        <div class="data-box-title  t-a-l" >Flow of ringbits in Channel</div>
                                        <div class="data-box-text car-text">
                                            <p>Now regular free content will become very attractive from the creators’ point of view due to the massive opportunities yet to come. The following diagram shows the exchange between content producers and audiences using channels</p>
                                            <img style="float: left;" src="images/use3_1.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </section>-->
        
        
        <section id="use"  class="use-of-bit about"  style="background-image:url('images/flow_bg.png');background-repeat: repeat;display:block;background-position: center center;overflow-x: hidden;background-color: #fff;">
            <div class="section-title meet-c">
                <div class="section-title">
                    <h2 class="meet-our-c" style="border:0!important;">Flow of ringbits</h2>
                </div>
            </div>
            <div class="container">
                <!--4 column grid-->
                <div class="col-lg-12 t-a-l">
                    <div class="carousel-top">
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="col-lg-7 t-a-l">
                                    <div style="margin-top:0;">
                                        <div class="data-box-title  t-a-l">Flow of ringbits in Live</div>
                                        <div class="data-box-text car-text">
                                            <p>Live broadcasters may choose to broadcast to the audience for free or charge a fee to enter a Private Live Chat room. Broadcasters can accept ringbit as contributions from viewers.</p>
                                            <br/>
                                            <img style="float: left;" src="images/u1.png">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 t-a-l">
                                    <img style="float:left;margin-right:10px;width:100%;min-height:300px;" src="images/use1.png">
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-lg-7 t-a-l">
                                    <div style="margin-top:0;">
                                        <div class="data-box-title  t-a-l" >Flow of ringbits in Channel</div>
                                        <div class="data-box-text car-text">
                                            <p>Now regular free content will become very attractive from the creators’ point of view due to the massive opportunities yet to come. The following diagram shows the exchange between content producers and audiences using channels</p>
                                            <br/>
                                            <img style="float: left;" src="images/u2.png">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 t-a-l">
                                    <img style="float:left;margin-right:10px;width:100%;" src="images/use2.png">
                                </div>

                            </div>
                            <div class="item">
                                <div class="col-lg-7 t-a-l">
                                    <div style="margin-top:0;">
                                        <div class="data-box-title  t-a-l">Flow of ringbits in Ads</div>
                                        <div class="data-box-text car-text">
                                            <p>The businesses and companies are able to reach out to the target users for better conversion, while users are earning ringbits for their time and business. Let’s look at the diagram showing the exchange of ringbits by users viewing the ads</p>
                                            <br/>
                                            <img style="float: left;" src="images/u3.png">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 t-a-l">
                                    <img style="float:left;margin-right:10px;width:100%;" src="images/use3.png">
                                </div>

                            </div>


                            <div class="item">
                                <div class="col-lg-7 t-a-l">
                                    <div style="margin-top:0;">
                                        <div class="data-box-title  t-a-l">Flow of ringbits in Marketplace</div>
                                        <div class="data-box-text car-text">
                                            <p>ringID brings in an e-commerce oriented marketplace to the platform with a complete A-Z list of different types of consumer, trade, retailer, and business products and services. </p>
                                            <br/>
                                            <img style="float: left;" src="images/u4.png">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 t-a-l">
                                    <img style="float:left;margin-right:10px;width:100%;min-height:300px;" src="images/use4.png">
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-lg-7 t-a-l">
                                    <div style="margin-top:0;">
                                        <div class="data-box-title  t-a-l">Flow of ringbits in BOTS</div>
                                        <div class="data-box-text car-text">
                                            <p>Computer programs that interact like humans, AKA bots, are the future. They are here to make our lives easier. </p>
                                            <br/>
                                            <img style="float: left;" src="images/u5.png">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 t-a-l">
                                    <img style="float:left;margin-right:10px;width:100%;min-height:300px;" src="images/use5.png">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </section>
        

        <section id="exchange" class="padd-b-20" style="background-image:url('images/coins.png');background-repeat: repeat;display:block;background-size: cover;    background-position: center center;background-color:#000d2e;overflow-x: hidden;">
            <div class="section-title" >
                <h2 class="meet-our-c" style="border:0!important;"></h2>
            </div>
            <div class="container" style="position:relative;z-index:3;">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="data-box  mobile-box">
                            <a href="http://www.easywallet.com" title="ringid" target="_blank"><img style="width:80%;"  src="images/easywalletimg.png" alt="ringid"> </a>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="data-box  mobile-box" style="width:100%;">
                            <div class="data-box-title data-box-title-about t-a-l" style="padding-left:22px;color:#fff;">Host Exchange</div>
                            <div class="data-box-title  t-a-l" style="padding-left:22px;"><a style="color:#eee;" href="http://www.easywallet.com" title="ringid" target="_blank">Easy Wallet</a></div>
                            <div class="data-box-text t-a-l" style="color:#eee;text-align: justify;">Buy, sell, send or receive cryptocurrencies of any amount, from anywhere in the world, instantly. 24/7 online availability gives you access at any time, regardless of banking hours & absolutely no extra charges or hidden fees. EasyWallet gives you the freedom to participate in the global economy.</div>




                            <ul class="logos">
                                <li><a class="wow zoomIn" data-wow-delay="750ms"  href="http://www.easywallet.com"  target="_blank" title="" style="visibility: visible; animation-delay: 750ms; animation-name: zoomIn;"><img src="images/logo3.png" alt="bitcoin"></a></li>
                                <li><a class="wow zoomIn" data-wow-delay="1000ms"  href="http://www.easywallet.com"  target="_blank"  title="" style="visibility: visible; animation-delay: 1000ms; animation-name: zoomIn;"><img src="images/logo4.png" alt=""></a></li>
                                <li><a class="wow zoomIn" data-wow-delay="250ms"  href="http://www.easywallet.com"  target="_blank" title="" style="visibility: visible; animation-delay: 250ms; animation-name: zoomIn;"><img src="images/logo1.png" alt="ringbit"></a></li>
                                <li><a class="wow zoomIn" data-wow-delay="500ms"  href="http://www.easywallet.com"  target="_blank"  title="" style="visibility: visible; animation-delay: 500ms; animation-name: zoomIn;"><img src="images/logo2.png" alt=""></a></li>
                            </ul>





                        </div>







                    </div>
                </div>
            </div>
        </section>
        <!--company end-->
        <!-- Footer start -->
        <footer class="footer" id="contact">
            <div class="container footer-logo-area">
                <a href="index.php" title="ringbit"><img style="width:150px;height:auto;" src="images/lg.png" alt="logo"></a>
                <div class="profile-network">
                    <a href="#" class="fbn"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#" class="twn"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="gn"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="inn"><i class="fa fa-linkedin"></i></a>
                </div>
            </div>
            <div class="footer-bg">
                <div class="fmid">
                    <div class="container">
                        <div class="footer-nav target-to t-a-c">
                            <p>Copyright &copy; 2018.All Rights Reserved by ringbit</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->
        <!-- Scrool to top -->
        <div class="target-to bottom-sc">
            <a class="scroll-to-top" href="#home"><div class="down-ico"><i class="fa fa-chevron-up" aria-hidden="true"></i></div></a>
        </div>
        <!-- Scrool to top End-->
        <script type='text/javascript' src='js/jquery.js'></script>
        <script src="js/owl.carousel.js"></script>
<!--        <script src="js/particles.js"></script>
        <script src="js/app.js"></script>-->
        <script src="js/script.js"></script>

        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content t-a-c">
                <span class="close">&times;</span>
                <p>Coming Soon! </p>
            </div>
        </div>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-109827563-1', 'auto');
            ga('send', 'pageview');
        </script>


        <script>
            var countDownDate1 =<?php echo $timestamp2; ?>;
            var now1 = <?php echo $now; ?>;
            var x = setInterval(function () {
                now1 += 1;
                var distance = countDownDate1 - now1;
                var days1 = Math.floor(distance / (60 * 60 * 24));
                var hours1 = Math.floor((distance % (60 * 60 * 24)) / (60 * 60));
                var minutes1 = Math.floor((distance % (60 * 60)) / 60);
                var seconds1 = Math.floor(distance % 60);
                document.getElementById("days1").innerHTML = days1;
                document.getElementById("hours1").innerHTML = hours1;
                document.getElementById("minutes1").innerHTML = minutes1;
                document.getElementById("seconds1").innerHTML = seconds1;
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("counter_expire").style.display = 'none';
                }
            }, 1000);
        </script>

        <script>
            /*
            var countDownDate2 =<?php echo $timestamp; ?>;
            var now2 = <?php echo $now; ?>;
            var x = setInterval(function () {
                now2 += 1;
                var distance = countDownDate2 - now2;
                var days2 = Math.floor(distance / (60 * 60 * 24));
                var hours2 = Math.floor((distance % (60 * 60 * 24)) / (60 * 60));
                var minutes2 = Math.floor((distance % (60 * 60)) / 60);
                var seconds2 = Math.floor(distance % 60);
                document.getElementById("days2").innerHTML = days2;
                document.getElementById("hours2").innerHTML = hours2;
                document.getElementById("minutes2").innerHTML = minutes2;
                document.getElementById("seconds2").innerHTML = seconds2;
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("counter_expire").style.display = 'none';
                }
            }, 1000); */
        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                var owl = $('.owl-carousel');
                owl.owlCarousel({
                    items: 1,
                    loop: true,
                    nav: true,
                    margin: 10,
                    autoplay: true,
                    autoplayTimeout: 6000,
                    autoplayHoverPause: true
                });
                $('.play').on('click', function () {
                    owl.trigger('play.owl.autoplay', [1000])
                })
                $('.stop').on('click', function () {
                    owl.trigger('stop.owl.autoplay')
                })
                set_dynamic_counter('count', 0);
                var modal = document.getElementById('myModal');
                var btn = document.getElementById("myBtn");
                var span = document.getElementsByClassName("close")[0];
                /*
                btn.onclick = function () {
                    modal.style.display = "block";
                } */
                span.onclick = function () {
                    modal.style.display = "none";
                }
                window.onclick = function (event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
                $(window).scroll(function () {
                    clearTimeout($.data(this, 'scrollTimer'));
                    $.data(this, 'scrollTimer', setTimeout(function () {
                        $('.scroll-to-top').fadeOut();
                    }, 3000));
                });
            })
            function get_number_with_seperator(x) {
//                var parts = x.toString().split(".");
//                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
//                return parts.join(".");
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
            function set_dynamic_counter(countclass, startc) {
                $('.' + countclass).each(function () {
                    $(this).prop('Counter', startc).animate({
                        Counter: $(this).text()
                    }, {
                        duration: 5000,
                        easing: 'swing',
                        step: function (now) {
                            now = Math.ceil(now);
                            now = get_number_with_seperator(now);
                            $(this).text(now);
                        }
                    });
                });
            }
            var x = setInterval(function () {
//                console.log('hitted');
                var old_mined_counter = $('.old_mined_counter').text().replace(/,/g, "");
                var old_reward_counter = $('.old_reward_counter').text().replace(/,/g, "");
                $.ajax({url: "<?php echo $server_url_ajax; ?>", success: function (data) {

					    var result=JSON.parse(data);
                        //console.log(result.totalMined);
                        var total_mined_new = result['totalMined'];
                        var total_reward_new =(result['totalMined'] / 10);

                        $('.old_mined_counter').text(total_mined_new);
                        $('.old_reward_counter').text(total_reward_new);
						
                        //if (total_mined_new > old_mined_counter) {
							 set_dynamic_counter('old_reward_counter', old_reward_counter);
                        set_dynamic_counter('old_mined_counter', old_mined_counter);
                        //}
                    }});
            }, 20000);
        </script>
<!--            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
                     google.charts.load("current", {packages: ["corechart"]});
                     google.charts.setOnLoadCallback(drawChart);
                     function drawChart() {
                         var data = google.visualization.arrayToDataTable([
                             ['Task', 'Hours per Day'],
                             ['ringbit Foundation', 60],
                             ['ringID', 30],
                             ['Token Sale', 10]
                         ]);

                         var options = {
                             title: '',
                             is3D: true,
                         };

                         var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                         chart.draw(data, options);
                     }
</script>-->
        <!--<div id="piechart_3d" style="width: 900px; height: 500px;margin-left:-200px;"></div>-->
    </body>
</html>