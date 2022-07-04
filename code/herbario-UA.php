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
    <link rel="icon" type="image/png" href="images/favicon.png" sizes="32x32"/>
</head>

<body class="theme-light">

<div id="preloader"><div class="spinner-border color-red-dark" role="status"></div></div>
<div id="page" class="has-footer-menu feed-2">


    <!-- FOOTER MENU-->
    <div class="footer-bar-4 " id="footer-bar">
        <a href="perfil.html"><i><img id="demo" onclick="myFunction()" class="icons2"
                                      src="images/icons/perfil_Prancheta%201.png"></i></a>
        <a class="active-nav" href="feed.html"><img id="click2" class="icons2"
                                                    src="images/icons/home_Prancheta%201.png"></i></a>
        <a href="herbario-UA.html"><img id="click3" class="icons2" src="images/icons/herbario_Prancheta%201.png"></i>
        </a>
    </div>

    <!-- Global Menus-->
    <div class="menu menu-box-modal menu-gradient" data-menu-height="cover" data-menu-load="menu-color.html"
         data-menu-width="cover" id="menu-color"></div>
    <div class="menu menu-box-bottom menu-box-detached" data-menu-effect="menu-parallax" data-menu-height="390"
         data-menu-load="menu-share.html" id="menu-share"></div>

    <!--HEADER: LOGO E MENU DE CIMA-->
    <div class="header-logo-app header1 mt-4 mb-4 ">
        <a class="header-icon header-icon-1" href="evento.html"><i><img class="icons"
                                                                        src="images/icons/event_Prancheta%201.png"></i></a>
        <a class="header-icon header-icon-1" href="evento.html"><i><img class="icons"
                                                                        src="images/icons/event_Prancheta%201.png"></i></a>
        <p class="header-icon font-barra font-31 margem-biblio mt-1 ">BIBLIOTECA</p>

    </div>


    <!-- BARRA PESQUISA -->
    <div class="page-content search-page mt-4">
        <!-- PESQUISA E ICONS -->
        <div class="search-box search-header feed-0 card-style me-4 ms-4">
            <a onclick="display3()" class="header-icon header-icon-1" ><i><img class="icons"
                                                                                                src="images/icons/zoom_Prancheta%201.png"></i></a>
            <a onclick="display()" class="header-icon header-icon-1 me-5" href="login.html"><i><img class="icons"
                                                                                                    src="images/icons/filter_b.png"></i></a>
            <a onclick="display1()" class="header-icon header-icon-1 margem_lupa" href="login.html"><i><img id="icon-s"
                                                                                                            class="icons"
                                                                                                            src="images/icons/search-white_Prancheta%201.png"></i></a>
            <!--<i class="ms-2"><img class="icons"
                   src="images/icons/search-white_Prancheta%201.png"></i>-->
            <input style="border-bottom: 1px solid white" id="pesquisa" type="text" class=" color-white font-18"
                   placeholder="pesquisa aqui..." data-search>

            <a href="#" class="disabled"><i class="fa fa-times-circle color-red-dark"></i></a>
        </div>

        <!-- RESULTADOS -->
        <div class="search-results feed-0 disabled-search-list card card-style ms-2 me-2 ">
            <div class="content">
                <div data-filter-item data-filter-name="  all products eazy mobile"
                     style="border-bottom: 0.5px solid #eeeee4" class="search-result-list mt-5">
                    <img class="preload-img" data-src="images/pictures/6.jpg" alt="img">
                    <p class="  font-20  color-branco">Eazy | Mobile Website</p>

                    <a href="#" class=" feed-2"><i class="color-white fa-2xl fa fa-angle-right"></i></a>
                </div>

                <div class="ms-4 mt-3 search-no-results disabled">
                    <p class="bold top-10 font-49 color-branco">nop..:(</p>
                    <span class="under-heading font-11 color-branco opacity-70">There's nothing matching the description you're looking for, try a different keyword.</span>
                </div>
            </div>
        </div>

        <!-- FILTROS PESQUISA -->
        <div id="filter" class="search-trending card card-style feed-3 mt-5">
            <div class="list-group list-custom-small me-5 ms-3">
                <a href="#">
                    <span class="font-400 color-white">All Products</span>
                    <i class="color-white fa fa-angle-right"></i>
                </a>
                <a href="#">
                    <span class="font-400 color-white">Eazy Mobile</span>
                    <i class="color-white fa fa-angle-right"></i>
                </a>
                <a href="#">
                    <span class="font-400 color-white">Mega Mobile</span>
                    <i class="color-white fa fa-angle-right"></i>
                </a>
                <a href="#">
                    <span class="font-400 color-white">Ultra Mobile</span>
                    <i class="color-white fa fa-angle-right"></i>
                </a>
                <a href="#" class="border-0">
                    <span class="font-400 color-white">Vinga Mobile</span>
                    <i class="color-white fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>


    <!-- BIBLIOTECA MINI-->
    <div id="biblioteca">
        <!-- A-->
        <?php
        require_once("connections/connection.php");

        $arrays = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");

        foreach ($arrays as $array) {

            $link = new_db_connection();
            $stmt = mysqli_stmt_init($link);
            $query = "SELECT  id_plantas, nome_cientifico, registos.imagem_registo FROM plantas 
                      INNER JOIN registos ON plantas_id_plantas=plantas.id_plantas
                      WHERE nome_cientifico LIKE ? AND registos.users_id_user=3 ";

            $pesquisa = $array . "%";
            $bool = 0;
            $bool2 = 0;


            if (mysqli_stmt_prepare($stmt, $query)) {
                mysqli_stmt_bind_param($stmt, "s", $pesquisa);
                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_bind_result($stmt, $id_planta, $nome_cientifico, $imagem);
                    while (mysqli_stmt_fetch($stmt)) {
                        if ($bool2 == 0) {
                            echo " <div class='card feed-0 card-style'>
                                        <div class='content mb-0'>
                                        <div class='row justify-content-center'>
                                        <div class='col-8'>
                                            <div class='list-group list-custom-small list-menu ms-2 me-2'>
                                                <hr style='height: 1px' class='color-branco'>";

                        }

                        $bool = 1;
                        echo "
                                                <a href='plantaherbario.php?id_planta=$id_planta'>
                                                    <img class='rounded rounded-m' style='height:35px 'src='images/uploads/registos_plantas/$imagem'>
                                                    <span class='font15 color-branco' style='font-family: Georgia, sans-serif; font-style: italic'>$nome_cientifico</span>
                                                    <i class='color-branco fa fa-angle-right'></i>
                                                </a>
                                        ";



                        $bool2 = 1;
                    }
                    if ($bool2 == 1) {
                        echo "           </div>
                                         </div>
                                         <div class='col-4'>
                                                <p class='font-biblio'>$array</p>
                                          </div>  
                                          
                                      </div>
                                       </div>
                                        </div>";

                    }

                } else {
                    echo "Error: " . mysqli_error($stmt);
                }
                mysqli_stmt_close($stmt);
            } else {
                echo("Error description: " . mysqli_error($link));
            }
            mysqli_close($link);




        }


        ?>

    </div>



</div>
<script src="scripts/bootstrap.min.js" type="text/javascript"></script>
<script src="scripts/custom.js" type="text/javascript"></script>
<script>



</script>

</body>
</html>