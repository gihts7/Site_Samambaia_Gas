<?php

require_once("../includes/verificaLogin.php");
exigeAdmin();

require_once("../includes/conecta.php");

// Só aceita POST (um simples link não exclui nada)
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: gerenciarUsuarios.php");
    exit;
}

$id = (int) ($_POST["id"] ?? 0);

// Só exclui CLIENTES: um admin não pode ser apagado por aqui
$sql = "DELETE FROM usuarios WHERE id = ? AND tipo = 'cliente'";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    // Os pedidos continuam no banco (FK usuario_id é ON DELETE SET NULL)
    $_SESSION["sucesso"] = "Usuário excluído com sucesso.";
} else {
    $_SESSION["erro"] = "Usuário não encontrado.";
}

mysqli_stmt_close($stmt);

header("Location: gerenciarUsuarios.php");
exit;
