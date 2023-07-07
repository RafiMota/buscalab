<?php

require 'conexao.php';
// guardando as variáveis vindo do form "reportar.html"
if (isset($_POST) && !empty($_POST)){
    $laboratorio = (int)$_POST['lab'];
    $categoria = $_POST['categ'];
    $soft = $_POST['soft'];
    $equip = $_POST['equip'];
    $problema = $_POST['prob'];
    $outro_prob = $_POST['outro'];
    $situacao= 1;
    if(isset($_POST['mesa']) && !empty($_POST['mesa'])){
        $mesa = (int)$_POST['mesa'];
    } else {
        $mesa = 0;
    }
    // query para cadastrar os reportes na tabela "problemas" no banco de dados
    $query_add_report = $conexao->prepare(
        "INSERT INTO problemas (laboratorio, categoria, software, equipamento, problema, outro_problema, mesa, situação)
         VALUES('$laboratorio', '$categoria', '$soft', '$equip', '$problema','$outro_prob', $mesa, $situacao)"
         );
    
    $query_add_report->execute();
    
    header("Location: ../../html/sucesso.html");
}







?>