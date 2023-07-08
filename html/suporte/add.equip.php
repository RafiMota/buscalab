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
<body>
<<<<<<< Updated upstream
<div class="flex flex-col gap-10 p-8 pl-0 pr-0 absolute items-center justify-center bg-slate-300 w-screen">
            <div class="flex flex-col justify-between items-center bg-slate-100 shadow-xl w-1/2 rounded-xl h-80 p-8">
=======
<div class="flex flex-col gap-10 p-8 pl-0 pr-0 absolute items-center justify-center bg-slate-200 w-full">
            <div class="flex flex-col justify-between items-center bg-slate-100 shadow-xl w-1/2 rounded-xl h-full p-8">
>>>>>>> Stashed changes
                <header class="w-full text-center">
                    <h2 class="text-2xl font-semibold">
                        Qual software você deseja adicionar?
                    </h2>
                </header>
                <main class="flex">

                <div id="Equipamentos" class="flex flex-col gap-10  p-8">
                        <div>
                            <?php foreach ($dados_equip as $key => $value) {
                                $id_equip = $dados_equip[$key]['id'];
                                if ($dados_equip[$key]['lab' . $id_lab] < 1) {
                            ?>
                            <div class="flex h-20 w-full rounded-xl ">
                                <div class="h-full w-1/3 rounded-l-xl bg-black"></div>
                                <a href="../../src/models/labs.model.php?l=<?=$id_lab.'&Eadd='.$id_equip;?>">
                                    <div class="w-full p-4">
                                        <h3 class="text-xl font-bold"><?= $dados_equip[$key]['modelo']; ?></h3>
                                    </div>
                                </a>
                            </div>
                            <?php }
                            }; ?>
                        </div>
                        </div>
                    
                    

                </main>
                
            </div>

            <div id="formAdicionar" class="flex flex-col items-center justify-between bg-slate-100 shadow-xl w-1/2 rounded-xl h-full p-8">
                <header class="w-full text-center mb-4">
                    <h2 class="text-xl font-semibold">
                        Cadastre um software novo
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
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="lab1">Lab 1 (Adicionar = 1 / Não adicionar = 0)</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="lab1" name="lab1">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="lab2">Lab 2 (Adicionar = 1 / Não adicionar = 0)</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="lab2" name="lab2">
                        </div>   
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="lab3">Lab 3 (Adicionar = 1 / Não adicionar = 0)</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="lab3" name="lab3">
                        </div>   
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="lab4">Lab 4 (Adicionar = 1 / Não adicionar = 0)</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="lab4" name="lab4">
                        </div>   
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="lab5">Lab 5 (Adicionar = 1 / Não adicionar = 0)</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="lab5" name="lab5">
                        </div>   
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="lab6">Lab 6 (Adicionar = 1 / Não adicionar = 0)</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="lab6" name="lab6">
                        </div>      
      
                        
                        
                        
                        <button type="submit" class="bg-slate-300 hover:bg-slate-500 shadow-md hover:text-slate-100 font-semibold transition-all p-2 rounded-md">Concluir</button>
                    </form>

                </main>
               
            </div>
        </div>
    </div>

</body>
</html>