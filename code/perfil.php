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
    <link rel="icon" type="image/png" href="images/favicon.png" sizes="32x32" />
    <style>
        @import url("https://use.typekit.net/hxx3rxy.css");
    </style>

</head>

<body class="theme-light feed-7">
    <!-- PRELOADER-->
    <?php
    include_once "components/cp_preloader.php";
    ?>

    <?php
    session_start();
    require_once("connections/connection.php");
    include_once("scripts_php/sc_badges.php");



    $id = $_GET["id"];
    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "SELECT  id_user, imagem_user, username, nome_user, email, descricao, roles_id_role FROM users WHERE id_user = ?";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, "s",  $id);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $id_utilizador, $imagem_user, $username, $nome, $email, $descricao, $role);
            mysqli_stmt_fetch($stmt);
            $_SESSION['role'] = $role;
        } else {
            echo "Error: " . mysqli_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo ("Error description: " . mysqli_error($link));
    }
    mysqli_close($link);

    ?>
    <div id="page">
        <!-- FOOTER MENU-->
        <?php
        include_once "components/cp_footer_menu.php";
        ?>

        <!-- Global Menus-->
        <div class="menu menu-box-modal menu-gradient" data-menu-height="cover" data-menu-load="menu-color.html" data-menu-width="cover" id="menu-color"></div>
        <div class="menu menu-box-bottom menu-box-detached" data-menu-effect="menu-parallax" data-menu-height="390" data-menu-load="menu-share.html" id="menu-share"></div>

        <!--HEADER: LOGO E MENU DE CIMA-->
        <div class="header-logo-app header mt-4 mb-4 ">

            <?php

            if ($_SESSION["id_utilizador"] == $_GET["id"]) { ?>
                <a class="header-icon header-icon-1" href="editor_perfil.html"><i><img class="icons" src="images/icons/editar_perfil_Prancheta%201.png"></i></a>
                <a class="header-icon header-icon-1 ms-5" href="amigos.php"><i><img class="icons" src="images/icons/amigos_Prancheta%201.png"></i></a>
            <?php } ?>

            <p class="header-icon font-barra font-31 margem-perfil mt-1 ">Olá!</p>
        </div>

        <!--PERFIL-->
        <div class="page-content has-footer-menu ">
            <div class="row mb-0 margem0 ">

                <?php

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
                    echo ("Error description: " . mysqli_error($link));
                }
                mysqli_close($link);

                ?>

                <!-- FOTO DE PERFIL -->
                <div class="col-6 card card-style  mt-4 feed-0" data-card-height="390">
                    <div style=" border-radius: 90px; height: 190px;
                background-image: url('images/uploads/medium/<?= $imagem_user ?>');
                background-position: center;
                background-size: cover;
                background-color: white;"></div>
                    <p class="font-26 mt-3 mb-0"><?= $nome ?></p>
                    <a class="font-18  mt-1 mb-0 color-dark-dark" style="font-style: italic"><?= $email ?></a>
                    <p class="font-16  mb-0"><?= $descricao ?></p>
                    <p class="font-18  mt-1 mb-0 color-amarelo"><?= $total_colheitas ?> colheitas</p>

                    <?php

                    $link = new_db_connection();
                    if ($_GET["id"] != $_SESSION["id_utilizador"]) {
                        $query = "SELECT users_id_user, seguidor
                            FROM seguidores 
                            INNER JOIN users ON users_id_user = users.id_user
                            WHERE users_id_user = ?";

                        $stmt = mysqli_stmt_init($link); // create a prepared statement 

                        if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                            mysqli_stmt_bind_param($stmt, 'i', $_GET["id"]);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_bind_result($stmt, $user, $seguidor);
                            if (mysqli_stmt_fetch($stmt)) { ?>
                                <button type="button" style="background-color: #2b2b2b;" class="float-right contato1 me-4 mt-1  "><a href="scripts_php/sc_follow_user.php?id=<?= $_GET["id"] ?>" style="color: #eeeee4;" class="font-16  p-2 ">A Seguir</a></button>
                            <?php
                            } else { ?>
                                <button type="button" class="float-right contato1 me-4 mt-1  "><a href="scripts_php/sc_follow_user.php?id=<?= $_GET["id"] ?>" class="font-16  p-2 color-dark-dark ">Seguir</a></button>
                    <?php
                            }
                            mysqli_stmt_close($stmt);
                        }
                    }
                    ?>

                </div>
                <!-- AVATAR -->
                <div class="col-6 card card-style feed-0 mt-4" data-card-height="350">
                    <img src="images/avatares/azul.png">
                </div>
            </div>
            <div class="content mb-5">

                <!--MONTRA-->


                <?php

                $link = new_db_connection();
                $stmt2 = mysqli_stmt_init($link);
                $query = "SELECT COUNT(id_registo) FROM registos WHERE users_id_user=? AND registos.montra=1";

                if (mysqli_stmt_prepare($stmt2, $query)) {
                    mysqli_stmt_bind_param($stmt2, "i",  $id);
                    if (mysqli_stmt_execute($stmt2)) {
                        mysqli_stmt_bind_result($stmt2, $total);
                        mysqli_stmt_fetch($stmt2);
                    }
                }
                mysqli_stmt_close($stmt2);


                if ($total != 0) {
                    $link2 = new_db_connection();

                    $stmt = mysqli_stmt_init($link2);
                    $query = "SELECT registos.id_registo, registos.imagem_registo, plantas.nome_cientifico
                            FROM registos
                            INNER JOIN plantas ON plantas_id_plantas=id_plantas
                            WHERE users_id_user=? AND registos.montra=1";

                    echo " <div class='splide single-slider slider-arrows mt-4' id='single-slider-3'>
                <div class='splide__track'>
                    <div class='splide__list'>";


                    if (mysqli_stmt_prepare($stmt, $query)) {
                        mysqli_stmt_bind_param($stmt, "i",  $id);
                        if (mysqli_stmt_execute($stmt)) {
                            mysqli_stmt_bind_result($stmt, $id_registo, $imagem_registo, $nome_cientifico);
                            while (mysqli_stmt_fetch($stmt)) {
                                if ($total >= 1) {
                                    echo "
                                 <div class='splide__slide'>
                                    <div data-card-height='320'  class='card mx-2 ' style='background-image: url(images/uploads/registos_plantas/$imagem_registo); border-radius: 15px'>
                                        <div class='card-bottom text-center mb-4'>
                                            <a href='planta_individual.php?id_registo=$id_registo'><p class='color-white text-uppercase font-16 mb-0'>$nome_cientifico</p></a>
                                        </div>
                                    </div>
                                </div>
                                 ";
                                }
                            }

                            echo " </div>
                               </div>
                               </div>
                                        ";
                        } else {
                            echo "Error: " . mysqli_error($stmt);
                        }
                        mysqli_stmt_close($stmt);
                    } else {
                        echo ("Error description: " . mysqli_error($link));
                    }
                    mysqli_close($link);
                } else {
                    if ($id == $_SESSION["id_utilizador"]) {
                        echo "Ainda não tens nada na montra... Adiciona um novo registo.";
                    }
                }



                ?>



                <!-- BADGES -->
                <?php

                $link = new_db_connection();
                $stmt = mysqli_stmt_init($link);
                $query = "SELECT badges.nome_badge, badges.descricao_badge, badges.imagem_badge
                    FROM users
                    INNER JOIN badges
                    ON users.badges_id_badge = badges.id_badge
                    WHERE id_user = ?";

                if (mysqli_stmt_prepare($stmt, $query)) {
                    mysqli_stmt_bind_param($stmt, "i",  $id);
                    if (mysqli_stmt_execute($stmt)) {
                        mysqli_stmt_bind_result($stmt, $nome_b, $descricao_b, $imagem_b);
                        mysqli_stmt_fetch($stmt);
                    } else {
                        echo "Error: " . mysqli_error($stmt);
                    }
                    mysqli_stmt_close($stmt);
                } else {
                    echo ("Error description: " . mysqli_error($link));
                }
                mysqli_close($link);

                ?>

                <div class="row mb-0 mt-5 ">
                    <img src="images/badges/<?= $imagem_b ?>" class="m-auto" style="width:30%">
                    <p class="font-22 text-center mt-2 mb-1"><?= $nome_b ?></p>
                    <span class="text-center font-16"><?= $descricao_b ?></span>
                </div>


                <!-- comentarios -->
                <section class="mt-5" id="comentarios">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-5 col-md-6 col-12 pb-4">
                                <hr>
                                <?php

                                $link = new_db_connection();
                                $stmt = mysqli_stmt_init($link);
                                $query = "SELECT comentarios.id_comentario, comentarios.comentario, comentarios.data_comentario, users.nome_user, users.imagem_user, users.id_user FROM comentarios 
                                            INNER JOIN users ON id_user_origem=id_user
                                            WHERE id_user_destino=?";

                                if (mysqli_stmt_prepare($stmt, $query)) {
                                    mysqli_stmt_bind_param($stmt, "i",  $id);
                                    if (mysqli_stmt_execute($stmt)) {
                                        mysqli_stmt_bind_result($stmt, $id_c, $comentario, $data_c, $nome_c, $imagemperfil_c, $iduser_c);
                                        while (mysqli_stmt_fetch($stmt)) {
                                            echo "
                                                <div class='comment mt-2 text-justify float-left mb-1'>";

                                            if ($iduser_c == $_SESSION["id_utilizador"]) {
                                                echo " <a class='font-18 float-right' href='scripts_php/sc_comentario_remove.php?id_c=$id_c&id_p=$id'><i><img class='icons'
                                                                                   src='images/icons/apagar_Prancheta%201.png'></i></a>";
                                            }

                                            echo " <img src='images/uploads/small/$imagemperfil_c' alt='' class='rounded-circle feed_3' width='40' height='40'>
                                                        <h4>$nome_c</h4>
                                                        <span>- $data_c</span>
                                                        <br>
                                                        <p class='font-16 mt-2 color-dark-dark'>$comentario</p>
                                                    </div>
                                                ";
                                        }
                                    } else {
                                        echo "Error: " . mysqli_error($stmt);
                                    }
                                    mysqli_stmt_close($stmt);
                                } else {
                                    echo ("Error description: " . mysqli_error($link));
                                }
                                mysqli_close($link);

                                ?>
                            </div>

                            <?php
                            if (isset($_SESSION["id_utilizador"]) && $id!=$_SESSION["id_utilizador"]) {
                                //assim o campo de adicionar comentario so aparece se alguem tiver logado e nao vai aparecer caso estejas a visitar o teu proprio perfil
                                echo "
                             <div class='col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4'>
                                <form id='algin-form' action='scripts_php/sc_comentario_add.php?id_user_d=$id' method='post' role='form'>
                                    <div class='form-group'>
                                        <p class='font-20 mb-3 color-amarelo'>Leave a comment</p>
                                        <label class='color-dark-dark font-16' for='message'>Message</label>
                                        <textarea name='comentario' id='msg' cols='30' rows='5' class='form-control message' ></textarea>
                                    </div>
                                    <div class='form-group'>
                                        <button type='submit' id='post' class='btn'>Post Comment</button>
                                    </div>
                                </form>
                            </div>
                            ";
                            }
                            ?>
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
            document.getElementById("demo").src = "images/icons/1.png";

        }
    </script>
</body>

</html>