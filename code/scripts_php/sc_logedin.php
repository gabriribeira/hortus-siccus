<?php

session_start();

if(!isset($_SESSION["id_utilizador"]) || !isset($_SESSION["role"]) || !isset($_SESSION["username"])){
    header("Location: login.php");
}