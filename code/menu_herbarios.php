<?php session_start();?>

<!DOCTYPE html>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="theme-light feed-7">
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

    <!-- NOVO REGISTO -->
    <div class="page-content has-footer-menu ">
        <div class="card card-style"   data-card-height="cover" style="height: 784px">
            <div class="feed-3  borda-menu " style="background-image: url('images/flores/ua.png'); background-size: 60%; background-repeat: no-repeat; background-position: bottom right">
                <a href="herbario_indiv.php"><h1 style="padding-top: 14rem; padding-left: 3rem; line-height:initial" class="text-white font-34">o <br> meu <br> herbário</h1></a>

                <br>
            </div>
            <div class="feed-2  borda-menu " style="background-image: url('images/flores/2-01.png'); background-size: 100%; background-repeat: no-repeat; background-position: bottom right">
                <a  href="herbario-UA.php"><h1 class="float-right text-white font-34" style="padding-top: 3rem;line-height: initial; text-align: right ; padding-right: 3rem">herbário<br>UA</h1></a>
            </div>
        </div>
    </div>

</div>

</body>
</html>