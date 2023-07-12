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
        if(isset($_GET['edit']) && !empty($_GET['edit'])){
            $nome_soft = $_GET['edit'];
            $query_edit_soft = $conexao->prepare("SELECT * FROM tabela_softwares WHERE software = '$nome_soft'");
            $query_edit_soft->execute();
            $dados_edit_soft = $query_edit_soft->fetchAll(PDO::FETCH_ASSOC);
            //$query_edit_detalhes = $conexao2->prepare("SELECT * FROM tb_info_softwares WHERE software = '$nome_soft'");
            //$query_edit_detalhes->execute();
            //$dados_detalhes = $query_edit_detalhes->fetchAll(PDO::FETCH_ASSOC);
            
    
        
    ?>

            
<div class="flex flex-col gap-10 p-8 pl-0 pr-0 absolute items-center justify-center bg-slate-200 w-full">
            

            <div id="formAdicionar" class="flex flex-col items-center justify-between bg-slate-100 shadow-xl w-1/2 rounded-xl h-full p-8">
                <header class="w-full text-center mb-4">
                    <h2 class="text-xl font-semibold">
                       Edite um software
                    </h2>
                </header>
                <main class="flex flex-col w-full h-full">

                    <form action="../../src/models/labs.model.php?Sedit=1&l=<?=$id_lab.'&soft='.$nome_soft;?>" method="post" enctype="multipart/form-data" class="flex flex-col justify-center items-center gap-4 w-full h-full">
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="nome">Nome do software</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="nome" name="nome" value="<?=$dados_edit_soft[0]['software'];?>">
                        </div>
                        
                        
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="imagem">ícone do software</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="file" id="imagem" name="imagem" accept="image/*">
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
            <div class="flex flex-col justify-between items-center bg-slate-100 shadow-xl w-3/4 rounded-xl h-full p-8">
                <header class="w-full text-center">
                    <h2 class="text-2xl font-semibold">
                        Qual software você deseja adicionar?
                    </h2>
                </header>
                <main class="flex">

                   
                    <div id="Softwares" class="flex flex-row flex-wrap gap-4 justify-start p-8 w-full">
                               
                        <?php foreach ($dados_soft as $key => $value) {
                            $id_soft = $dados_soft[$key]['id'];
                            if ($dados_soft[$key]['lab' . $id_lab] != 1) {
                         ?>
                                <a href="../../src/models/labs.model.php?l=<?=$id_lab.'&Sadd='.$id_soft;?>">
                                    <div class="flex flex-col items-center justify-center h-32 w-32 rounded-xl  p-4 text-center hover:brightness-50 transition-all">
                                            <img src="../../assets/<?= $dados_soft[$key]['imagem']; ?>" alt="" />
                                            <p class="text-xs font-bold"><?= $dados_soft[$key]['software']; ?></p>
                                    </div>
                                </a>
                               <?php }
                               }; ?>
                           </div>
                    

                </main>
                
            </div>

            <div id="formAdicionar" class="flex flex-col items-center justify-between bg-slate-100 shadow-xl w-3/4 rounded-xl h-full p-8">
                <header class="w-full text-center mb-4">
                    <h2 class="text-xl font-semibold">
                        Cadastre um software novo
                    </h2>
                </header>
                <main class="flex flex-col w-full h-full">

                    <form action="../../src/models/labs.model.php?Scad=1&l=<?=$id_lab?>" method="post" enctype="multipart/form-data" class="flex flex-col justify-center items-center gap-4 w-full h-full">
                        <div class="flex flex-col w-3/4">
                            <label class="ml-2" for="nome">Nome do software</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="nome" name="nome">
                        </div>
                        <style>
                            .check{
                                border: solid 1px black;
                                padding: 0px 8px 0px 0px;
                            }
                        </style>
                        <div class="flex flex-row gap-4">
                            <div class="check flex flex-row w-2/3 gap-4">
                                <label class="ml-2" for="categoria">Lab 1</label>
                                <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="checkbox" id="lab1" name="lab1" value="1">
                            </div>
                            <div class="check flex flex-row w-2/3 gap-4">
                                <label class="ml-2" for="categoria">Lab 2</label>
                                <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="checkbox" id="lab2" name="lab2" value="1">
                            </div>
                            <div class="check flex flex-row w-2/3 gap-4">
                                <label class="ml-2" for="categoria">Lab 3</label>
                                <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="checkbox" id="lab3" name="lab3" value="1">
                            </div>
                            <div class="check flex flex-row w-2/3 gap-4">
                                <label class="ml-2" for="categoria">Lab 4</label>
                                <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="checkbox" id="lab4" name="lab4" value="1">
                            </div>
                            <div class="check flex flex-row w-2/3 gap-4">
                                <label class="ml-2" for="categoria">Lab 5</label>
                                <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="checkbox" id="lab5" name="lab5" value="1">
                            </div>
                            <div class="check flex flex-row w-2/3 gap-4">
                                <label class="ml-2" for="categoria">Lab 6 </label>
                                <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="checkbox" id="lab6" name="lab6" value="1">
                            </div>
                            
                        </div>
                        <div class="flex flex-col w-3/4">
                                <label class="ml-2" for="imagem">ícone do software</label>
                                <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="file" id="imagem" name="imagem" accept="image/*">
                            </div>
                        <button type="submit" class="bg-slate-300 hover:bg-slate-500 shadow-md hover:text-slate-100 font-semibold transition-all p-2 rounded-md">Concluir</button>
                    </form>

                </main>
               
            </div>
        </div>
    </div>
    <?php }?>

</body>
</html>