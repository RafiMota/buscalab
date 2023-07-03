<?php
require 'conexao.php';
session_start();
if(isset($_POST) && !empty($_POST['usuario']) && !empty($_POST['senha'])){
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $query_login = $conexao->prepare("SELECT * FROM tb_cadastro WHERE email = '{$usuario}' AND senha = '{$senha}'");
    $query_login->execute();
    $dados_login = $query_login->fetchObject();
    $qnt = $query_login->rowCount();
    if($qnt>0){
        $_SESSION['usuario'] = $usuario;
        $_SESSION['senha'] = $senha;
        header('location: ../../html/suporte/main.php');
    }else{
        echo 'Usuário e/ou Senha errado(s)';
    }
    
}

    
?>
