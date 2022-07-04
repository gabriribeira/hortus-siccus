<?php session_start(); ?>

<!DOCTYPE html>
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

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var tecla = $(this).val();
                $.ajax({ // ajax call starts
                        url: 'scripts_php/sc_pesquisa_registar_planta.php', // JQuery loads serverside.php
                        data: 'tecla=' + tecla, // Send value of the clicked button
                        dataType: 'json', // Choosing a JSON datatype
                        type: 'POST', // Default is GET
                    })
                    .done(function(data) {
                        $('#resultados-pesquisa').html('');
                        for (var i in data) {
                            $('#resultados-pesquisa').append('<a class="resultado" href="registar-planta.php?id=' + data[i]["id"] + '"><h4 class="pt-2" style="color: black; font-size: 1rem; font-weight: bold;">' + data[i]["nome"] + '</h4></a>');
                            $('#resultados-pesquisa').append('<hr>');
                        }
                    })
                    .fail(function() { // Se existir um erro no pedido
                        $('#resultados-pesquisa').html('Data error'); // Escreve mensagem de erro na listagem de vinhos
                    });
                return false; // keeps the page from not refreshing
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#distrito').on('change', function() {
                var value = $(this).val();
                console.log(value)
                $.ajax({ // ajax call starts
                        url: 'scripts_php/sc_restringir_distritos.php', // JQuery loads serverside.php
                        data: 'value=' + value, // Send value of the clicked button
                        dataType: 'json', // Choosing a JSON datatype
                        type: 'POST', // Default is GET
                    })
                    .done(function(data) {
                        for (var i in data) {
                            $('#concelho-option').append('<option value="' + data[i]["id"] + '">' + data[i]["nome"] + '</option>');
                            $('#concelho-option').append('<hr>');
                        }
                    })
                    .fail(function() { // Se existir um erro no pedido
                        $('#concelho-option').append('<p>Erro a Processar o Pedido</p>');
                    });
                return false; // keeps the page from not refreshing
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#concelho-option').on('change', function() {
                var value = $(this).val();
                console.log(value)
                $.ajax({ // ajax call starts
                        url: 'scripts_php/sc_restringir_concelhos.php', // JQuery loads serverside.php
                        data: 'value2=' + value, // Send value of the clicked button
                        dataType: 'json', // Choosing a JSON datatype
                        type: 'POST', // Default is GET
                    })
                    .done(function(data) {
                        for (var i in data) {
                            $('#freguesia-option').append('<option value="' + data[i]["id"] + '">' + data[i]["nome"] + '</option>');
                            $('#freguesia-option').append('<hr>');
                        }
                    })
                    .fail(function() { // Se existir um erro no pedido
                        $('#freguesia-option').append('<p>Erro a Processar o Pedido</p>');
                    });
                return false; // keeps the page from not refreshing
            });
        });
    </script>

</head>

