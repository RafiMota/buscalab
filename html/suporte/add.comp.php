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
    <title>Adicionar Modelo</title>
</head>
<body>
<div class="flex flex-col gap-10 p-8 pl-0 pr-0 absolute items-center justify-center bg-slate-300 w-screen">
            <div class="flex flex-col justify-between items-center bg-slate-100 shadow-xl w-1/2 rounded-xl h-80 p-8">
                <header class="w-full text-center">
                    <h2 class="text-xl font-semibold">
                        Qual modelo você deseja adicionar?
                    </h2>
                </header>
                <main class="flex">

                <article id="Computadores" class="flex flex-col gap-10 p-8">
                    <div id="Computadores" >
                        <?php foreach ($dados_modelos as $key => $value) {
                            $id_comp = $dados_modelos[$key]['id'];
                            if ($dados_modelos[$key]['lab' . $id_lab] < 1) {
                        ?>
                                <div class="flex h-20 w-full rounded-xl ">
                                    <a href="../../src/models/labs.model.php?l=<?=$id_lab.'&Madd='.$id_comp;?>">
                                    <!--<div class="h-full w-1/3 rounded-l-xl bg-black"></div>-->
                                            <div class="w-full p-4">
                                                <h3 class="text-xl font-bold"><?= $dados_modelos[$key]['modelo']; ?></h3>
                                                
                                         </div>
                                    </a>
                             </div>
                            <?php }}; ?>
                    </div>
                 </article>

                    </main>
            </body>
   </html>