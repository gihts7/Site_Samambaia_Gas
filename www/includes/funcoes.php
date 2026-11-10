<?php

// Imprime um valor com segurança dentro do HTML (aceita NULL do banco)
if (!function_exists("v")) {
    function v($valor) {
        return htmlspecialchars((string) $valor, ENT_QUOTES, "UTF-8");
    }
}

// Converte a data do banco (UTC) para o horário de Brasília: 09/11/2026 14:30
if (!function_exists("dataBr")) {
    function dataBr($data) {
        $d = new DateTime($data, new DateTimeZone("UTC"));
        $d->setTimezone(new DateTimeZone("America/Sao_Paulo"));
        return $d->format("d/m/Y H:i");
    }
}