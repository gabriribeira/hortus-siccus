<?php

require_once("../connections/connection.php"); // We need the function!
$link = new_db_connection(); // Create a new DB connection
$stmt = mysqli_stmt_init($link); // create a prepared statement

if (isset($_POST["password"]) && isset($_POST["password_ver"]) && $_POST["password"] == $_POST["password_ver"]) {
    if (isset($_POST["email"]) && isset($_POST["username"]) && $_FILES["fileToUpload"]["name"] != "") {
        $query = "SELECT email, username FROM users WHERE email = ? OR username = ?";

        if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
            mysqli_stmt_bind_param($stmt, 'ss', $_POST["email"], $_POST["username"]);
            if (!mysqli_stmt_execute($stmt)){
                echo mysqli_stmt_error($stmt);
            } else {
            };
            if (mysqli_stmt_fetch($stmt)) { // Execute the prepared statement
                $msg = 6;
                header("Location: ../login.php?msg=" . $msg);
            } else {
                $target_dir = "../images/originals/";
                $target_dir_small = "../images/small/";
                $tgt_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $imageFileType = strtolower(pathinfo($tgt_file, PATHINFO_EXTENSION));
                $uniqid = uniqid();
                $target_file = $target_dir . "user_" . $_POST["username"] . "_profilepic_" . $uniqid . "." . $imageFileType;
                $uploadOk = 1;
                define('MB', 1048576);

                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                    // Check if file already exists
                    if (!file_exists($target_file)) {
                        $uploadOk = 1;

                        // Check file size
                        if ($_FILES["fileToUpload"]["size"] <= (5 * MB)) {
                            $uploadOk = 1;
                            // Allow certain file formats
                            if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {
                                $uploadOk = 1;

                                if ($imageFileType == "jpg" || $imageFileType == "jpeg") {
                                    $uploadedfile = $_FILES['fileToUpload']['tmp_name'];
                                    $src = imagecreatefromjpeg($uploadedfile);
                                } else if ($imageFileType == "png") {
                                    $uploadedfile = $_FILES['fileToUpload']['tmp_name'];
                                    $src = imagecreatefrompng($uploadedfile);
                                } else {
                                    $src = imagecreatefromgif($uploadedfile);
                                }

                                list($width, $height) = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                                $newwidth = 100;
                                $newheight = 100;
                                $tmp = imagecreatetruecolor($newwidth, $newheight);
                                imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                                $filename = $target_dir_small . "user_" . $_POST["username"] . "_profilepic_" . $uniqid . "." . $imageFileType;
                                imagejpeg($tmp, $filename, 100);
                                $filename = "user_" . $_POST["username"] . "_profilepic_" . $uniqid . "." . $imageFileType;

                                $query = "INSERT INTO users(email, username, password_hash, imagem_user) VALUES ( ? , ? , ? , ?)"; // Define the query
                                $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
                                if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                                    mysqli_stmt_bind_param($stmt, 'ssss', $_POST["email"], $_POST["username"], $pass, $filename);
                                    if (mysqli_stmt_execute($stmt)) { // Execute the prepared statement
                                        $msg = 10;
                                    } else {
                                        echo mysqli_stmt_error($stmt);
                                        $msg = 3;
                                        header("Location: ../login.php?msg=" . $msg);
                                    }
                                    mysqli_stmt_close($stmt); // Close statement
                                }
                                mysqli_close($link); // Close connection

                                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

                                header("Location: ../login.php?msg=" . $msg);
                            } else {
                                $msg = 9;
                                header("Location: ../login.php?msg=" . $msg);
                            }
                        } else {
                            $msg = 8;
                            header("Location: ../login.php?msg=" . $msg);
                        }
                    } else {
                        $msg = 7;
                        header("Location: ../login.php?msg=" . $msg);
                    }
                } else {
                    $msg = 7;
                    header("Location: ../login.php?msg=" . $msg);
                }
            }
        } else {
            $msg = 3;
            header("Location: ../login.php?msg=" . $msg);
        }
    } else {
        $msg = 4;
        header("Location: ../login.php?msg=" . $msg);
    }
} else {
    $msg = 5;
    header("Location: ../login.php?msg=" . $msg);
}
