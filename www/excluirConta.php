<?php
require_once("includes/verificaLogin.php");
exigeLogin();

require_once("includes/conecta.php");

// Só aceita POST (um simples link não consegue excluir a conta)
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: minhaConta.php");
    exit;
}

// Admin não se exclui por aqui (evita ficar sem nenhum administrador)
if ($_SESSION["tipo"] === "admin") {
    header("Location: admin/minhaContaAdmin.php");
    exit;
}

$idUsuario = $_SESSION["id_usuario"];

// Os pedidos NÃO são apagados: a FK usuario_id é ON DELETE SET NULL
$sql = "DELETE FROM usuarios WHERE id = ? AND tipo = 'cliente'";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $idUsuario);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

// Encerra a sessão por completo
$_SESSION = [];
session_destroy();

header("Location: index.php");
exit;