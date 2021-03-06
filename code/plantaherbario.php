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

</head>
<body class="theme-light ">
<!-- PRELOADER-->
<?php
include_once "components/cp_preloader.php";
?>

<div id="page" class="feed-2">
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
    <div class="header-logo-app header2 ms-4 mt-4 mb-0 ">
        <a class="header-icon header-icon-1" href="herbario-UA.php"><i><img class="icons fa-rotate-180"
                                                                            src="images/icons/seta_white_Prancheta%201.png"></i></a>

    </div>

    <?php
    require_once("connections/connection.php");


    $idplanta=$_GET["id_planta"];


    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);

    $query= "SELECT plantas.nome_cientifico , plantas.curiosidades, familias_plantas.familia, origens.origem, estatutos.estatuto
                            FROM plantas
                            INNER JOIN  familias_plantas
                            ON familias_plantas_id_familia = id_familia
                            INNER JOIN  origens
                            ON origens_id_origem = id_origem
                            INNER JOIN  estatutos
                            ON estatutos_id_estatuto = id_estatuto
                            WHERE id_plantas=?";
    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 'i', $idplanta);
        if (mysqli_stmt_execute($stmt)){
            mysqli_stmt_bind_result($stmt, $p_nome_cientifico, $p_curiosidades, $p_familia, $p_origem, $p_estatuto);
            mysqli_stmt_fetch($stmt);

        }else {
            echo "Error: " . mysqli_error($stmt);
        }

    }else {
        echo("Error description: " . mysqli_error($link));
    }

    mysqli_stmt_close($stmt);
    mysqli_close($link);


    ?>


    <?php



    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);

    $query= "SELECT registos.data_registo, registos.descricao, registos.imagem_registo, registos.ponto_referencia, registos.local_colheita, estados.estado, distritos.distrito, concelhos.concelho, freguesias.freguesia   FROM registos
             INNER JOIN estados ON estados_id_estado=id_estado
             INNER JOIN distritos ON distrito_id_distrito=id_distrito
             INNER JOIN concelhos ON concelhos_id_concelho=id_concelho
             INNER JOIN freguesias ON freguesias_id_freguesia=id_freguesia
             WHERE registos.plantas_id_plantas=? AND users_id_user=3";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 'i', $idplanta);
        if (mysqli_stmt_execute($stmt)){
            mysqli_stmt_bind_result($stmt, $data_registo, $descricao, $imagem, $ponto_referencia, $local_colheita, $estado, $distrito, $concelho, $freguesia);
            mysqli_stmt_fetch($stmt);

        }else {
            echo "Error: " . mysqli_error($stmt);
        }

    }else {
        echo("Error description: " . mysqli_error($link));
    }

    mysqli_stmt_close($stmt);
    mysqli_close($link);


    ?>



    <!--PLANTA-->
    <div class="page-content has-footer-menu pb-0">
        <div class="pb-0 mt-2">
            <div class=" m-0 rounded-0" data-card-height="cover">
                <div class="rounded-m">
                    <div class="content mb-5">
                        <div class="text-center">
                            <img src="images/profile/bruna.jpg" data-src="images/uploads/registos_plantas/<?=$imagem?>" style=" width: 200px ;height: 230px" class="rounded-m preload-img  img-fluid" alt="img">
                            <p class="pt-3 font-30 mb-2 text-white" style="font-style: italic; font-family: Georgia, sans-serif;"  ><?=$p_nome_cientifico?></p>

                            <p class='font-18 mt-0 mb-3 text-white' ><i>
                            <?php



                            $link = new_db_connection();
                            $stmt = mysqli_stmt_init($link);

                            $query= "SELECT nome_vulgar FROM plantas_vulgares WHERE plantas_id_plantas=?";

                            if (mysqli_stmt_prepare($stmt, $query)) {
                                mysqli_stmt_bind_param($stmt, 'i', $idplanta);
                                if (mysqli_stmt_execute($stmt)){
                                    mysqli_stmt_bind_result($stmt, $nome_vulg);
                                    while (mysqli_stmt_fetch($stmt)){
                                        echo "$nome_vulg ";
                                    };

                                }else {
                                    echo "Error: " . mysqli_error($stmt);
                                }

                            }else {
                                echo("Error description: " . mysqli_error($link));
                            }

                            mysqli_stmt_close($stmt);
                            mysqli_close($link);


                            ?>
                                </i></p>

                        </div>
                        <p class="font-11 mt-n2 mb-3"></p>
                        <br/>
                        <div class="row m-0 p-0">
                            <div class="mt-2 col-6">
                                <p class="text-white font-18 mb-2">fam??lia</p>
                                <hr class="mt-1 mb-1 text-white">
                                <p class="font-22 mt-1 text-white"><?=$p_familia?></p>
                                <p class="text-white font-18 mb-2">estado</p>
                                <hr  class="mt-1 mb-1 text-white">
                                <p class="font-22 mt-1 text-white"><?=$estado?></p>
                                <p class="text-white font-18 mb-2">origem</p>
                                <hr  class="mt-1 mb-1 text-white">
                                <p class="font-22 mt-1 text-white"><?=$p_origem?></p>
                                <p class="text-white font-18 mb-2">estatuto</p>
                                <hr  class="mt-1 mb-1 text-white">
                                <p class="font-22 mt-1 text-white"><?=$p_estatuto?></p>
                                <p class="text-white font-18 mb-2">data</p>
                                <hr  class="mt-1 mb-1 text-white">
                                <p class="font-22 mt-1 text-white"><?=$data_registo?></p>
                            </div>
                            <div class="mt-2 col-6 mb-4">
                                <p class="text-white font-18 mb-2">local da colheita</p>
                                <hr  class="mt-1 mb-1 text-white">
                                <p class="font-22 mt-1 text-white"><?=$local_colheita?></p>
                                <p class="text-white font-18 mb-2">distrito</p>
                                <hr  class="mt-1 mb-1 text-white">
                                <p class="font-22 mt-1 text-white"><?=$distrito?></p>
                                <p class="text-white font-18 mb-2">concelho</p>
                                <hr  class="mt-1 mb-1 text-white">
                                <p class="font-22 mt-1 text-white"><?=$concelho?></p>
                                <p class="text-white font-18 mb-2">freguesia</p>
                                <hr  class="mt-1 mb-1 text-white">
                                <p class="font-22 mt-1 text-white"><?=$freguesia?></p>
                                <p class="text-white font-18 mb-2">refer??ncia local</p>
                                <hr  class="mt-1 mb-1 text-white">
                                <p class="font-22 mt-1 text-white"><?=$ponto_referencia?></p>
                            </div>
                            <div class="mt-2 row col-12 p-0 m-0  mb-4">
                                <p class="font-18 text-white mb-2">descri????o de observa????o</p>
                                <hr class="mt-1 mb-1 text-white">
                                <p class="font-22 mt-1 text-white"><?=$descricao?>
                                </p>
                            </div>
                            <div class="mt-2 row col-12 p-0 m-0">
                                <p class="font-18 text-white mb-2">curiosidades</p>
                                <hr class="mt-1 mb-1 text-white">
                                <p class="font-22 mt-1 text-white"><?=$p_curiosidades?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white row p-0 m-0 mb-4 col-12" style="border-radius: 15px;">
        <div class="header-logo-app header-amigos mt-4 mb-3">
            <p class=" p-0 mb-0 " style="font-size: 18px">
                coletores
            </p>
        </div>
        <div class="splide single-slider mt-4" id="single-slider-3" style="padding-bottom: 70px">
            <div class="splide__track">
                <div class="splide__list">
                    <div class="splide__slide">
                        <div data-card-height="320"  class="card mx-2 bg-18" style="border-radius: 15px">
                            <div class="card-bottom text-center mb-4">
                                <p class="color-white text-uppercase font-22 mb-0 float-left fa fa-circle px-4"></p>
                                <p class="color-white text-uppercase font-22 mb-0 float-left">rita</p>
                            </div>
                        </div>
                    </div>
                    <div class="splide__slide">
                        <div data-card-height="320"  class="card mx-2 feed-33  " style="border-radius: 15px">
                            <div class="card-bottom text-center mb-4">
                                <p class="color-white text-uppercase font-22 mb-0 float-left fa fa-circle px-4"></p>
                                <p class="color-white text-uppercase font-22 mb-0 float-left">candy</p>
                            </div>
                        </div>
                    </div>
                    <div class="splide__slide">
                        <div data-card-height="320"  class="card mx-2 feed-333 " style="border-radius: 15px">
                            <div class="card-bottom text-center mb-4">
                                <p class="color-white text-uppercase font-22 mb-0 float-left fa fa-circle px-4"></p>
                                <p class="color-white text-uppercase font-22 mb-0 float-left">benny</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="scripts/bootstrap.min.js" type="text/javascript"></script>
<script src="scripts/custom.js" type="text/javascript"></script>
</body>
</html>






