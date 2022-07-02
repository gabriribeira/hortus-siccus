<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black-translucent" name="apple-mobile-web-app-status-bar-style">
    <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover"
          name="viewport"/>
    <title>Hortus siccus</title>

    <link href="styles/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="styles/style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700;800&family=Roboto:wght@400;500;600;700&display=swap"
          rel="stylesheet">
    <link href="fonts/css/fontawesome-all.min.css" rel="stylesheet" type="text/css">
    <link data-pwa-version="set_in_manifest_and_pwa_js" href="_manifest.json" rel="manifest">
    <link href="app/icons/icon-192x192.png" rel="apple-touch-icon" sizes="180x180">
    <link rel="icon" type="image/png" href="images/favicon.png" sizes="32x32" />
    <style>
        @import url("https://use.typekit.net/hxx3rxy.css");
    </style>
</head>

<body class="theme-light">

<div id="preloader"><div class="spinner-border color-red-dark" role="status"></div></div>

<div id="page">
    <!-- FOOTER MENU-->
    <div class="footer-bar-4 " id="footer-bar">
        <a href="perfil.php?id_user=<?=$_SESSION["id_utilizador"]?>"><i><img id="demo" onclick="myFunction()" class="icons2" src="images/icons/perfil_Prancheta%201.png"></i></a>
        <a class="active-nav" href="feed.html"><img id="click2" class="icons2"  src="images/icons/home_Prancheta%201.png"></i></a>
        <a href="herbario-UA.html"><img id="click3"  class="icons2" src="images/icons/herbario_Prancheta%201.png"></i></a>
    </div>

    <!-- Global Menus-->
    <div class="menu menu-box-modal menu-gradient" data-menu-height="cover" data-menu-load="menu-color.html"
         data-menu-width="cover" id="menu-color"></div>
    <div class="menu menu-box-bottom menu-box-detached" data-menu-effect="menu-parallax" data-menu-height="390"
         data-menu-load="menu-share.html" id="menu-share"></div>

    <!--HEADER: LOGO E MENU DE CIMA-->
    <div>
        <img alt="" class="logo img-fluid mt-4 mb-4" src="images/logo.png">
        <div class="header-logo-app header mt-4 mb-4 ">
            <a class="header-icon header-icon-1" href="scripts_php/sc_logout.php">
                <i><img class="icons"
                        src="images/icons/logout_Prancheta1.png"></i></a>
            <!--<i><img class="icons"
                                src="images/icons/logout_Prancheta%201.png"></i> -->
            <a class="header-icon icon-6" data-back-button href=""><i><img class="icons"
                                                                           src="images/icons/filter_Prancheta%201.png"></i></a>
            <a class="header-icon header-icon-2 show-on-theme-dark" data-toggle-theme href="#"><i
                ><img class="icons"
                      src="images/icons/contraste2_Prancheta%201.png"></i></a>
            <a class="header-icon header-icon-2 show-on-theme-light" data-toggle-theme href="#"><i
                ><img class="icons"
                      src="images/icons/contraste_Prancheta%201.png"></i></a>
        </div>
    </div>

    <div class="page-content has-footer-menu ">
        <div class="row mb-0 margem0 ">

            <!-- 1 -->
            <div class="col-6 card card-style bg-6" data-card-height="220">
                <div class="card-top text-start">
                    <div class="mt-5 ms-3 color-white">
                        <p class="color-white font-16 opacity-70">
                            registou planta</p>
                    </div>
                </div>
                <div class="card-bottom ">
                    <div class="content">
                        <a href="#"><img class="d-inline-block rounded-circle preload-img"  src="images/profile/antonia.png"
                                         width="40">
                            <p class="d-inline  bottom1 position-absolute color-white font-22 font-feed">Marta</p></a>
                    </div>
                </div>
            </div>

            <!-- 2 -->
            <div class="col-6 card card-style feed-1" data-card-height="220">
                <div class="card-top text-start">
                    <div class="mt-5 ms-3 color-white">
                        <p class="color-white font-16 opacity-70">
                            Turn your Mo</p>
                    </div>
                </div>
                <div class="card-bottom">
                    <div class="content">
                        <a href="#"><img class="d-inline-block rounded-circle preload-img"  src="images/profile/antonia.png"
                                         width="40">
                            <p class="d-inline bottom1 position-absolute color-white font-22 font-feed">Marta</p></a>
                    </div>
                </div>
            </div>

            <!-- HERBARIO UA -->
            <div class="col-6 card card-style feed-3" data-card-height="220">
                <div class="card-top text-start">
                    <div class="mt-4 ms-3  color-white">
                        <p class="color-white font-20 sublinhado font-feed">HERBÁRIO UA</p>
                        <p class="color-white  font-16 opacity-70 me-2 ">
                            antónia <strong>contribuíu para o registo: </strong> cenoura
                        </p>
                    </div>
                </div>
            </div>

            <!-- EVENTO -->
            <div class="p-0 col-6">
                <div class=" card card-style card-desafio feed-7" data-card-height="170">
                    <div class="card-center mt-2 ms-3 ">
                        <div class="row">
                            <div class="col-6">
                                <p class="color-black font-20 sublinhado font-feed">UARIUM</p>
                                <p class="color-black  font-18 mb-n1">30 JUN</p>
                                <p class="color-black  font-18 ">2022</p>
                            </div>
                            <div class="col-6 ">
                                <p class="color-black   line-height-s font-16 mb-n1">vem procurar plantas na UA</p>
                                <br>
                                <a class="header-icon pe-5" href="login.html"><i><img class="icons"
                                                                                      src="images/icons/seta_Prancheta%201.png"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-style card-desafio feed-7" data-card-height="50">
                    <p class="card-center  text-left color-dark  ps-3 font-30">EVENTO</p>
                </div>
            </div>

            <!--DESAFIO-->
            <div class="p-0">
                <div class="card card-style card-desafio feed-7" data-card-height="50">
                    <p class="card-center  text-left color-dark  ps-3 font-30">DESAFIO</p>
                </div>
                <div class="card card-style card-desafio feed-7" data-card-height="200">
                    <div class="card-center ms-3 ">
                        <p class="color-black  font-20 mb-3 font-feed sublinhado">COLHE</p>
                        <p class="color-black  font-25 mb-1">30</p>
                        <p class="color-black  font-25">plantas</p>
                    </div>
                    <div class="card-center text-end">
                        <div class="mt-5 me-3 color-white">
                            <p class="color-dark  font-18 mb-1">tens até</p>
                            <p class="color-dark  font-20 ">00/00/22</p>
                        </div>
                    </div>
                    <div class="card-bottom ms-3 me-3 mb-4">
                        <div class="progress progresso" style="height:26px;">
                            <div aria-valuemax="100"
                                 aria-valuemin="0" aria-valuenow="10"
                                 class="progress-bar progresso1 border-0  color-theme text-start  ps-2" role="progressbar"
                                 style="width: 50%"> 50%
                            </div>
                        </div>
                    </div>
                    <div class="page-bg"></div>
                </div>
            </div>
        </div>
    </div>



    <!--
    <div class="card card-style feed-3" data-card-height="350">
        <div class="card-top text-start">
            <div class="mt-3 ms-3 color-white">
                <i class="fa fa-angle-left font-30" style="transform:rotate(45deg)"></i><br>Top Left
            </div>
        </div>
        <div class="card-top text-center">
            <div class="mt-3 color-white">
                <i class="fa fa-angle-up font-30"></i><br>Top Center
            </div>
        </div>
        <div class="card-top text-end">
            <div class="mt-3 me-3 color-white">
                <i class="fa fa-angle-right font-30" style="transform:rotate(-45deg)"></i><br>Top Right
            </div>
        </div>
        <div class="card-center text-start">
            <div class="mt-3 ms-3 color-white">
                <i class="fa fa-angle-left font-30"></i><br>Center Left
            </div>
        </div>
        <div class="card-center text-center">
            <div class="mt-3 color-white">
                <i class="fa fa-circle font-30"></i><br>Center
            </div>
        </div>
        <div class="card-center text-end">
            <div class="mt-3 me-3 color-white">
                <i class="fa fa-angle-right font-30"></i><br>Center Right
            </div>
        </div>
        <div class="card-bottom text-start">
            <div class="mb-3 ms-3 color-white">
                Bottom Left<br>
                <i class="fa fa-angle-left font-30 pt-1" style="transform:rotate(-45deg)"></i>
            </div>
        </div>
        <div class="card-bottom text-center">
            <div class="mb-3 color-white">
                Bottom Center<br>
                <i class="fa fa-angle-down font-30 pt-1"></i>
            </div>
        </div>
        <div class="card-bottom text-end">
            <div class="mb-3 me-3 color-white">
                Bottom Right<br>
                <i class="fa fa-angle-right pt-1 font-30" style="transform:rotate(45deg)"></i>
            </div>
        </div>
        <div class="card-overlay "></div>
    </div>


    <div class="card card-style bg-28" data-card-height="350">
        <div class="card-top text-end me-3 mt-1">
            <p class="color-white opacity-50 font-10">Bootstrap 4 + PWA Ready</p>
        </div>
        <div class="card-center ms-3">
            <h1 class="color-white font-900 font-35 mb-0">FIND</h1>
            <h1 class="color-white font-900 font-31 mb-n1">YOUR</h1>
            <h1 class="color-white font-900 font-28">STYLE</h1>
        </div>
        <div class="card-overlay bg-black opacity-70"></div>
    </div>


    <div class="card card-style bg-1" data-card-height="450">
        <div class="card-center">
            <h1 class="text-center color-white font-30 font-800 mt-4 mb-0">Tall is the New Wide</h1>
            <p class="color-white text-center">Enjoy Awesome and Powerful  Flexibility</p>
            <a href="#" class="btn btn-m btn-center-l rounded-sm bg-highlight mb-3 font-800 text-uppercase scale-box">Get Started</a>
        </div>
        <div class="card-center mb-1">
        </div>
        <div class="card-overlay bg-black opacity-70"></div>
    </div>

    <div class="card card-style bg-8" data-card-height="350">
        <div class="card-center text-center">
            <h1 class="color-white font-32">Grab Attention</h1>
            <p class="color-white boxed-text-l opacity-80 mb-0">
                Any position you want. Top, Bottom, Center
                with any type of content you want for cards.
            </p>
            <a href="#" class="btn btn-border btn-m font-700 mt-4 bg-white color-black">Call to Action</a>
        </div>
        <div class="card-overlay bg-black opacity-80"></div>
    </div>

    <div class="card card-style bg-6" data-card-height="450">
        <div class="card-top">
            <a href="#" class="btn btn-m bg-highlight rounded-sm font-800 text-uppercase scale-box float-end mt-2 me-2">Get it Today</a>
        </div>
        <div class="card-bottom">
            <div class="content">
                <h1 class="color-white font-28">Creativity Unleashed</h1>
                <p class="color-white opacity-70">
                    Turn your Mobile Website into a Awesome App <br> Styled Design with Asterial in just a couple of  minutes
                </p>
            </div>
        </div>
        <div class="card-overlay bg-gradient opacity-70"></div>
    </div>

    <div class="card card-style bg-14" data-card-height="250">
        <div class="card-center">
            <div class="content">
                <div class="d-flex">
                    <div>
                    <h1 class="color-white font-27 mb-n2">With Icons</h1>
                    <p class="color-white opacity-70 mb-0">
                        FontAwesome 5 Ready
                    </p>
                    </div>
                    <div class="ms-auto align-self-center">
                        <i class="fa fa-heart fa-3x color-red-dark scale-icon me-3"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-overlay bg-black opacity-70"></div>
    </div>
</div>
-->

</div>

<script src="scripts/bootstrap.min.js" type="text/javascript"></script>
<script src="scripts/custom.js" type="text/javascript"></script>
<script>
    function myFunction() {
        document.getElementById("demo").src="images/icons/1.png";

    }
</script>
</body>
