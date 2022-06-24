<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>Hortus siccus</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700;800&family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>

<body class="theme-light" data-gradient="gradient-1">

    <div id="preloader">
        <div class="spinner-border color-red-dark" role="status"></div>
    </div>

    <div id="page">
        <div class="page-content pb-0">
            <div class="card card-style m-0 rounded-0 bg-16" data-card-height="cover">
                <div class="card-center  rounded-m mx-4">
                    <!--tb tinha a classe bg-theme-->
                    <div class="content">
                        <form action="scripts_php/sc_register.php" method="post">
                            <h1>Registo</h1>
                            <p class="font-11 mt-n2 mb-3"></p>
                            <br>
                            <div class="input-style no-borders has-icon validate-field">
                                <i class="fa fa-user"></i>
                                <input type="username" name="username" id="form1a" placeholder="Username" required>
                                <label for="form1a" class=" font-10 mt-1">Username</label>
                                <i class="fa fa-times disabled invalid color-dark"></i>
                                <i class="fa fa-check disabled valid color-dark"></i>
                            </div>
                            <div class="input-style no-borders has-icon validate-field">
                                <i class="fa fa-user"></i>
                                <input type="nome_user" name="nome_user" id="form1a" placeholder="Nome e Apelido" required>
                                <label for="form1a" class="font-10 mt-1">Nome e Apelido</label>
                                <i class="fa fa-times disabled invalid color-dark"></i>
                                <i class="fa fa-check disabled valid color-dark"></i>
                            </div>
                            <div class="input-style no-borders has-icon validate-field mt-2">
                                <i class="fa fa-at"></i>
                                <input type="email" name="email" id="form1aa" placeholder="Email" required>
                                <label for="form1aa" class="font-10 mt-1">Email</label>
                                <i class="fa fa-times disabled invalid color-dark"></i>
                                <i class="fa fa-check disabled valid color-dark"></i>
                            </div>
                            <div class="input-style no-borders has-icon validate-field mt-2">
                                <i class="fa fa-lock"></i>
                                <input type="password" name="password" id="form3a" placeholder="Password" required>
                                <label for="form3a" class="font-10 mt-1">Password</label>
                                <i class="fa fa-times disabled invalid color-dark"></i>
                                <i class="fa fa-check disabled valid colo-dark"></i>
                            </div>
                            <div class="input-style no-borders has-icon validate-field mt-2">
                                <i class="fa fa-lock"></i>
                                <input type="password" name="password_ver" id="form3a1" placeholder="Confirmar Password" required>
                                <label for="form3a1" class="font-10 mt-1">Confirmar Password</label>
                                <i class="fa fa-times disabled invalid color-dark"></i>
                                <i class="fa fa-check disabled valid color-dark"></i>
                            </div>
                            <div class="mb-0 d-flex">
                                <?php

                                if (isset($_GET["msg"])) {
                                    switch ($_GET["msg"]) {
                                        case 1:
                                            $msg = "As passwords não coincidem!";
                                            break;
                                        case 2:
                                            $msg = "Tem de preencher todos os campos do formulário!";
                                            break;
                                        case 3:
                                            $msg = "Ocorreu um erro a processar o pedido!";
                                            break;
                                        case 4:
                                            $msg = "Já existe uma conta associada a essas credenciais!";
                                            break;
                                        default:
                                            $msg = "";
                                    }
                                }else{
                                    $msg = "";
                                }

                                ?>
                                <div class="col-6" style="align-content: start;"><span class="font-15 color-theme"><?= $msg ?></span></div>
                                <div class="col-6" style="text-align: right;"><a href="login.html" class="font-15 color-theme">Já tenho conta</a></div>
                            </div>
                            <button type="submit" class="btn btn-full btn-l bg-green-dark  mt-3 mb-n2  text-uppercase col-12">Registar</button>
                            <!--<a href="scripts_php/sc_register.php" class="btn btn-full btn-l bg-green-dark  mt-3 mb-n2  text-uppercase ">Registar</a>-->
                        </form>
                    </div>
                </div>
                <div class="card-overlay  opacity-85 rounded-0"></div>
            </div>

        </div>
        <!-- Page content ends here-->

    </div>

    <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>
</body>