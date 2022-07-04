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
                            $('#resultados-pesquisa').append('<a href="registar-planta.php?id=' + data[i]["id"] + '"><h3 class="pt-2" style="color: black; font-size: 1rem; font-weight: bold;">' + data[i]["nome"] + '</h3></a>');
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

</head>

<body class="theme-light feed-7">
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
            <a class="header-icon header-icon-1 margem-planta" href="editar_perfil.html"><i><img class="icons" src="images/icons/certo.png"></i></a>
        </div>

        <!--PLANTA-->
        <div class="page-content has-footer-menu ">
            <div class="pb-0 mt-2">
                <div class=" m-0 rounded-0" data-card-height="cover">
                    <div class=" rounded-m">
                        <div class="content mb-5">
                            <div class="text-center">
                                <img src="images/profile/bruna.jpg" data-src="images/pictures/25t.jpg" style=" width: 200px ;height: 230px" class="rounded-m preload-img  img-fluid" alt="img">
                                <div class="mt-2">
                                    <input class="btn " style="border: none" type="file">
                                    </input>
                                </div>
                                <p class="pt-3 color-amarelo font-30 mb-2" style="font-style: italic; font-family: Georgia, sans-serif;">Nome científico</p>
                                <div class="input-style input2  has-icon validate-field mb-4">
                                    <input type="text" class="form-control validate-name" id="search">
                                    <label for="form1" class="color-highlight"></label>
                                    <div id="resultados-pesquisa"></div>
                                </div>
                                <p class="color-amarelo font-18 mt-0 mb-3"><i>Nome comum<i></p>
                            </div>
                            <p class="font-11 mt-n2 mb-3"></p>
                            <br />
                            <div class="row m-0 p-0">
                                <div class="mt-2 col-6">
                                    <p class="color-amarelo font-18 mb-2">família</p>
                                    <hr class="mt-1 mb-1">
                                    <div class="input-style input1  has-icon validate-field mb-4">
                                        <input type="name" class="form-control validate-name" id="form1" placeholder="">
                                        <label for="form1" class="color-highlight"></label>
                                    </div>
                                    <p class="color-amarelo font-18 mb-2">estado</p>
                                    <hr class="mt-1 mb-1">
                                    <div class="input-style input1 no-icon mb-4">
                                        <label for="form5" class="color-highlight"></label>
                                        <select id="form5">
                                            <option value="default" disabled selected>Select a Value</option>
                                            <option value="iOS">iOS</option>
                                            <option value="Linux">Linux</option>
                                            <option value="MacOS">MacOS</option>
                                            <option value="Android">Android</option>
                                            <option value="Windows">Windows</option>
                                        </select>
                                        <span><i class="fa fa-chevron-down"></i></span>
                                        <i class="fa fa-check disabled valid color-green-dark"></i>
                                        <i class="fa fa-check disabled invalid color-red-dark"></i>
                                        <em></em>
                                    </div>
                                    <p class="color-amarelo font-18 mb-2">origem</p>
                                    <hr class="mt-1 mb-1">
                                    <div class="input-style input1  has-icon validate-field mb-4">
                                        <input type="name" class="form-control validate-name" id="form1" placeholder="">
                                        <label for="form1" class="color-highlight"></label>
                                    </div>
                                    <p class="color-amarelo font-18 mb-2">estatuto</p>
                                    <hr class="mt-1 mb-1">
                                    <div class="input-style input1  has-icon validate-field mb-4">
                                        <input type="name" class="form-control validate-name" id="form1" placeholder="">
                                        <label for="form1" class="color-highlight"></label>
                                    </div>
                                    <p class="color-amarelo font-18 mb-2">data</p>
                                    <hr class="mt-1 mb-1">
                                    <div class="input-style input1 no-icon mb-4">
                                        <input type="date" value="2030-12-31" value="2030-12-31" max="2030-01-01" min="2021-01-01" class="form-control validate-text" id="form6" placeholder="Phone">
                                        <label for="form6" class="color-highlight">Select Date</label>
                                        <i class="fa fa-check disabled valid me-4 pe-3 font-12 color-green-dark"></i>
                                        <i class="fa fa-check disabled invalid me-4 pe-3 font-12 color-red-dark"></i>
                                    </div>
                                </div>
                                <div class="mt-2 col-6 mb-4">
                                    <p class="color-amarelo font-18 mb-2">local da colheita</p>
                                    <hr class="mt-1 mb-1">
                                    <div class="input-style input1  has-icon validate-field mb-4">
                                        <input type="name" class="form-control validate-name" id="form1" placeholder="">
                                        <label for="form1" class="color-highlight"></label>
                                    </div>
                                    <p class="color-amarelo font-18 mb-2">distrito</p>
                                    <hr class="mt-1 mb-1">
                                    <div class="input-style input1 no-icon mb-4">
                                        <label for="form5" class="color-highlight"></label>
                                        <select id="form5">
                                            <option value="default" disabled selected>Select a Value</option>
                                            <option value="iOS">iOS</option>
                                            <option value="Linux">Linux</option>
                                            <option value="MacOS">MacOS</option>
                                            <option value="Android">Android</option>
                                            <option value="Windows">Windows</option>
                                        </select>
                                        <span><i class="fa fa-chevron-down"></i></span>
                                        <i class="fa fa-check disabled valid color-green-dark"></i>
                                        <i class="fa fa-check disabled invalid color-red-dark"></i>
                                        <em></em>
                                    </div>
                                    <p class="color-amarelo font-18 mb-2">concelho</p>
                                    <hr class="mt-1 mb-1">
                                    <div class="input-style input1 no-icon mb-4">
                                        <label for="form5" class="color-highlight"></label>
                                        <select id="form5">
                                            <option value="default" disabled selected>Select a Value</option>
                                            <option value="iOS">iOS</option>
                                            <option value="Linux">Linux</option>
                                            <option value="MacOS">MacOS</option>
                                            <option value="Android">Android</option>
                                            <option value="Windows">Windows</option>
                                        </select>
                                        <span><i class="fa fa-chevron-down"></i></span>
                                        <i class="fa fa-check disabled valid color-green-dark"></i>
                                        <i class="fa fa-check disabled invalid color-red-dark"></i>
                                        <em></em>
                                    </div>
                                    <p class="color-amarelo font-18 mb-2">freguesia</p>
                                    <hr class="mt-1 mb-1">
                                    <div class="input-style input1 no-icon mb-4">
                                        <label for="form5" class="color-highlight"></label>
                                        <select id="form5">
                                            <option value="default" disabled selected>Select a Value</option>
                                            <option value="iOS">iOS</option>
                                            <option value="Linux">Linux</option>
                                            <option value="MacOS">MacOS</option>
                                            <option value="Android">Android</option>
                                            <option value="Windows">Windows</option>
                                        </select>
                                        <span><i class="fa fa-chevron-down"></i></span>
                                        <i class="fa fa-check disabled valid color-green-dark"></i>
                                        <i class="fa fa-check disabled invalid color-red-dark"></i>
                                        <em></em>
                                    </div>
                                    <p class="color-amarelo font-18 mb-2">referência local</p>
                                    <hr class="mt-1 mb-1">
                                    <div class="input-style input1  has-icon validate-field mb-4">
                                        <input type="name" class="form-control validate-name" id="form1" placeholder="">
                                        <label for="form1" class="color-highlight"></label>
                                    </div>
                                </div>
                                <div class="mt-2 row col-12 p-0 m-0 mb-4" style="width: 360px">
                                    <p class="font-18 color-amarelo mb-2">descrição</p>
                                    <hr class="mt-1 mb-1">
                                    <div class="input-style input1 no-icon mb-4">
                                        <textarea id="form7a" placeholder=""></textarea>
                                        <label for="form7a" class="color-highlight"></label>

                                    </div>
                                </div>
                                <div class="mt-1 row col-12 p-0 m-0 ">
                                    <p class="font-18 color-amarelo mb-2">observações</p>
                                    <hr class="mt-1 mb-1">
                                    <div class="input-style input1 no-icon mb-4">
                                        <textarea id="form7a" placeholder=""></textarea>
                                        <label for="form7a" class=""></label>
                                    </div>
                                </div>
                                <div class="row mb-0 mt-2">
                                    <div class="col-12">
                                        <div class="form-check icon-check">
                                            <input class="form-check-input" type="checkbox" value="" id="check1">
                                            <label class="form-check-label text-dark font-18" for="check1">mostrar na montra</label>
                                            <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                                            <i class="icon-check-2 fa fa-check-square font-16 "></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-0 mt-2">
                                    <div class="col-12">
                                        <div class="form-check icon-check">
                                            <input class="form-check-input" type="checkbox" value="" id="check1">
                                            <label class="form-check-label text-dark font-18" for="check1">enviar informações para a UA</label>
                                            <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                                            <i class="icon-check-2 fa fa-check-square font-16 "></i>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="float-right submit1  me-4 font-22 mt-4  p-2">salvar</button>
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