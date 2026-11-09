<?php
// Imprime um valor com segurança dentro do HTML (aceita NULL do banco)
if (!function_exists("v")) {
    function v($valor) {
        return htmlspecialchars((string) $valor, ENT_QUOTES, "UTF-8");
    }
}