<?php session_start(); ?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black-translucent" name="apple-mobile-web-app-status-bar-style">
    <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" name="viewport" />
    <title>Hortus siccus</title>

    <link href="styles/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="styles/style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700;800&family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="fonts/css/fontawesome-all.min.css" rel="stylesheet" type="text/css">
    <link data-pwa-version="set_in_manifest_and_pwa_js" href="_manifest.json" rel="manifest">
    <link href="app/icons/icon-192x192.png" rel="apple-touch-icon" sizes="180x180">
    <link href="images/favicon.png" rel="icon" sizes="32x32" type="image/png" />
    <style>
        @import url("https://use.typekit.net/hxx3rxy.css");
    </style>
</head>

<body class="theme-light">
    <div id="page">
        <!-- FOOTER MENU-->
        <div class="footer-bar-4 " id="footer-bar">
            <a href="perfil.html"><i><img class="icons2" id="demo" onclick="myFunction()" src="images/icons/perfil_Prancheta%201.png"></i></a>
            <a class="active-nav" href="feed.html"><img class="icons2" id="click2" src="images/icons/home_Prancheta%201.png"></i></a>
            <a href="herbario-UA.html"><img class="icons2" id="click3" src="images/icons/herbario_Prancheta%201.png"></i>
            </a>
        </div>


        <!-- Global Menus-->
        <div class="menu menu-box-modal menu-gradient" data-menu-height="cover" data-menu-load="menu-color.html" data-menu-width="cover" id="menu-color"></div>
        <div class="menu menu-box-bottom menu-box-detached" data-menu-effect="menu-parallax" data-menu-height="390" data-menu-load="menu-share.html" id="menu-share"></div>

        <!--HEADER: LOGO E MENU DE CIMA-->
        <div class="header-logo-app header mt-4 mb-4">
            <a class="header-icon header-icon-1" href="editar_perfil.html"><i><img class="icons" src="images/icons/undo.png"></i></a>
            <a class="header-icon header-icon-1 ms-5" href="editar_perfil.html"><i><img class="icons" src="images/icons/lupapreta_6.png"></i></a>
            <p class="header-icon font-barra font-31 margem-amigos mt-1 ">AMIGOS</p>
        </div>



        <div class="page-content has-footer-menu ">
            <div>
                <p class="mx-3 my-0 mb-2 mt-0">
                    amigos que podes conhecer:
                </p>

                <!--SUGESTÃO AMIGOS-->
                <div class="splide story-slider slider-no-dots mb-4" id="story-slider">
                    <div class="splide__track">
                        <div class="splide__list">
                            <div class="splide__slide">
                                <div class="card  rounded-m " data-card-height="100">
                                    <img alt="" src="https://avatars.dicebear.com/api/croodles/bruna.svg">
                                    <div class="card-bottom text-center mb-0">
                                        <p class="color-white ">Apptastic</p>
                                    </div>
                                </div>
                            </div>
                            <div class="splide__slide">
                                <div class="card  rounded-m " data-card-height="100">
                                    <img alt="" src="https://avatars.dicebear.com/api/croodles/bruna.svg">
                                    <div class="card-bottom text-center mb-0">
                                        <p class="color-white ">AMP Drawer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="splide__slide">
                                <div class="card  rounded-m" data-card-height="100">
                                    <img alt="" src="https://avatars.dicebear.com/api/croodles/bruna.svg">
                                    <div class="card-bottom text-center mb-0">
                                        <p class="color-white ">Appeca</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!--NOTIFICAÇÕES-->
            <div class="header-logo-app header-amigos mt-4 mb-3">
                <p class=" p-0 mb-0 " style="font-size: 25px">
                    xyz amigos
                </p>
            </div>

            <!--CARDS AMIGOS-->
            <div class="row mb-0 margem0 ">

                <?php

                require_once("connections/connection.php");
                $link = new_db_connection(); // Create a new DB connection
                $stmt = mysqli_stmt_init($link); // create a prepared statement 
                $query = "SELECT users.id_user, users.imagem_user, users.nome_user
                FROM users 
                INNER JOIN seguidores ON users.id_user = seguidores.users_id_user
                WHERE seguidores.seguidor = ?";

                if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                    mysqli_stmt_bind_param($stmt, 'i', $_SESSION["id_utilizador"]);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt, $id_user, $imagem_user, $nome_user);
                    while (mysqli_stmt_fetch($stmt)) {?>

                    <div class="col-6 card card-style bg-16-lg" data-card-height="220">
                        <a href="perfil.php?id=<?=$id_user?>">
                            <div class="text-center align-items-center card-body mt-4 p-0">
                                <div class=""><img alt="perfilamigo1" class="rounded-m h-50 w-50" src="images/uploads/medium/<?=$imagem_user?>"></div>
                                <div>
                                    <a class="color-white font-22 font-feed" href="perfil.php?id=<?=$id_user?>"><?=$nome_user?></a>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php }
                    mysqli_stmt_close($stmt);
                }

                ?>
            </div>
        </div>



    </div>
    <script src="scripts/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/custom.js" type="text/javascript"></script>
    <script>
        function myFunction() {
            document.getElementById("demo").src = "images/icons/1.png";

        }
    </script>
</body>