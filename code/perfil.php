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

<body class="theme-light feed-7">
<?php
//session_start();
require_once("connections/connection.php");
if (isset( $_SESSION["username"])) {
    $user = $_SESSION["username"];

    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "SELECT  id_user, username, nome_user, email, descricao, roles_id_roles FROM users WHERE username = ?";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, "s",  $user);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $id, $username, $nome, $email, $descricao, $role);
            mysqli_stmt_fetch($stmt);
            $_SESSION["id_user"] = $id;
            $_SESSION['role'] = $role;
        } else {
            echo "Error: " . mysqli_error($stmt); // Errors related with the query
        }
        mysqli_stmt_close($stmt);
    } else {
        echo("Error description: " . mysqli_error($link));
    }
    mysqli_close($link);
}else{
    header("Location: login.php");
}
?>

<div id="page">
    <!-- FOOTER MENU-->
    <div class="footer-bar-4 " id="footer-bar">
        <a href="perfil.html"><i><img id="demo" onclick="myFunction()" class="icons2" src="images/icons/perfil_Prancheta%201.png"></i></a>
        <a class="active-nav" href="feed.html.html"><img id="click2" class="icons2"  src="images/icons/home_Prancheta%201.png"></i></a>
        <a href="herbario-UA.html"><img id="click3"  class="icons2" src="images/icons/herbario_Prancheta%201.png"></i></a>
    </div>

    <!-- Global Menus-->
    <div class="menu menu-box-modal menu-gradient" data-menu-height="cover" data-menu-load="menu-color.html"
         data-menu-width="cover" id="menu-color"></div>
    <div class="menu menu-box-bottom menu-box-detached" data-menu-effect="menu-parallax" data-menu-height="390"
         data-menu-load="menu-share.html" id="menu-share"></div>

    <!--HEADER: LOGO E MENU DE CIMA-->
    <div class="header-logo-app header mt-4 mb-4 ">
        <a class="header-icon header-icon-1" href="editar_perfil.html"><i><img class="icons"
                                                                               src="images/icons/editar_perfil_Prancheta%201.png"></i></a>
        <a class="header-icon header-icon-1 ms-5" href="editar_perfil.html"><i><img class="icons"
                                                                                    src="images/icons/amigos_Prancheta%201.png"></i></a>
        <p class="header-icon font-barra font-31 margem-perfil mt-1 ">Olá,Bruna</p>
    </div>

    <!--PERFIL-->
    <div class="page-content has-footer-menu ">
        <div class="row mb-0 margem0 ">
            <!-- FOTO DE PERFIL -->
            <div class="col-6 card card-style  mt-4 feed-0"   data-card-height="390">
                <div style=" border-radius: 90px; height: 190px;
                background-image: url('https://avatars.dicebear.com/api/croodles/bruna.svg');
                background-position: center;
                background-size: cover;
                background-color: white;"
                > </div>

                <p class="font-26 mt-3 mb-0">username</p>
                <a class="font-18  mt-1 mb-0 color-dark-dark">email</a>
                <p class="font-16  mb-0">usernamekwfhewjfdkejdiwlejdwliejdkwlejdçoJEDoileqhd</p>
                <p class="font-18  mt-1 mb-0 ">colheitas</p>
                <a class="header-icon header-icon-1 mt-1" href="editar_perfil.html"><i><img class="icons d-block"
                                                                                            src="images/icons/editar_perfil_Prancheta%201.png"></i></a>

            </div>


            <!-- AVATAR -->
            <div class="col-6 card card-style feed-0 mt-4" data-card-height="350">
                <img src="images/avatares/azul.png">
            </div>
        </div><div class="content mb-5">


            <!--MONTRA-->
            <div class="splide single-slider slider-arrows mt-4" id="single-slider-3">
                <div class="splide__track">
                    <div class="splide__list">
                        <div class="splide__slide">
                            <div data-card-height="320"  class="card mx-3 bg-18  " style="border-radius: 15px">
                                <div class="card-bottom text-center mb-4">
                                    <p class="color-white text-uppercase font-16 mb-0">Splendid Simplicity</p>
                                </div>
                            </div>
                        </div>
                        <div class="splide__slide">
                            <div data-card-height="320"  class="card mx-3 bg-18  " style="border-radius: 15px">
                                <div class="card-bottom text-center mb-4">
                                    <p class="color-white text-uppercase font-16 mb-0">Splendid Simplicity</p>
                                </div>
                            </div>
                        </div>
                        <div class="splide__slide">
                            <div data-card-height="320"  class="card mx-3 bg-18  " style="border-radius: 15px">
                                <div class="card-bottom text-center mb-4">
                                    <p class="color-white text-uppercase font-16 mb-0">Splendid Simplicity</p>
                                </div>
                            </div>
                        </div>
                        <div class="splide__slide">
                            <div data-card-height="320"  class="card mx-3 bg-18  " style="border-radius: 15px">
                                <div class="card-bottom text-center mb-4">
                                    <p class="color-white text-uppercase font-16 mb-0">Splendid Simplicity</p>
                                </div>
                            </div>
                        </div>
                        <div class="splide__slide">
                            <div data-card-height="320"  class="card mx-3 bg-18  " style="border-radius: 15px">
                                <div class="card-bottom text-center mb-4">
                                    <p class="color-white text-uppercase font-16 mb-0">Splendid Simplicity</p>
                                </div>
                            </div>
                        </div>
                        <div class="splide__slide">
                            <div data-card-height="320"  class="card mx-3 bg-18  " style="border-radius: 15px">
                                <div class="card-bottom text-center mb-4">
                                    <p class="color-white text-uppercase font-16 mb-0">Splendid Simplicity</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- BADGES -->
            <div class="row mb-0 mt-5 ">
                <img src="images/badgets/bronze.png" class="m-auto" style="width:30%">
                <p class="font-22 text-center mt-2" >Começou na aplicação</p>
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
</html>