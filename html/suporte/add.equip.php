<?php
    require '../../src/models/labs.model.php';
    require '../../src/models/login_seguranca.php';
   
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="../../src/css/output.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <title>Adicionar Software</title>
</head>
<body class="bg-slate-200">
    <?php
        if(isset($_GET['edit'])&& !empty($_GET['edit'])){
            $id_equip = $_GET['edit'];
            $query_edit_equip = $conexao->prepare("SELECT * FROM tb_equipamentos WHERE id = '$id_equip'");
            $query_edit_equip->execute();
            $dados_edit_equip = $query_edit_equip->fetchAll(PDO::FETCH_ASSOC);
            

        
    ?>
    
    <div class="flex flex-col gap-10 p-8 pl-0 pr-0 absolute items-center justify-center bg-slate-200 w-full">
            

            <div id="formAdicionar" class="flex flex-col items-center justify-between bg-slate-100 shadow-xl w-1/2 rounded-xl h-full p-8">
                <header class="w-full text-center mb-4">
                    <h2 class="text-xl font-semibold">
                        Edite um equipamento
                    </h2>
                </header>
                <main class="flex flex-col w-full h-full">

                    <form action="../../src/models/labs.model.php?Eedit=1&l=<?=$id_lab.'&id='.$id_equip?>" method="post"  class="flex flex-col justify-center items-center gap-4 w-full h-full">
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="fabricante">Fabricante</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="fabricante" name="fabricante" value="<?=$dados_edit_equip[0]['fabricante'];?>">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="modelo">Tipo de equipamento</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="modelo" name="modelo" value="<?=$dados_edit_equip[0]['modelo'];?>">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="patrimonio">N° de patrimônio</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="patrimonio" name="patrimonio" value="<?=$dados_edit_equip[0]['patrimonio'];?>">
                        </div>
                       
                        
                        
                        
                        <button type="submit" class="bg-slate-300 hover:bg-slate-500 shadow-md hover:text-slate-100 font-semibold transition-all p-2 rounded-md">Concluir</button>
                    </form>

                </main>
               
            </div>
        </div>
    </div>

    <?php
        } else{
    ?>
<div class="flex flex-col gap-10 p-8 pl-0 pr-0 absolute items-center justify-center bg-slate-200 w-full">
            
            <div id="formAdicionar" class="flex flex-col items-center justify-between bg-slate-100 shadow-xl w-1/2 rounded-xl h-full p-8">
                <header class="w-full text-center mb-4">
                    <h2 class="text-xl font-semibold">
                        Cadastre um equipamento novo
                    </h2>
                </header>
                <main class="flex flex-col w-full h-full">

                    <form action="../../src/models/labs.model.php?Ecad=1&l=<?=$id_lab?>" method="post"  class="flex flex-col justify-center items-center gap-4 w-full h-full">
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="fabricante">Fabricante</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="fabricante" name="fabricante">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="modelo">Tipo de equipamento</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="modelo" name="modelo">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="patrimonio">N° de patrimônio</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="patrimonio" name="patrimonio">
                        </div>
                       
      
                        
                        
                        
                        <button type="submit" class="bg-slate-300 hover:bg-slate-500 shadow-md hover:text-slate-100 font-semibold transition-all p-2 rounded-md">Concluir</button>
                    </form>

                </main>
               
            </div>
        </div>
    </div>

    <?php };?>

</body>
</html>