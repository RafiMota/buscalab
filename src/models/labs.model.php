<?php
require 'conexao.php';

if(isset($_GET['l']) && !empty($_GET['l'])){
    $id_lab = $_GET['l'];
}

// -------------- COMPUTADORES---------------------------------------------

$query_modelos = $conexao->prepare("SELECT id,lab".$id_lab.", modelo FROM tb_modelos");
$query_modelos->execute();
$dados_modelos = $query_modelos->fetchAll(); 
$json = json_encode($dados_modelos);

// --------------SOFTWARES---------------------------------------------


$query_soft = $conexao->prepare("SELECT id,lab".$id_lab.",software FROM tabela_softwares");
$query_soft->execute();
$dados_soft = $query_soft->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($dados_soft);

// -------------- EQUIPAMENTOS---------------------------------------------


$query_equip = $conexao->prepare("SELECT id,modelo,lab".$id_lab." FROM tb_equipamentos");
$query_equip->execute();
$dados_equip = $query_equip->fetchAll();
$json = json_encode($dados_equip);




?>