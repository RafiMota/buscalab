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


    $query_soft = $conexao->prepare("SELECT id,lab".$id_lab.",software, imagem FROM tabela_softwares");
    $query_soft->execute();
    $dados_soft = $query_soft->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($dados_soft);

    // -------------- EQUIPAMENTOS---------------------------------------------


    $query_equip = $conexao->prepare("SELECT id,modelo,lab".$id_lab." FROM tb_equipamentos");
    $query_equip->execute();
    $dados_equip = $query_equip->fetchAll();
    $json = json_encode($dados_equip);

    // -------------- ADICIONAR SOFTWARES---------------------------------------------

    if(isset($_GET['Sadd']) && !empty($_GET['Sadd'])){
        $id_soft  = $_GET['Sadd'];

        $query_add_software = $conexao->prepare(
            "UPDATE
                tabela_softwares
            SET 
                lab".$id_lab." = 1
            WHERE
                id = $id_soft

        ");
        $query_add_software->execute();
        header('location: ../../html/suporte/labs/lab.soft.php?l='.$id_lab);
    }
    // -------------- REMOVER SOFTWARES---------------------------------------------

    if(isset($_GET['Sre']) && !empty($_GET['Sre'])){
        $id_soft = $_GET['Sre'];
        $query_remove_software = $conexao->prepare(
            "UPDATE
                tabela_softwares
            SET 
                lab".$id_lab." = 0
            WHERE
                id = $id_soft

        ");
        $query_remove_software->execute();
        header('location: ../../html/suporte/labs/lab.soft.php?l='.$id_lab);
    }

    // -------------- CADASTRAR SOFTWARES---------------------------------------------

    if(isset($_GET['Scad']) && !empty($_GET['Scad'])){
        if(isset($_POST)){
            $nome_soft = $_POST['nome'];
            print_r($_POST);
        }

    }

    // -------------- ADICIONAR MODELOS---------------------------------------------

    if(isset($_GET['Madd']) && !empty($_GET['Madd'])){
        $id_modelo= $_GET['Madd'];
        $query_add_modelo = $conexao->prepare(
            "UPDATE
                tb_modelos
            SET 
                lab".$id_lab." = 1
            WHERE
                id = $id_modelo

        ");
        $query_add_modelo->execute();
        header('location: ../../html/suporte/labs/lab.modelos.php?l='.$id_lab);

    }

    // -------------- REMOVER MODELOS---------------------------------------------

    if(isset($_GET['Mre']) && !empty($_GET['Mre'])){
        $id_modelo = $_GET['Mre'];
        
        $query_remove_modelo = $conexao->prepare(
            "UPDATE
                tb_modelos
            SET 
                lab".$id_lab." = 0
            WHERE
                id = $id_modelo

        ");
        $query_remove_modelo->execute();
        header('location: ../../html/suporte/labs/lab.modelos.php?l='.$id_lab);

    }

    // -------------- GERENCIAMENTO UNITÁRIO DE NÚMERO DE MODELOS ---------------------------------------------
    if(isset($_GET['mc']) && !empty($_GET['mc'])){
        // mc == More computer 
        $id_modelo = $_GET['mc'];
        $query_plus_modelo = $conexao->prepare("UPDATE tb_modelos SET lab".$id_lab."=lab".$id_lab."+1 WHERE id =".$id_modelo);
        $query_plus_modelo->execute();
        header('location: ../../html/suporte/labs/lab.modelos.php?l='.$id_lab);

    } elseif(isset($_GET['lc']) && !empty($_GET['lc'])){
        //lc = less computer
        $id_modelo = $_GET['lc'];
        $query_less_modelo = $conexao->prepare("UPDATE tb_modelos SET lab".$id_lab."=lab".$id_lab."-1 WHERE id =".$id_modelo);
        $query_less_modelo->execute();
        header('location: ../../html/suporte/labs/lab.modelos.php?l='.$id_lab);
    }

    // -------------- ADICIONAR EQUIPAMENTOS ---------------------------------------------
    if(isset($_GET['Eadd']) && !empty($_GET['Eadd'])){
        $id_equip = $_GET['Eadd'];
        $query_add_equip = $conexao->prepare(
            "UPDATE
                tb_equipamentos
            SET 
                lab".$id_lab." = 1
            WHERE
                id = $id_equip

        ");
        $query_add_equip->execute();
        header('location: ../../html/suporte/labs/lab.equip.php?l='.$id_lab);
    }

    // -------------- REMOVER EQUIPAMENTOS ---------------------------------------------
    if(isset($_GET['Ere']) && !empty($_GET['Ere'])){
        $id_equip = $_GET['Ere'];
        
        $query_remove_equip = $conexao->prepare(
            "UPDATE
                tb_equipamentos
            SET 
                lab".$id_lab." = 0
            WHERE
                id = $id_equip

        ");
        $query_remove_equip->execute();
        header('location: ../../html/suporte/labs/lab.equip.php?l='.$id_lab);

    }

        // -------------- CADASTRAR EQUIPAMENTOS ---------------------------------------------

        if(isset($_GET['Ecad']) && !empty($_GET['Ecad'])){
            $fabricante = $_POST['fabricante'];
            $modelo = $_POST['modelo'];
            $patrimonio = $_POST['patrimonio'];
            $qnt_lab1 = (int)$_POST['lab1'];
            $qnt_lab2 = (int)$_POST['lab2'];
            $qnt_lab3 = (int)$_POST['lab3'];
            $qnt_lab4 = (int)$_POST['lab4'];
            $qnt_lab5 = (int)$_POST['lab5'];
            $qnt_lab6 = (int)$_POST['lab6'];
    
    
            $query_cadastrar_equip = $conexao->prepare(
                "INSERT INTO tb_equipamentos(modelo,patrimonio,fabricante,lab1,lab2,lab3,lab4,lab5,lab6)
                 VALUES('$modelo','$patrimonio','$fabricante',$qnt_lab1,$qnt_lab2,$qnt_lab3,$qnt_lab4,$qnt_lab5,$qnt_lab6)");
            $query_cadastrar_equip->execute();
            header('location: ../../html/suporte/labs/lab.equip.php?l='.$id_lab);
    
         }

    
?>