<body class="theme-light feed-7">

    <div id="preloader">
        <div class="spinner-border color-red-dark" role="status"></div>
    </div>


    <div id="page">
        <!-- FOOTER MENU-->
        <div class="footer-bar-4 " id="footer-bar">
            <a href="perfil.html"><i><img id="demo" onclick="myFunction()" class="icons2" src="images/icons/perfil_Prancheta%201.png"></i></a>
            <a class="active-nav" href="feed.html.html"><img id="click2" class="icons2" src="images/icons/home_Prancheta%201.png"></i></a>
            <a href="herbario-UA.html"><img id="click3" class="icons2" src="images/icons/herbario_Prancheta%201.png"></i></a>
        </div>

        <!-- Global Menus-->
        <div class="menu menu-box-modal menu-gradient" data-menu-height="cover" data-menu-load="menu-color.html" data-menu-width="cover" id="menu-color"></div>
        <div class="menu menu-box-bottom menu-box-detached" data-menu-effect="menu-parallax" data-menu-height="390" data-menu-load="menu-share.html" id="menu-share"></div>

        <!--HEADER: LOGO E MENU DE CIMA-->
        <div class="header-logo-app header2 ms-4 mt-4 mb-0 ">
            <a class="header-icon header-icon-1" href="editar_perfil.html"><i><img class="icons" src="images/icons/undo.png"></i></a>
        </div>

        <!--PLANTA-->
        <div class="page-content has-footer-menu ">
            <div class="pb-0 mt-2">
                <div class=" m-0 rounded-0" data-card-height="cover">
                    <div class=" rounded-m">
                        <div class="content mb-5">

                            <form action="scripts_php/sc_registo_planta.php" method="post" enctype="multipart/form-data">

                                <?php

                                if (isset($_GET["id"]) && $_GET["id"] != "") {
                                    require_once('connections/connection.php');
                                    $link = new_db_connection();
                                    /* create a prepared statement */
                                    $stmt = mysqli_stmt_init($link);
                                    $query = "SELECT id_plantas, nome_cientifico, origens_id_origem, origens.origem, estatutos_id_estatuto, estatutos.estatuto, familias_plantas_id_familia, familias_plantas.familia, plantas_vulgares.nome_vulgar
                                    FROM plantas 
                                    INNER JOIN origens
                                    ON plantas.origens_id_origem = origens.id_origem
                                    INNER JOIN estatutos
                                    ON plantas.estatutos_id_estatuto = estatutos.id_estatuto
                                    INNER JOIN familias_plantas
                                    ON plantas.familias_plantas_id_familia = familias_plantas.id_familia
                                    INNER JOIN plantas_vulgares
                                    ON plantas.id_plantas = plantas_vulgares.plantas_id_plantas
                                    WHERE id_plantas = ?";

                                    if (mysqli_stmt_prepare($stmt, $query)) {
                                        mysqli_stmt_bind_param($stmt, 's', $_GET["id"]);
                                        /* execute the prepared statement */
                                        if (mysqli_stmt_execute($stmt)) {
                                            /* bind result variables */
                                            mysqli_stmt_bind_result($stmt, $id, $nome, $id_origem, $origem, $id_estatuto, $estatuto, $id_familia, $familia, $vulgar);
                                            mysqli_stmt_fetch($stmt);
                                        } else {
                                            echo "Error: " . mysqli_stmt_error($stmt);
                                        }
                                        /* close statement */
                                        mysqli_stmt_close($stmt);
                                    } else {
                                        echo "Error: " . mysqli_error($link);
                                    }
                                }

                                ?>

                                <div class="text-center justify-content-center">
                                    <div id="div-imagem" style="border: 3px solid black; width: 200px ;height: 230px; display: block; text-align: center; justify-content: center; margin:auto;" class="rounded-m preload-img  img-fluid"></div>
                                    <img id="blah" src="#" style=" width: 200px ;height: 230px; display: none; margin: auto;" class="rounded-m preload-img  img-fluid">
                                    <div class="mt-2">
                                        <input type="file" name="fileToUpload" id="fileToUpload" style="width: 0.1px; height: 0.1px; opacity: 0; overflow: hidden; position: absolute; z-index: -1;">
                                        <label for="fileToUpload" style="border: 2px solid #2b2b2b; padding: 4px 15px; margin-top: 10px; font-weight: bold; color: #eeeee4; background-color: #2b2b2b;">Escolher Imagem</label>
                                    </div>
                                    <p class="pt-3 color-amarelo font-30 mb-2" style="font-style: italic; font-family: Georgia, sans-serif;">
                                        <?php if (isset($_GET["id"]) && $_GET["id"] != "") {
                                            echo $nome;
                                            echo '<input type="hidden" name="id_planta" value="' . $_GET["id"] . '">';
                                        } else {
                                            echo "Nome Científico";
                                        } ?>
                                    </p>
                                    <?php
                                    if (!isset($_GET["id"]) || $_GET["id"] == "") { ?>
                                        <div class="input-style input2 has-icon validate-field mb-4">
                                            <input type="text" class="form-control validate-name" id="search" placeholder="Selecionar Planta...">
                                            <label for="form1" class="color-highlight"></label>
                                            <div id="resultados-pesquisa"></div>
                                        </div>
                                    <?php } ?>

                                    <p class="color-amarelo font-18 mt-0 mb-3"><i>
                                            <?php if (isset($_GET["id"]) && $_GET["id"] != "") {
                                                echo $vulgar;
                                            } else {
                                                echo "Nome Comum";
                                            } ?>
                                            <i></p>
                                </div>
                                <p class="font-11 mt-n2 mb-3"></p>
                                <br />

                                <div class="row mb-0 mt-2" style="margin-left: 1px;">
                                    <div class="col-12">
                                        <div class="form-check icon-check">
                                            <input class="form-check-input" type="checkbox" name="check_nova_planta" id="check_nova_planta">
                                            <label class="form-check-label text-dark font-18" for="check_nova_planta">Criar nova planta</label>
                                            <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                                            <i class="icon-check-2 fa fa-check-square font-16 "></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-0 p-0">
                                    <div class="mt-2 col-6">
                                        <div id="criacao-planta" style="display: none;">
                                            <p class="color-amarelo font-18 mb-2">Nome Científico</p>
                                            <hr class="mt-1 mb-1">
                                            <div class="input-style input1 has-icon validate-field mb-4">
                                                <input type="text" name="nome_cientifico" class="form-control validate-name" id="form1">
                                                <label for="form1" class="color-highlight"></label>
                                            </div>
                                        </div>


                                        <p class="color-amarelo font-18 mb-2">familia</p>
                                        <hr class="mt-1 mb-1">
                                        <div class="input-style input1 no-icon mb-4">
                                            <?php
                                            if (isset($_GET["id"]) && $_GET["id"] != "") { ?>
                                                <label for="form5" class="color-highlight"></label>
                                                <select id="form5" name="familia">
                                                    <option value="<?= $id_familia ?>" selected><?= $familia ?></option>
                                                    <option value="" disabled>Select a Value</option>
                                                    <?php
                                                    require_once('connections/connection.php');
                                                    $link = new_db_connection();
                                                    /* create a prepared statement */
                                                    $stmt7 = mysqli_stmt_init($link);
                                                    $query = "SELECT id_familia, familia FROM familias_plantas ORDER BY familia ASC";

                                                    if (mysqli_stmt_prepare($stmt7, $query)) {
                                                        /* execute the prepared statement */
                                                        if (mysqli_stmt_execute($stmt7)) {
                                                            /* bind result variables */
                                                            mysqli_stmt_bind_result($stmt7, $id_familia, $familia);
                                                            while (mysqli_stmt_fetch($stmt7)) { ?>
                                                                <option value="<?= $id_familia ?>"><?= $familia ?></option>
                                                    <?php }
                                                        } else {
                                                            echo "Error: " . mysqli_stmt_error($stmt7);
                                                        }
                                                        /* close statement */
                                                        mysqli_stmt_close($stmt7);
                                                    } else {
                                                        echo "Error: " . mysqli_error($link);
                                                    }
                                                    ?>
                                                </select>
                                            <?php } else { ?>
                                                <label for="form5" class="color-highlight"></label>
                                                <select id="form5" name="familia">
                                                    <option value="" disabled selected>Select a Value</option>
                                                    <?php
                                                    require_once('connections/connection.php');
                                                    $link = new_db_connection();
                                                    /* create a prepared statement */
                                                    $stmt7 = mysqli_stmt_init($link);
                                                    $query = "SELECT id_familia, familia FROM familias_plantas ORDER BY familia ASC";

                                                    if (mysqli_stmt_prepare($stmt7, $query)) {
                                                        /* execute the prepared statement */
                                                        if (mysqli_stmt_execute($stmt7)) {
                                                            /* bind result variables */
                                                            mysqli_stmt_bind_result($stmt7, $id_familia, $familia);
                                                            while (mysqli_stmt_fetch($stmt7)) { ?>
                                                                <option value="<?= $id_familia ?>"><?= $familia ?></option>
                                                    <?php }
                                                        } else {
                                                            echo "Error: " . mysqli_stmt_error($stmt7);
                                                        }
                                                        /* close statement */
                                                        mysqli_stmt_close($stmt7);
                                                    } else {
                                                        echo "Error: " . mysqli_error($link);
                                                    }
                                                    ?>
                                                </select>
                                            <?php } ?>
                                            <span><i class="fa fa-chevron-down"></i></span>
                                            <i class="fa fa-check disabled valid color-green-dark"></i>
                                            <i class="fa fa-check disabled invalid color-red-dark"></i>
                                            <em></em>
                                        </div>


                                        <p class="color-amarelo font-18 mb-2">estado</p>
                                        <hr class="mt-1 mb-1">
                                        <div class="input-style input1 no-icon mb-4">
                                            <label for="form5" class="color-highlight"></label>
                                            <select id="form5" name="estado">
                                                <option value="default" disabled selected>Select a Value</option>
                                                <?php
                                                require_once('connections/connection.php');
                                                $link = new_db_connection();
                                                /* create a prepared statement */
                                                $stmt2 = mysqli_stmt_init($link);
                                                $query = "SELECT id_estado, estado FROM estados ORDER BY id_estado ASC";

                                                if (mysqli_stmt_prepare($stmt2, $query)) {
                                                    /* execute the prepared statement */
                                                    if (mysqli_stmt_execute($stmt2)) {
                                                        /* bind result variables */
                                                        mysqli_stmt_bind_result($stmt2, $id_estado, $estado);
                                                        while (mysqli_stmt_fetch($stmt2)) { ?>
                                                            <option value="<?= $id_estado ?>"><?= $estado ?></option>
                                                <?php }
                                                    } else {
                                                        echo "Error: " . mysqli_stmt_error($stmt2);
                                                    }
                                                    /* close statement */
                                                    mysqli_stmt_close($stmt2);
                                                } else {
                                                    echo "Error: " . mysqli_error($link);
                                                }
                                                ?>
                                            </select>
                                            <span><i class="fa fa-chevron-down"></i></span>
                                            <i class="fa fa-check disabled valid color-green-dark"></i>
                                            <i class="fa fa-check disabled invalid color-red-dark"></i>
                                            <em></em>
                                        </div>


                                        <p class="color-amarelo font-18 mb-2">origem</p>
                                        <hr class="mt-1 mb-1">
                                        <div class="input-style input1 no-icon mb-4">
                                            <?php
                                            if (isset($_GET["id"]) && $_GET["id"] != "") { ?>
                                                <label for="form5" class="color-highlight"></label>
                                                <select id="origem" name="origem">
                                                    <option value="<?= $id_origem ?>" selected><?= $origem ?></option>
                                                    <option value="" disabled>Select a Value</option>
                                                    <?php
                                                    require_once('connections/connection.php');
                                                    $link = new_db_connection();
                                                    /* create a prepared statement */
                                                    $stmt4 = mysqli_stmt_init($link);
                                                    $query = "SELECT id_origem, origem FROM origens ORDER BY origem ASC";

                                                    if (mysqli_stmt_prepare($stmt4, $query)) {
                                                        /* execute the prepared statement */
                                                        if (mysqli_stmt_execute($stmt4)) {
                                                            /* bind result variables */
                                                            mysqli_stmt_bind_result($stmt4, $id_origem, $origem);
                                                            while (mysqli_stmt_fetch($stmt4)) { ?>
                                                                <option value="<?= $id_origem ?>"><?= $origem ?></option>
                                                    <?php }
                                                        } else {
                                                            echo "Error: " . mysqli_stmt_error($stmt4);
                                                        }
                                                        /* close statement */
                                                        mysqli_stmt_close($stmt4);
                                                    } else {
                                                        echo "Error: " . mysqli_error($link);
                                                    }
                                                    ?>
                                                </select>
                                            <?php } else { ?>

                                                <label for="form5" class="color-highlight"></label>
                                                <select id="origem" name="origem">
                                                    <option value="" disabled selected>Select a Value</option>
                                                    <?php
                                                    require_once('connections/connection.php');
                                                    $link = new_db_connection();
                                                    /* create a prepared statement */
                                                    $stmt4 = mysqli_stmt_init($link);
                                                    $query = "SELECT id_origem, origem FROM origens ORDER BY origem ASC";

                                                    if (mysqli_stmt_prepare($stmt4, $query)) {
                                                        /* execute the prepared statement */
                                                        if (mysqli_stmt_execute($stmt4)) {
                                                            /* bind result variables */
                                                            mysqli_stmt_bind_result($stmt4, $id_origem, $origem);
                                                            while (mysqli_stmt_fetch($stmt4)) { ?>
                                                                <option value="<?= $id_origem ?>"><?= $origem ?></option>
                                                    <?php }
                                                        } else {
                                                            echo "Error: " . mysqli_stmt_error($stmt4);
                                                        }
                                                        /* close statement */
                                                        mysqli_stmt_close($stmt4);
                                                    } else {
                                                        echo "Error: " . mysqli_error($link);
                                                    }
                                                    ?>
                                                </select>

                                            <?php } ?>
                                            <span><i class="fa fa-chevron-down"></i></span>
                                            <i class="fa fa-check disabled valid color-green-dark"></i>
                                            <i class="fa fa-check disabled invalid color-red-dark"></i>
                                            <em></em>
                                        </div>


                                        <p class="color-amarelo font-18 mb-2">estatuto</p>
                                        <hr class="mt-1 mb-1">
                                        <div class="input-style input1 no-icon mb-4">
                                            <?php
                                            if (isset($_GET["id"]) && $_GET["id"] != "") { ?>
                                                <label for="form5" class="color-highlight"></label>
                                                <select id="estatuto" name="estatuto">
                                                    <option value="" disabled selected><?= $estatuto ?></option>
                                                    <option value="" disabled>Select a Value</option>
                                                    <?php
                                                    require_once('connections/connection.php');
                                                    $link = new_db_connection();
                                                    /* create a prepared statement */
                                                    $stmt5 = mysqli_stmt_init($link);
                                                    $query = "SELECT id_estatuto, estatuto FROM estatutos ORDER BY estatuto ASC";

                                                    if (mysqli_stmt_prepare($stmt5, $query)) {
                                                        /* execute the prepared statement */
                                                        if (mysqli_stmt_execute($stmt5)) {
                                                            /* bind result variables */
                                                            mysqli_stmt_bind_result($stmt5, $id_estatuto, $estatuto);
                                                            while (mysqli_stmt_fetch($stmt5)) { ?>
                                                                <option value="<?= $id_estatuto ?>"><?= $estatuto ?></option>
                                                    <?php }
                                                        } else {
                                                            echo "Error: " . mysqli_stmt_error($stmt5);
                                                        }
                                                        /* close statement */
                                                        mysqli_stmt_close($stmt5);
                                                    } else {
                                                        echo "Error: " . mysqli_error($link);
                                                    }
                                                    ?>
                                                </select>
                                            <?php } else { ?>
                                                <label for="form5" class="color-highlight"></label>
                                                <select id="estatuto" name="estatuto">
                                                    <option value="<?=$id_estatuto?>" disabled selected>Select a Value</option>
                                                    <?php
                                                    require_once('connections/connection.php');
                                                    $link = new_db_connection();
                                                    /* create a prepared statement */
                                                    $stmt5 = mysqli_stmt_init($link);
                                                    $query = "SELECT id_estatuto, estatuto FROM estatutos ORDER BY estatuto ASC";

                                                    if (mysqli_stmt_prepare($stmt5, $query)) {
                                                        /* execute the prepared statement */
                                                        if (mysqli_stmt_execute($stmt5)) {
                                                            /* bind result variables */
                                                            mysqli_stmt_bind_result($stmt5, $id_estatuto, $estatuto);
                                                            while (mysqli_stmt_fetch($stmt5)) { ?>
                                                                <option value="<?= $id_estatuto ?>"><?= $estatuto ?></option>
                                                    <?php }
                                                        } else {
                                                            echo "Error: " . mysqli_stmt_error($stmt5);
                                                        }
                                                        /* close statement */
                                                        mysqli_stmt_close($stmt5);
                                                    } else {
                                                        echo "Error: " . mysqli_error($link);
                                                    }
                                                    ?>
                                                </select>
                                            <?php } ?>
                                            <span><i class="fa fa-chevron-down"></i></span>
                                            <i class="fa fa-check disabled valid color-green-dark"></i>
                                            <i class="fa fa-check disabled invalid color-red-dark"></i>
                                            <em></em>
                                        </div>



                                        <p class="color-amarelo font-18 mb-2">data</p>
                                        <hr class="mt-1 mb-1">
                                        <div class="input-style input1 no-icon mb-4">
                                            <input type="date" value="2030-12-31" name="data" value="2030-12-31" max="2030-01-01" min="2021-01-01" class="form-control validate-text" id="form6" placeholder="Phone">
                                            <label for="form6" class="color-highlight"></label>
                                            <i class="fa fa-check disabled valid me-4 pe-3 font-12 color-green-dark"></i>
                                            <i class="fa fa-check disabled invalid me-4 pe-3 font-12 color-red-dark"></i>
                                        </div>
                                    </div>
                                    <div class="mt-2 col-6 mb-4">

                                        <div id="criacao-planta2" style="display: none;">
                                            <p class="color-amarelo font-18 mb-2">Nome Comum</p>
                                            <hr class="mt-1 mb-1">
                                            <div class="input-style input1  has-icon validate-field mb-4">
                                                <input type="text" name="comum" class="form-control validate-name" id="form1" placeholder="">
                                                <label for="form1" class="color-highlight"></label>
                                            </div>
                                        </div>

                                        <p class="color-amarelo font-18 mb-2">local da colheita</p>
                                        <hr class="mt-1 mb-1">
                                        <div class="input-style input1  has-icon validate-field mb-4">
                                            <input type="text" name="local" class="form-control validate-name" id="form1" placeholder="">
                                            <label for="form1" class="color-highlight"></label>
                                        </div>
                                        <p class="color-amarelo font-18 mb-2">distrito</p>
                                        <hr class="mt-1 mb-1">
                                        <div class="input-style input1 no-icon mb-4">
                                            <label for="form5" class="color-highlight"></label>
                                            <select id="distrito" name="distrito">
                                                <option value="default" disabled selected>Select a Value</option>
                                                <?php
                                                require_once('connections/connection.php');
                                                $link = new_db_connection();
                                                /* create a prepared statement */
                                                $stmt3 = mysqli_stmt_init($link);
                                                $query = "SELECT id_distrito, distrito FROM distritos ORDER BY id_distrito ASC";

                                                if (mysqli_stmt_prepare($stmt3, $query)) {
                                                    /* execute the prepared statement */
                                                    if (mysqli_stmt_execute($stmt3)) {
                                                        /* bind result variables */
                                                        mysqli_stmt_bind_result($stmt3, $id_distrito, $distrito);
                                                        while (mysqli_stmt_fetch($stmt3)) { ?>
                                                            <option value="<?= $id_distrito ?>"><?= $distrito ?></option>
                                                <?php }
                                                    } else {
                                                        echo "Error: " . mysqli_stmt_error($stmt3);
                                                    }
                                                    /* close statement */
                                                    mysqli_stmt_close($stmt3);
                                                } else {
                                                    echo "Error: " . mysqli_error($link);
                                                }
                                                ?>
                                            </select>
                                            <span><i class="fa fa-chevron-down"></i></span>
                                            <i class="fa fa-check disabled valid color-green-dark"></i>
                                            <i class="fa fa-check disabled invalid color-red-dark"></i>
                                            <em></em>
                                        </div>
                                        <p class="color-amarelo font-18 mb-2">concelho</p>
                                        <hr class="mt-1 mb-1">
                                        <div class="input-style input1 no-icon mb-4">
                                            <label for="" class="color-highlight"></label>
                                            <select id="concelho-option" name="concelho">
                                                <option value="" disabled selected>Select a Value</option>

                                            </select>
                                            <span><i class="fa fa-chevron-down"></i></span>
                                            <i class="fa fa-check disabled valid color-green-dark"></i>
                                            <i class="fa fa-check disabled invalid color-red-dark"></i>
                                            <em></em>
                                        </div>
                                        <p class="color-amarelo font-18 mb-2">freguesia</p>
                                        <hr class="mt-1 mb-1">
                                        <div class="input-style input1 no-icon mb-4">
                                            <label for="" class="color-highlight"></label>
                                            <select id="freguesia-option" name="fregeuesia">
                                                <option value="" disabled selected>Select a Value</option>
                                            </select>
                                            <span><i class="fa fa-chevron-down"></i></span>
                                            <i class="fa fa-check disabled valid color-green-dark"></i>
                                            <i class="fa fa-check disabled invalid color-red-dark"></i>
                                            <em></em>
                                        </div>
                                        <p class="color-amarelo font-18 mb-2">referência local</p>
                                        <hr class="mt-1 mb-1">
                                        <div class="input-style input1  has-icon validate-field mb-4">
                                            <input type="text" name="referencia" class="form-control validate-name" id="form1" placeholder="">
                                            <label for="form1" class="color-highlight"></label>
                                        </div>
                                    </div>
                                    <div class="mt-2 row col-12 p-0 m-0 mb-4" style="width: 360px">
                                        <p class="font-18 color-amarelo mb-2">descrição de observação</p>
                                        <hr class="mt-1 mb-1">
                                        <div class="input-style input1 no-icon mb-4">
                                            <textarea name="descricao" id="form7a" placeholder=""></textarea>
                                            <label for="form7a" class="color-highlight"></label>

                                        </div>
                                    </div>
                                    <div class="row mb-0 mt-2">
                                        <div class="col-12">
                                            <div class="form-check icon-check">
                                                <input class="form-check-input" type="checkbox" value="" id="check1" name="montra">
                                                <label class="form-check-label text-dark font-18" for="check1">mostrar na montra</label>
                                                <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                                                <i class="icon-check-2 fa fa-check-square font-16 "></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-0 mt-2">
                                        <div class="col-12">
                                            <div class="form-check icon-check">
                                                <input class="form-check-input" type="checkbox" value="" id="check2" name="herbario">
                                                <label class="form-check-label text-dark font-18" for="check2">enviar informações para a UA</label>
                                                <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                                                <i class="icon-check-2 fa fa-check-square font-16 "></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-0 mt-2 pr-0">
                                        <p class="color-amarelo font-18 mb-2">Selecionar Pasta</p>
                                        <hr class="mt-1 mb-1">
                                        <div class="input-style input1 no-icon mb-4">
                                            <label for="" class="color-highlight"></label>
                                            <select id="freguesia-option" name="pasta">
                                                <option value="" disabled selected>Select a Value</option>
                                                <?php
                                                require_once('connections/connection.php');
                                                $link = new_db_connection();
                                                /* create a prepared statement */
                                                $stmt8 = mysqli_stmt_init($link);
                                                $query = "SELECT id_pasta, nome_pasta FROM pastas WHERE users_id_user = ? ORDER BY nome_pasta ASC";

                                                if (mysqli_stmt_prepare($stmt8, $query)) {
                                                    mysqli_stmt_bind_param($stmt8, 'i', $_SESSION["id_utilizador"]);
                                                    /* execute the prepared statement */
                                                    if (mysqli_stmt_execute($stmt8)) {
                                                        /* bind result variables */
                                                        mysqli_stmt_bind_result($stmt8, $id_pasta, $nome);
                                                        while (mysqli_stmt_fetch($stmt8)) { ?>
                                                            <option value="<?= $id_pasta ?>"><?= $nome ?></option>
                                                <?php }
                                                    } else {
                                                        echo "Error: " . mysqli_stmt_error($stmt8);
                                                    }
                                                    /* close statement */
                                                    mysqli_stmt_close($stmt8);
                                                } else {
                                                    echo "Error: " . mysqli_error($link);
                                                }
                                                ?>
                                            </select>
                                            <span><i class="fa fa-chevron-down"></i></span>
                                            <i class="fa fa-check disabled valid color-green-dark"></i>
                                            <i class="fa fa-check disabled invalid color-red-dark"></i>
                                            <em></em>
                                        </div>
                                    </div>

                                    <button type="submit" class="float-right submit1  me-4 font-22 mt-4  p-2">salvar</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script>
            fileToUpload.onchange = evt => {
                const [file] = fileToUpload.files
                if (file) {
                    blah.src = URL.createObjectURL(file)
                    document.getElementById("div-imagem").style.display = "none";
                    document.getElementById("blah").style.display = "block";
                }
            }
        </script>

        <script type="text/javascript">
            document.getElementById("check_nova_planta").onclick = function() {
                if (document.getElementById("check_nova_planta").checked == true) {
                    document.getElementById("criacao-planta").style.display = "block";
                    document.getElementById("criacao-planta2").style.display = "block";
                    document.getElementById("search").style.display = "none";
                } else {
                    document.getElementById("criacao-planta").style.display = "none";
                    document.getElementById("criacao-planta2").style.display = "none";
                    document.getElementById("search").style.display = "block";
                }
            }
        </script>

        <script src="scripts/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/custom.js" type="text/javascript"></script>
</body>

</html>