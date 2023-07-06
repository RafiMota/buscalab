<?php
    require 'lab.php';
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
<body>
<div class="flex flex-col gap-10 p-8 pl-0 pr-0 absolute items-center justify-center bg-slate-300 w-screen">
            <div class="flex flex-col justify-between items-center bg-slate-100 shadow-xl w-1/2 rounded-xl h-80 p-8">
                <header class="w-full text-center">
                    <h2 class="text-xl font-semibold">
                        Qual software você deseja adicionar?
                    </h2>
                </header>
                <main class="flex">

                   
                    <div id="Softwares" class="justify-start p-8 w-100">
                               
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

            <div id="formAdicionar" class="flex flex-col items-center justify-between bg-slate-100 shadow-xl w-1/2 rounded-xl h-80 p-8">
                <header class="w-full text-center mb-4">
                    <h2 class="text-xl font-semibold">
                        Cadastre um software novo
                    </h2>
                </header>
                <main class="flex flex-col w-full h-full">

                    <form action="../../src/models/labs.model.php?Scad=1&l=<?=$id_lab?>" method="post" class="flex flex-col justify-center items-center gap-4 w-full h-full">
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="nome">Nome do software</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="nome" name="nome">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="categoria">lab1</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="lab1" name="lab1">
                        </div>
                        
                            <button type="submit" class="bg-slate-300 hover:bg-slate-500 shadow-md hover:text-slate-100 font-semibold transition-all p-2 rounded-md">Concluir</button>
                    </form>

                </main>
               
            </div>
        </div>
    </div>

</body>
</html>