<?php
session_start();
?>
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
    <link rel="icon" type="image/png" href="images/favicon.png" sizes="32x32"/>
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

    <!--HEADER: LOGO E MENU DE CIMA-->
    <div class="header-logo-app header mt-4 mb-4 ">
        <a class="header-icon header-icon-1" href="menu_herbarios.html"><i><img class="icons"
                                                                               src="images/icons/undo.png"></i></a>

        <p class="header-icon font-barra font-31 margem-herbario mt-1 ">HERBÁRIO</p>
    </div>

    <!-- NOVO REGISTO -->
    <div class="page-content has-footer-menu ">
        <a href="registar-planta.php" class="card card-style feed-ind" data-card-height="350">
            <div class="card-top text-start">
                <div class="mt-3 ms-3 color-white">
                    <i class="fa fa-angle-left font-30" style="transform:rotate(45deg)"></i><br>
                </div>
            </div>

            <div class="card-top text-end">
                <div class="mt-3 me-3 color-white">
                    <i class="fa fa-angle-right font-30" style="transform:rotate(-45deg)"></i><br>
                </div>
            </div>

            <div class="card-center text-center">
                <div class="mt-3 color-white">
                    <i class="fa fa-circle font-40"></i><br>Novo registo
                </div>
            </div>

            <div class="card-bottom text-start">
                <div class="mb-3 ms-3 color-white">
                    <br>
                    <i class="fa fa-angle-left font-30 pt-1" style="transform:rotate(-45deg)"></i>
                </div>
            </div>

            <div class="card-bottom text-end">
                <div class="mb-3 me-3 color-white">
                    <br>
                    <i class="fa fa-angle-right pt-1 font-30" style="transform:rotate(45deg)"></i>
                </div>
            </div>
            <div class="card-overlay "></div>
        </a>


        <!-- ACORDEÃO TIRIRIRI -->
        <div class="accordion " id="accordionExample">

            <?php
            require_once("connections/connection.php");

            $id_user = $_SESSION ["id_utilizador"];

            $link = new_db_connection();
            $stmt = mysqli_stmt_init($link);
            $query = "SELECT  id_pasta, nome_pasta FROM pastas
                      WHERE  pastas.users_id_user=?";

            $res = 0;

            if (mysqli_stmt_prepare($stmt, $query)) {
                mysqli_stmt_bind_param($stmt, "i", $id_user);
                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_bind_result($stmt, $id_pasta, $nome_pasta);
                    mysqli_stmt_store_result($stmt);
                    while (mysqli_stmt_fetch($stmt)) {
                        $res = 1;
                        ?>


                        <div class="accordion-item fee-4 ">
                            <p class="accordion-header" id="heading<?= $id_pasta ?>">
                                <button class="accordion-button collapsed font-18 text-uppercase" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse<?= $id_pasta ?>"
                                        aria-expanded="true" aria-controls="collapse1">
                                    <?= $nome_pasta ?>
                                </button>
                            </p>
                            <div id="collapse<?= $id_pasta ?>" class="accordion-collapse collapse"
                                 aria-labelledby="heading1" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="card card-style">
                                        <div class="row text-center row-cols-3 mb-0">

                                            <?php


                                            $stmt2 = mysqli_stmt_init($link);

                                            $query= "SELECT registos.id_registo, registos.imagem_registo, plantas.nome_cientifico FROM registos
                                         INNER JOIN plantas ON plantas_id_plantas=id_plantas
                                         WHERE pastas_id_pasta=?";

                                            if (mysqli_stmt_prepare($stmt2, $query)) {
                                                mysqli_stmt_bind_param($stmt2, 'i', $id_pasta);
                                                if (mysqli_stmt_execute($stmt2)) {
                                                    mysqli_stmt_bind_result($stmt2, $id_registo, $imagem_registo, $nome_cientifico);

                                                    while (mysqli_stmt_fetch($stmt2)) {
                                                        echo "<a class='col'  href='planta_individual.php?id_registo=$id_registo' title='Vynil and Typerwritter'>
                                                                <img src='' data-src='images/uploads/registos_plantas/$imagem_registo' style='height: 130px' class='rounded-m preload-img  img-fluid' alt='img'>
                                                                <p class='pb-1'>$nome_cientifico</p>
                                                            </a>";
                                                    }
                                                    mysqli_stmt_close($stmt2);

                                                } else {
                                                    echo "ola";
                                                    echo "Error: " . mysqli_error($stmt2);
                                                }

                                            } else {
                                                echo "adeus";
                                                echo("Error description: " . mysqli_error($link));
                                            }



                                            ?>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php

                    }
                    mysqli_stmt_close($stmt);
                    }else {
                    echo "Error: " . mysqli_error($stmt);
                    }

                    } else {
                    echo("Error description: " . mysqli_error($link));
                    }
                    mysqli_close($link);

                    if ($res == 0) {
                        ?>
                        <div class="accordion-item">
                            <p class="accordion-header" id="heading4">
                                <button class="accordion-button collapsed font-18" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false"
                                        aria-controls="collapse4">
                                    CRIAR PASTA
                                </button>
                            </p>
                            <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="card card-style">
                                        <div class="row text-center row-cols-3 mb-0">


                                            <a class="col" data-gallery="gallery-1" href="images/pictures/1t.jpg"
                                               title="Vynil and Typerwritter">
                                                <img src="images/empty.png" data-src="images/pictures/25t.jpg"
                                                     style="height: 130px" class="rounded-m preload-img  img-fluid"
                                                     alt="img">
                                                <p class=" pb-1">Writer</p>
                                            </a>
                                            <a class="col" data-gallery="gallery-1" href="images/pictures/8t.jpg"
                                               title="Cream Cookie">
                                                <img src="images/empty.png" data-src="images/pictures/25t.jpg"
                                                     style="height: 130px" class="rounded-m preload-img  img-fluid"
                                                     alt="img">
                                                <p class=" pb-1">Cream</p>
                                            </a>
                                            <a class="col" data-gallery="gallery-1" href="images/pictures/14t.jpg"
                                               title="Cookies and Flowers">
                                                <img src="images/empty.png" data-src="images/pictures/25t.jpg"
                                                     style="height: 130px" class="rounded-m preload-img  img-fluid"
                                                     alt="img">
                                                <p class=" pb-1">Cookie</p>
                                            </a>
                                            <a class="col" data-gallery="gallery-1" href="images/pictures/21t.jpg"
                                               title="Pots and Pans">
                                                <img src="images/empty.png" data-src="images/pictures/25t.jpg"
                                                     style="height: 130px" class="rounded-m preload-img  img-fluid"
                                                     alt="img">
                                                <p class=" pb-1">Pots</p>
                                            </a>
                                            <a class="col" data-gallery="gallery-1" href="images/pictures/26t.jpg"
                                               title="Berries are Packed with Fiber">
                                                <img src="images/empty.png" data-src="images/pictures/25t.jpg"
                                                     style="height: 130px" class="rounded-m preload-img  img-fluid"
                                                     alt="img">
                                                <p class=" pb-1">Berry</p>
                                            </a>
                                            <a class="col" data-gallery="gallery-1" href="images/pictures/23t.jpg"
                                               title="A beautiful Retro Camera">
                                                <img src="images/empty.png" data-src="images/pictures/25t.jpg"
                                                     style="height: 130px" class="rounded-m preload-img  img-fluid"
                                                     alt="img">
                                                <p class=" pb-1">Camera</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php
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

</html>