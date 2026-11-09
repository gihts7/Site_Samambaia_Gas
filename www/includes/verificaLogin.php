<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function exigeLogin() {
    if (!isset($_SESSION["id_usuario"])) {
        header("Location: /login.php");
        exit;
    }
}

function exigeAdmin() {
    exigeLogin();
    if ($_SESSION["tipo"] !== "admin") {
        header("Location: /index.php");
        exit;
    }
}