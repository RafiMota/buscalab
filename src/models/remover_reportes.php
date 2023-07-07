<?php

require 'conexao.php';
// guardando as variáveis vindo do form "reportar.html"
if (isset($_POST) && !empty($_POST)){
    $reports_id = $_POST["ids"];   
    $reports_id = implode("','", $reports_id);

    $query_remove_report = $conexao->prepare(
        "DELETE FROM problemas WHERE id IN ('".$reports_id."')");
    
    $query_remove_report->execute();
    
    header("Location: ../../html/suporte/main.php");
}






?>