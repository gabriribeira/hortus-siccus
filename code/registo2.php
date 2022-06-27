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

    <!--<div id="preloader">
        <div class="spinner-border color-red-dark" role="status"></div>
    </div>-->

    

    <div id="page">
    
        <div class="page-content pb-0">
            <div class="card card-style m-0 rounded-0 bg-16" data-card-height="cover">
                <div class="card-center  rounded-m mx-4">
                    <!--tb tinha a classe bg-theme-->
                    <div class="content">
                        <form action="scripts_php/sc_register.php" method="post" enctype="multipart/form-data">
                            <h1>Últimos Passos...</h1>
                            <p class="font-11 mt-n2 mb-3"></p>
                            <br>
                            <div class="d-flex mt-3">
                                <div style="width: 140px; height: 140px; border: 2px solid #2b2b2b; border-radius: 30px;"></div>
                                <div style="margin-left: 15px; margin-top: 10px;">
                                    <?php
                                        if(isset($_GET["user"])){
                                            require_once("connections/connection.php");
                                            $link = new_db_connection();
                                            $stmt = mysqli_stmt_init($link);
                                            $query = "SELECT username, nome_user, data_criacao FROM users WHERE username = ?";
                                            if (mysqli_stmt_prepare($stmt, $query)) {
                                                mysqli_stmt_bind_param($stmt, 's', $_GET["user"]);
                                                mysqli_stmt_execute($stmt);
                                                mysqli_stmt_bind_result($stmt, $username, $nome, $data);
                                                mysqli_stmt_fetch($stmt);
                                    ?>
                                    <h2 style="text-transform:uppercase;"><?=$nome?></h2>
                                    <h6><?=$username?></h6>
                                    <h6><?=$data?></h6>
                                    <input type="file" name="fileToUpload" id="fileToUpload" style="width: 0.1px; height: 0.1px; opacity: 0; overflow: hidden; position: absolute; z-index: -1;">
                                    <label for="fileToUpload" style="border: 2px solid #2b2b2b; padding: 4px 15px; margin-top: 10px; font-weight: bold; color: #eeeee4; background-color: #2b2b2b;">Escolher Imagem</label>
                                    <?php
                                            mysqli_stmt_close($stmt);
                                            }
                                            
                                        }
                                    ?>

                                </div>
                            </div>
                            <div style="margin-left: 5px; margin-top: 40px;">
                                <h2>Biografia</h2>
                                <div class="input-style no-icon mb-4" >
                                    <textarea id="form7" placeholder="Insere uma biografia"></textarea>
                                    <em class="mt-n3">(required)</em>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-full btn-l bg-green-dark  mt-3 mb-n2  text-uppercase col-12">Submeter</button>
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