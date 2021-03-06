<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>KolorMobile</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700;800&family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>

<body class="theme-light" data-gradient="gradient-1">

<div id="preloader"><div class="spinner-border color-red-dark" role="status"></div></div>

<div id="page">
    <div class="page-content pb-0">
        <div class="card card-style m-0 rounded-0 bg-16-lg" data-card-height="cover">
            <div class="card-center  rounded-m mx-4"> <!--tb tinha a classe bg-theme-->
                <div class="content">
                    <?php
                    if (isset($_GET["msg"])) {
                        switch ($_GET["msg"]) {
                            case 1:
                                $msg = "Username ou Password incorretos!";
                                break;
                            case 2:
                                $msg = "Tem de preencher todos os campos do formulário!";
                                break;
                            case 3:
                                $msg = "Ocorreu um erro a processar o pedido!";
                                break;
                            default:
                                $msg = "";
                        }
                    }else{
                        $msg = "";
                    }
                    ?>
                    <form action="scripts_php/sc_login.php" method="post">
                    <h1>Login</h1>
                    <p class="font-11 mt-n2 mb-3"></p>
                    <div class="col-12" style="align-content: start;"><span class="font-15" style="color: white;"><?= $msg ?></span></div>
                    <br>
                    <div class="input-style no-borders has-icon validate-field">
                        <i class="fa fa-user"></i>
                        <input name="username" type="username"  class="" id="form1a" placeholder="Username">
                        <label for="form1a" class=" font-10 mt-1">Username </label>
                        <i class="fa fa-times disabled invalid color-dark"></i>
                        <i class="fa fa-check disabled valid color-dark"></i>
                    </div>
                    <div class="input-style no-borders has-icon validate-field mt-2">
                        <i class="fa fa-lock"></i>
                        <input name="password" type="password" class=" " id="form3a" placeholder="Password">
                        <label for="form3a" class="font-10 mt-1">Password</label>
                        <i class="fa fa-times disabled invalid color-dark"></i>
                        <i class="fa fa-check disabled valid colo-dark"></i>
                    </div>
                    <div class="row mb-0">
                        <a href="#" class="col-6 text-start font-15 pt-2 pb-2 color-theme ">Forgot Password?</a>
                        <a href="registo.php" class="col-6 text-end font-15 pt-2 pb-2 color-theme ">Regista-te</a>
                    </div>
                        <button type="submit" class="btn btn-full btn-l bg-green-dark  mt-3 mb-n2  text-uppercase col-12">Entrar</button>
                    </form>
                </div>
            </div>
            <div class="card-overlay  opacity-85 rounded-0"></div>
        </div>
    </div>
</div>
<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
