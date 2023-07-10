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
            "UPDATE tabela_softwares
            SET lab".$id_lab." = 0
            WHERE id = $id_soft "
        );
        $query_remove_software->execute();
        header('location: ../../html/suporte/labs/lab.soft.php?l='.$id_lab);
    }

    // -------------- CADASTRAR SOFTWARES---------------------------------------------

    if(isset($_GET['Scad']) && !empty($_GET['Scad'])){
        if(isset($_POST)){
            $nome_soft = $_POST['nome'];
            //$categoria = $_POST['categoria'];
            //$licenca = $_POST['licenca'];
            //$versao = $_POST['versao'];
            $lab1 = (int)$_POST['lab1'];
            $lab2 = (int)$_POST['lab2'];
            $lab3 = (int)$_POST['lab3'];
            $lab4 = (int)$_POST['lab4'];
            $lab5 = (int)$_POST['lab5'];
            $lab6 = (int)$_POST['lab6'];
            if(isset($_FILES['imagem']) && !empty($_FILES['imagem'])){
                $imagem = "img_software/".$_FILES['imagem']['name'];
                move_uploaded_file($_FILES['imagem']['tmp_name'], "../../assets/".$imagem);
            } else {
                $imagem = "";
            }
            // Cadastrar os softwares no banco de dados
            $query_cadastrar_soft = $conexao->prepare( "INSERT INTO tabela_softwares(software,lab1,lab2,lab3,lab4,lab5,lab6,imagem)  VALUES('$nome_soft',$lab1,$lab2,$lab3,$lab4,$lab5,$lab6,'$imagem')");
            $query_cadastrar_soft->execute();

            // Cadastrar o detalhament dos softwares na tabela 'info_softwares' do banco dados

            //$query_info_software = $conexao->prepare("INSERT INTO tb_info_softwares(software,categoria,licenca,versao) VALUES ('$nome_soft','$categoria','$licenca','$versao')");
            //$query_info_software->execute();
            header('location: ../../html/suporte/labs/lab.soft.php?l='.$id_lab);
        }

    }

    // -------------- EXCLUIR SOFTWARES DO BANCO DE DADOS---------------------------------------------

    if(isset($_GET['Sdel']) && !empty($_GET['Sdel'])){

        $nome_soft= $_GET['Sdel'];
        $query_deletar_soft = $conexao->prepare("DELETE FROM tabela_softwares WHERE software = '$nome_soft'");
        $query_deletar_soft->execute();

        $query_deletar_info_soft = $conexao2->prepare("DELETE FROM  tb_info_softwares WHERE software = '$nome_soft'");
        $query_deletar_info_soft->execute();
        header('location: ../../html/suporte/labs/lab.soft.php?l='.$id_lab);

    }

    // -------------- EDITAR SOFTWARES ---------------------------------------------

    if(isset($_GET['Sedit']) && !empty($_GET['Sedit']) ){
        if (isset($_GET['soft'])&& !empty($_GET['soft'])){
            $soft = $_GET['soft'];
            if(isset($_POST)&& !empty($_POST)){
                $nome_soft = $_POST['nome'];
               
                if(isset($_FILES['imagem']) && $_FILES['imagem']['name'] !== ''){
                    $imagem = "img_software/".$_FILES['imagem']['name'];
                    move_uploaded_file($_FILES['imagem']['tmp_name'], "../../assets/".$imagem);
                }
                if(isset($imagem)){
                    $query_edit_soft = $conexao->prepare(
                        
                        "UPDATE
                            tabela_softwares
                        SET
                            software = '$nome_soft',
                            
                            imagem = '$imagem'

                        WHERE software = '$soft'");

                    $query_edit_soft->execute();

                }else{
                    $query_edit_soft = $conexao->prepare(
                        
                        "UPDATE
                            tabela_softwares
                        SET
                            software = '$nome_soft'
                            
                            

                        WHERE software = '$soft'");

                    $query_edit_soft->execute();
                }

               
                header('location: ../../html/suporte/labs/lab.soft.php?l='.$id_lab);

                
                
                
            }

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

    // -------------- CADASTRAR MODELOS  ---------------------------------------------
    
    if(isset($_GET['Mcad']) && !empty($_GET['Mcad'])){
        $fabricante = $_POST['fabricante'];
        $modelo = $_POST['modelo'];
        $processador = $_POST['processador'];
        $cpu_mark = $_POST['cpu_mark'];
        $mem_capacidade = $_POST['mem_capacidade'];
        $mem_tipo = $_POST['mem_tipo'];
        $disco1_capacidade = $_POST['disc1_capacidade'];
        $disco1_tipo = $_POST['disc1_tipo'];
        $disco1_modelo = $_POST['disc1_modelo'];
        $disco2_capacidade = $_POST['disc2_capacidade'];
        $disco2_tipo = $_POST['disc2_tipo'];
        $disco2_modelo = $_POST['disc2_modelo'];
        $so_nome = $_POST['so_nome'];
        $so_comp = $_POST['so_comp'];
        $qnt_lab1 = (int)$_POST['lab1'];
        $qnt_lab2 = (int)$_POST['lab2'];
        $qnt_lab3 = (int)$_POST['lab3'];
        $qnt_lab4 = (int)$_POST['lab4'];
        $qnt_lab5 = (int)$_POST['lab5'];
        $qnt_lab6 = (int)$_POST['lab6'];

        $query_cadastrar_modelo = $conexao->prepare("INSERT INTO tb_modelos(modelo,lab1,lab2,lab3,lab4,lab5,lab6) VALUES('$modelo',$qnt_lab1,$qnt_lab2,$qnt_lab3,$qnt_lab4,$qnt_lab5,$qnt_lab6)");
        $query_cadastrar_modelo->execute();

        $query_info_modelos = $conexao->prepare(
        "INSERT INTO 
        tb_info_modelos(fabricante,modelo,processador,cpu_mark,mem_capacidade,mem_tipo,disco1_capacidade,disco1_tipo,disco1_modelo,disco2_capacidade,disco2_tipo,disco2_modelo,so_nome,so_compilacao)
        VALUES('$fabricante','$modelo','$processador','$cpu_mark','$mem_capacidade','$mem_tipo','$disco1_capacidade','$disco1_tipo','$disco1_modelo','$disco2_capacidade','$disco2_tipo','$disco2_modelo','$so_nome','$so_comp')");
       
        $query_info_modelos->execute();
        header('location: ../../html/suporte/labs/lab.modelos.php?l='.$id_lab);
        

    }


    // -------------- EXCLUIR MODELOS DO BANCO DE DADOS---------------------------------------------

    if(isset($_GET['Mdel']) && !empty($_GET['Mdel'])){
        $modelo = $_GET['Mdel'];
        
        $query_deletar_modelo = $conexao->prepare("DELETE FROM tb_modelos WHERE modelo = '$modelo'");
        $query_deletar_modelo->execute();
        
        $query_deletar_info_modelo = $conexao2->prepare("DELETE FROM tb_info_modelos WHERE modelo = '$modelo'");
        $query_deletar_info_modelo->execute();

        header('location: ../../html/suporte/labs/lab.modelos.php?l='.$id_lab);

    }    
    
    // -------------- EDITAR MODELOS  ---------------------------------------------

    if(isset($_GET['Medit']) && !empty($_GET['Medit'])){

        $fabricante = $_POST['fabricante'];
        $modelo = $_POST['modelo'];
        $processador = $_POST['processador'];
        $cpu_mark = $_POST['cpu_mark'];
        $mem_capacidade = $_POST['mem_capacidade'];
        $mem_tipo = $_POST['mem_tipo'];
        $disco1_capacidade = $_POST['disc1_capacidade'];
        $disco1_tipo = $_POST['disc1_tipo'];
        $disco1_modelo = $_POST['disc1_modelo'];
        $disco2_capacidade = $_POST['disc2_capacidade'];
        $disco2_tipo = $_POST['disc2_tipo'];
        $disco2_modelo = $_POST['disc2_modelo'];
        $so_nome = $_POST['so_nome'];
        $so_comp = $_POST['so_comp'];
        $qnt_lab1 = (int)$_POST['lab1'];
        $qnt_lab2 = (int)$_POST['lab2'];
        $qnt_lab3 = (int)$_POST['lab3'];
        $qnt_lab4 = (int)$_POST['lab4'];
        $qnt_lab5 = (int)$_POST['lab5'];
        $qnt_lab6 = (int)$_POST['lab6'];


        $query_edit_modelo = $conexao->prepare(
            "UPDATE
                 tb_modelos
            SET
                modelo = '$modelo',
                lab1 = $qnt_lab1,
                lab2 = $qnt_lab2,
                lab3 = $qnt_lab3,
                lab4 = $qnt_lab4,
                lab5 = $qnt_lab5,
                lab6 = $qnt_lab6
                
            WHERE
                modelo = '$modelo'");
        $query_edit_modelo->execute();

        $query_edit_detalhes = $conexao2->prepare(
            "UPDATE
                tb_info_modelos
            SET
                fabricante = '$fabricante',
                modelo = '$modelo',
                processador = '$processador',
                cpu_mark = '$cpu_mark',
                mem_capacidade = '$mem_capacidade',
                mem_tipo = '$mem_tipo',
                disco1_capacidade ='$disco1_capacidade',
                disco1_tipo = '$disco_tipo',
                disco1_modelo = '$disco1_modelo',
                disco2_capacidade = '$disco2_capacidade',
                disco2_tipo = '$disco2_tipo',
                disco2_modelo = '$disco2_modelo',
                so_nome = '$so_nome',
                so_compilacao = '$so_comp'
                
            WHERE 
                modelo = '$modelo'");
        $query_edit_detalhes->execute();
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


    
     // -------------- EXCLUIR EQUIPAMENTOS  DO BANCO DE DADOS---------------------------------------------

    if(isset($_GET['Edel']) && !empty($_GET['Edel'])){
        $id_equip = $_GET['Edel'];
        
        $query_deletar_equip = $conexao->prepare("DELETE FROM tb_equipamentos WHERE id = $id_equip");
        $query_deletar_equip->execute();
        
        header('location: ../../html/suporte/labs/lab.equip.php?l='.$id_lab);
       

    }    

     // -------------- EDITAR EQUIPAMENTOS---------------------------------------------

     if(isset($_GET['Eedit']) && !empty($_GET['Eedit'])){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id_equip = $_GET['id'];
            if(isset($_POST)&& !empty($_POST)){
                $fabricante = $_POST['fabricante'];
                $modelo = $_POST['modelo'];
                $patrimonio = $_POST['patrimonio'];
                $lab1 = (int)$_POST['lab1'];
                $lab2 = (int)$_POST['lab2'];
                $lab3 = (int)$_POST['lab3'];
                $lab4 = (int)$_POST['lab4'];
                $lab5 = (int)$_POST['lab5'];
                $lab6 = (int)$_POST['lab6'];

                $query_edit_equip = $conexao->prepare(
                    
                    "UPDATE
                        tb_equipamentos
                    SET
                        fabricante = '$fabricante',
                        modelo = '$modelo',
                        patrimonio ='$patrimonio',
                        lab1 = $lab1,
                        lab2 = $lab2,
                        lab3 = $lab3,
                        lab4 = $lab4,
                        lab5 = $lab5,
                        lab6 = $lab6
                        
                    WHERE
                        id = $id_equip");
                $query_edit_equip->execute();
                header('location: ../../html/suporte/labs/lab.equip.php?l='.$id_lab);
                
            }
        }

     }
?>