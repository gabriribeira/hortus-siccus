<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administação - Utilizador</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include_once "components/cp_sidebar.php"; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include_once "components/cp_topbar.php"?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-2">
                        <h1 class="h3 mb-0 text-gray-800">Criar Desafio</h1>
                    </div>

                    <div class="row">

                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <!-- /.panel-heading -->
                                <div class="panel-body">

                                    <form role="form" method="post" action="scripts_php/sc_criar_desafio.php">

                                        <div class='form-group mt-3'>
                                            <label style="font-weight: bold;">Nome do Desafio</label>
                                            <input class='form-control' name='nome_desafio'>
                                        </div>
                                        <div class='form-group'>
                                            <label style="font-weight: bold;">Descrição do Desafio</label>
                                            <input class='form-control' name='descricao_desafio'>
                                        </div>
                                        <div>

                                            <div class='form-group' id="data_inicio" style="display: block;">
                                                <label style="font-weight: bold; display: block;">Data Início Desafio</label>
                                                <input type="date" name="data_inicio">
                                            </div>

                                            <div class='form-group mr-5'>
                                                <div class='checkbox'>
                                                    <label>
                                                        <input id="current_time" type='checkbox' name='current_time'><span style="font-weight: bold;"> Usar Dia Atual </span>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class='form-group'>
                                            <label style="font-weight: bold; display: block;">Data Fim Desafio</label>
                                            <input type="date" name="data_fim">
                                        </div>

                                        <div class='form-group' id="local-definido">
                                            <label style="font-weight: bold;">Local do Desafio</label>
                                            <select class='form-control' name='local'>
                                                <option value=''></option>
                                                <?php

                                                require_once("../code/connections/connection.php"); // We need the function!
                                                $link = new_db_connection(); // Create a new DB connection
                                                $stmt = mysqli_stmt_init($link); // create a prepared statement
                                                $query = "SELECT id_local, local FROM locais"; // Define the query

                                                if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                                                    mysqli_stmt_execute($stmt); // Execute the prepared statement
                                                    mysqli_stmt_bind_result($stmt, $id_local, $local);
                                                    while (mysqli_stmt_fetch($stmt)) { ?>
                                                        <option value='<?= $id_local ?>'><?= $local ?></option>
                                                <?php }
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class='form-group'>
                                            <div class='checkbox'>
                                                <label>
                                                    <input id="novo_local_check" type='checkbox' name='novo_local_check'><span style="font-weight: bold;"> Novo Local ? </span>
                                                </label>
                                            </div>
                                        </div>

                                        <div id="novo_local" style="display: none;">
                                            <div class='form-group mt-3'>
                                                <label style='font-weight: bold;'>Nome do Novo Local</label>
                                                <input class='form-control' name='nome_local_novo'>
                                            </div>
                                        </div>

                                        <button type='submit' class='btn' style="background-color: black; color: white">Submeter alterações</button>

                                    </form>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        document.getElementById("novo_local_check").onclick = function() {
            if (document.getElementById("novo_local_check").checked == true) {
                document.getElementById("novo_local").style.display = "block";
                document.getElementById("local-definido").style.display = "none";
            } else {
                document.getElementById("novo_local").style.display = "none";
                document.getElementById("local-definido").style.display = "block";
            }
        }

        document.getElementById("current_time").onclick = function() {
            if (document.getElementById("current_time").checked == true) {
                document.getElementById("data_inicio").style.display = "none";
            } else {
                document.getElementById("data_inicio").style.display = "block";
            }
        }
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>