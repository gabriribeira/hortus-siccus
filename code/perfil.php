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
session_start();
require_once("connections/connection.php");
if (isset( $_SESSION["username"])) {
    $user = $_SESSION["username"];
    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "SELECT  id_user, username, nome_user, email, descricao, roles_id_role FROM users WHERE username = ?";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, "s",  $user);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $id, $username, $nome, $email, $descricao, $role);
            mysqli_stmt_fetch($stmt);
            $_SESSION["id_user"] = $id;
            $_SESSION['role'] = $role;
        } else {
            echo "Error: " . mysqli_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo("Error description: " . mysqli_error($link));
    }
    mysqli_close($link);
}else{
   //header("Location: login.php");
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
        <p class="header-icon font-barra font-31 margem-perfil mt-1 ">Olá!</p>
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
                ></div>

                <?php
                //esta parte ainda não pus no github. NO PERFIL FICA A FALTAR
                // montra dinâmica + badges dinâmicos + count colheitas + adicionar comentários
                $link = new_db_connection();
                $stmt = mysqli_stmt_init($link);
                $query = "SELECT COUNT(data_registo)
                FROM registos
                WHERE users_id_user=?";

                if (mysqli_stmt_prepare($stmt, $query)) {
                    mysqli_stmt_bind_param($stmt, "i",  $id);
                    if (mysqli_stmt_execute($stmt)) {
                        mysqli_stmt_bind_result($stmt, $total_colheitas);
                        mysqli_stmt_fetch($stmt);

                    } else {
                        echo "Error: " . mysqli_error($stmt);
                    }
                    mysqli_stmt_close($stmt);
                } else {
                    echo("Error description: " . mysqli_error($link));
                }
                mysqli_close($link);

                ?>

                <p class="font-26 mt-3 mb-0"><?=$nome?></p>
                <a class="font-18  mt-1 mb-0 color-dark-dark" style="font-style: italic"><?=$email?></a>
                <p class="font-16  mb-0" ><?=$descricao?></p>
                <p class="font-18  mt-1 mb-0 color-amarelo"><?=$total_colheitas?> colheitas</p>
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
                            <div data-card-height="320"  class="card mx-2 bg-18  " style="border-radius: 15px">
                                <div class="card-bottom text-center mb-4">
                                    <p class="color-white text-uppercase font-16 mb-0">Splendid Simplicity</p>
                                </div>
                            </div>
                        </div>
                        <div class="splide__slide">
                            <div data-card-height="320"  class="card mx-2 bg-18  " style="border-radius: 15px">
                                <div class="card-bottom text-center mb-4">
                                    <p class="color-white text-uppercase font-16 mb-0">Splendid Simplicity</p>
                                </div>
                            </div>
                        </div>
                        <div class="splide__slide">
                            <div data-card-height="320"  class="card mx-2 bg-18  " style="border-radius: 15px">
                                <div class="card-bottom text-center mb-4">
                                    <p class="color-white text-uppercase font-16 mb-0">Splendid Simplicity</p>
                                </div>
                            </div>
                        </div>
                        <div class="splide__slide">
                            <div data-card-height="320"  class="card mx-2 bg-18  " style="border-radius: 15px">
                                <div class="card-bottom text-center mb-4">
                                    <p class="color-white text-uppercase font-16 mb-0">Splendid Simplicity</p>
                                </div>
                            </div>
                        </div>
                        <div class="splide__slide">
                            <div data-card-height="320"  class="card mx-2 bg-18  " style="border-radius: 15px">
                                <div class="card-bottom text-center mb-4">
                                    <p class="color-white text-uppercase font-16 mb-0">Splendid Simplicity</p>
                                </div>
                            </div>
                        </div>
                        <div class="splide__slide">
                            <div data-card-height="320"  class="card mx-2 bg-18  " style="border-radius: 15px">
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
                <p class="font-22 text-center mt-2 mb-1" >Novato</p>
                <span class="text-center font-16">Registou-se na aplicação!</span>
            </div>


            <!-- comentarios -->
            <section  class="mt-5" >
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5 col-md-6 col-12 pb-4">
                            <p class="font-18 mt-1 ">Dá o teu feedback</p>
                            <div class="comment mt-2 text-justify float-left mb-1">
                                <a class="font-18 float-right"><i><img class="icons"
                                                           src="images/icons/apagar_Prancheta%201.png"></i></a>
                                <img src="https://i.imgur.com/yTFUilP.jpg" alt="" class="rounded-circle" width="40" height="40">
                                <h4>Jhon Doe</h4>
                                <span>- 20 October, 2018</span>
                                <br>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
                            </div>
                            <div class="comment mt-4 text-justify">
                                <img src="https://i.imgur.com/yTFUilP.jpg" alt="" class="rounded-circle" width="40" height="40">
                                <h4>Jhon Doe</h4>
                                <span>- 20 October, 2018</span>
                                <br>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                            <form id="algin-form">
                                <div class="form-group">
                                    <h4>Leave a comment</h4>
                                    <label for="message">Message</label>
                                    <textarea name="msg" id=""msg cols="30" rows="5" class="form-control message" ></textarea>
                                </div>

                                <div class="form-group">
                                    <button type="button" id="post" class="btn">Post Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

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