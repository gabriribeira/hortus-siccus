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

<!-- PRELOADER-->
<?php
include_once "components/cp_preloader.php";
?>
<div id="page">
    <!-- FOOTER MENU-->
    <?php
            include_once "components/cp_footer_menu.php";
    ?>

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
            <a class="header-icon icon-6"  href=""><i><img class="icons"
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
                        <a href="#"><img class="d-inline-block rounded-circle preload-img"  src="images/profile/1.png"
                                         width="40">
                            <p class="d-inline  bottom1 position-absolute color-white font-22 font-feed">Mafalda</p></a>
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
                        <a href="#"><img class="d-inline-block rounded-circle preload-img"  src="images/profile/7.png"
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

            <!-- 1 -->
            <div class="col-6 card card-style feed-4" data-card-height="220">
                <div class="card-top text-start">
                    <div class="mt-5 ms-3 color-white">
                        <p class="color-white font-16 opacity-70">
                            registou planta</p>
                    </div>
                </div>
                <div class="card-bottom ">
                    <div class="content">
                        <a href="#"><img class="d-inline-block rounded-circle preload-img"  src="images/profile/9.png"
                                         width="40">
                            <p class="d-inline  bottom1 position-absolute color-white font-22 font-feed">Pedro</p></a>
                    </div>
                </div>
            </div>

            <!-- 2 -->
            <div class="col-6 card card-style feed-33" data-card-height="220">
                <div class="card-top text-start">
                    <div class="mt-5 ms-3 color-white">
                        <p class="color-white font-16 opacity-70">
                            Turn your Mo</p>
                    </div>
                </div>
                <div class="card-bottom">
                    <div class="content"  >
                        <a href="#"><img class="d-inline-block rounded-circle preload-img" src="images/profile/2.png"
                                         width="40">
                            <p class="d-inline bottom1 position-absolute color-white font-22 font-feed">Rui</p></a>
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

            <!-- 2 -->
            <div class="col-6 card card-style feed-2" data-card-height="220">
                <div class="card-top text-start">
                    <div class="mt-5 ms-3 color-white">
                        <p class="color-white font-16 opacity-70">
                            Turn your Mo</p>
                    </div>
                </div>
                <div class="card-bottom">
                    <div class="content">
                        <a href="#"><img class="d-inline-block rounded-circle preload-img"  src="images/profile/3.png"
                                         width="40">
                            <p class="d-inline bottom1 position-absolute color-white font-22 font-feed">Inês</p></a>
                    </div>
                </div>
            </div>

            <!-- 1 -->
            <div class="col-6 card card-style feed-333" data-card-height="220">
                <div class="card-top text-start">
                    <div class="mt-5 ms-3 color-white">
                        <p class="color-white font-16 opacity-70">
                            registou planta</p>
                    </div>
                </div>
                <div class="card-bottom ">
                    <div class="content ">
                        <a href="#"><img class="d-inline-block rounded-circle preload-img"  src="images/profile/1.png"
                                         width="40">
                            <p class="d-inline  bottom1 position-absolute color-white font-22 font-feed">Carla</p></a>
                    </div>
                </div>
            </div>

            <!-- 2 -->
            <div class="col-6 card card-style feed-6" data-card-height="220">
                <div class="card-top text-start">
                    <div class="mt-5 ms-3 color-white">
                        <p class="color-white font-16 opacity-70">
                            Turn your Mo</p>
                    </div>
                </div>
                <div class="card-bottom">
                    <div class="content">
                        <a href="#"><img class="d-inline-block rounded-circle preload-img"  src="images/profile/brunax.png"
                                         width="40">
                            <p class="d-inline bottom1 position-absolute color-white font-22 font-feed">Bruna</p></a>
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

            <!-- 2 -->
            <div class="col-6 card card-style feed-4" data-card-height="220">
                <div class="card-top text-start">
                    <div class="mt-5 ms-3 color-white">
                        <p class="color-white font-16 opacity-70">
                            Turn your Mo</p>
                    </div>
                </div>
                <div class="card-bottom">
                    <div class="content">
                        <a href="#"><img class="d-inline-block rounded-circle preload-img"  src="images/profile/7.png"
                                         width="40">
                            <p class="d-inline bottom1 position-absolute color-white font-22 font-feed">Tiago</p></a>
                    </div>
                </div>
            </div>




        </div>
    </div>





</div>

<script src="scripts/bootstrap.min.js" type="text/javascript"></script>
<script src="scripts/custom.js" type="text/javascript"></script>
<script>
    function myFunction() {
        document.getElementById("demo").src="images/icons/1.png";

    }
</script>
</body>
