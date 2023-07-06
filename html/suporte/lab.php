<?php

require '../../src/models/login_seguranca.php';
require '../../src/models/conn.php';
include '../../src/models/labs.model.php';

$sql_num_report_lab = "SELECT Count(laboratorio) AS num, laboratorio AS lab
                           FROM problemas 
                           GROUP BY laboratorio
                           ORDER BY laboratorio ASC";


$result_num_report_lab = mysqli_query($conn, $sql_num_report_lab);
if (!$result_num_report_lab) {
    echo "Nao foi possivel executar a consulta (" . $sql_num_report_lab . ") no banco de dados: " . mysqli_error($conn);
    exit;
}

if (mysqli_num_rows($result_num_report_lab) == 0) {
    echo "Nao foram encontradas linhas, nada para mostrar<br><br>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buscalab</title>
    <link rel="stylesheet" href="../../src/css/output.css" />
    <script src="../../src\lab_suporte.js" defer></script>
</head>

<body class="font-montserrat h-screen flex flex-col justify-between">
    <header class="flex justify-between pt-2 pb-2 pr-8 pl-8 items-center shadow-lg border-b-2 border-slate-200">
        <section>
            <a href="main.php"><img src="../../assets/cyberpunk/logo-cyberpunk.svg" alt="" class="w-1/4"></a>
        </section>

        <section class="flex gap-10 items-center">
            <a href="main.php">
                <p class="transition-all cursor-pointer font-medium hover:font-semibold">Reportes</p>
            </a>
            <a href="lab.php?l=1">
                <p class="transition-all cursor-pointer font-medium hover:font-semibold">Laboratório</p>
            </a>
            <img src="../../assets/logout.svg" class="w-5 hover:w-6 transition-all" alt="">
        </section>
    </header>

    <div id="dialog" class="hidden h-screen w-full">
        <div class="flex flex-col gap-10 p-8 pl-0 pr-0 absolute items-center justify-center bg-slate-300 w-screen">
            <div class="flex flex-col justify-between items-center bg-slate-100 shadow-xl w-1/2 rounded-xl h-80 p-8">
                <header class="w-full text-center">
                    <h2 class="text-xl font-semibold">
                        Qual software você deseja cadastrar?
                    </h2>
                </header>
                <main class="flex">

                    <div>
                        <p>Softwares vão estar aqui</p>
                    </div>

                </main>
                <footer>
                    <a href="adicionarSoftware.php" class="">
                        <p class="bg-slate-300 hover:bg-slate-500 shadow-md hover:text-slate-100 font-semibold transition-all p-2 rounded-md">Adicionar novo</p>
                    </a>
                </footer>
            </div>

            <div id="formAdicionar" class="flex flex-col items-center justify-between bg-slate-100 shadow-xl w-1/2 rounded-xl h-80 p-8">
                <header class="w-full text-center mb-4">
                    <h2 class="text-xl font-semibold">
                        Cadastre um software novo
                    </h2>
                </header>
                <main class="flex flex-col w-full">

                    <form action="" class="flex flex-col justify-center items-center gap-4 w-full">
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="nome">Nome do software</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="nome" name="nome">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="categoria">Categoria</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="categoria" name="categoria">
                        </div>

                    </form>

                </main>
                <footer>
                    <a href="#" class="">
                        <p class="bg-slate-300 hover:bg-slate-500 shadow-md hover:text-slate-100 font-semibold transition-all p-2 rounded-md">Concluir</p>
                    </a>
                </footer>
            </div>
        </div>
    </div>





    <section class="flex align-start bg-slate-100 p-8 h-screen">
        <nav class="flex flex-col gap-3 w-1/5 p-4 bg-slate-50 rounded-lg shadow-lg">
            <h3 class="text-lg font-semibold">Laboratórios</h3>
            <?php
            $row = mysqli_fetch_all($result_num_report_lab);
            $aux = 0;

            for ($i = 1; $i < 7; $i++) {
                echo '<a class="transition-all hover:font-semibold flex flex-row flex-nowrap gap-4" href="lab.php?l=' . $i . '">
                                <p>Laboratório ' . $i . '</p>';

                if ($row[$aux][1] == $i) {
                    echo "<div class='bg-orange-400 w-4 rounded-md text-center'>" . $row[$aux][0] . "</div>";
                    $aux++;
                }
                echo '</a>';
            }

            ?>
        </nav>

        <main class="flex flex-col p-8 pt-4 gap-8 w-3/4 ">
            <section>
                <div class="flex flex-row justify-between items-center">
                    <h2 class="text-2xl font-semibold">Laboratório <?php echo $id_lab; ?></h2>
                    
                </div>
            </section>


            <section class="flex flex-col w-100">

                <div class="flex h-10 items-center justify-around mt-2 mb-2 w-100">
                    <button class="bg-white text-rose-600" data-page="Softwares">
                        Softwares
                    </button>
                    <button class="bg-white text-rose-600" data-page="Computadores">
                        Computadores
                    </button>
                    <button class="bg-white text-rose-600" data-page="Equipamentos">
                        Equipamentos
                    </button>
                </div>
                <div>
                    <ul>
                        <li>
                            <style>
                                #Softwares {
                                    display: flex;
                                    flex-flow: row wrap;
                                    justify-content: start;
                                    align-items: start;
                                    gap: 1.5rem;
                                    margin: auto;
                                    
                                }
                            </style>
                            <article id="Softwares">
                            <!--onclick="openDialog()"-->
                                <a href="add.soft.php?l=<?=$id_lab?>">
                                    <div  class="text-xl font-semibold hover:underline transition-all ">Adicionar+</div>
                                </a>
                                <div id="Softwares" class="justify-start p-8 w-100">
                               
                                    <?php foreach ($dados_soft as $key => $value) {
                                        if ($dados_soft[$key]['lab' . $id_lab] != 0) {
                                        $id_soft = $dados_soft[$key]['id'];
                                    ?> 
                                            <div class="flex flex-col items-center justify-center h-32 w-32 rounded-xl  p-4 text-center hover:brightness-50 transition-all">
                                                <img src="../../assets/<?= $dados_soft[$key]['imagem']; ?>" alt="" />
                                                <p class="text-xs font-bold"><?= $dados_soft[$key]['software']; ?></p>
                                                <a href="../../src/models/labs.model.php?l=<?=$id_lab.'&Sre='.$id_soft ?>"><span>remover</span></a>

                                            </div>
                                    <?php }
                                    }; ?>
                                </div>
                            </article>



                        </li>
                        <li>
                            <article id="Computadores" class="flex flex-col gap-10 p-8">
                            <a href="add.comp.php?l=<?=$id_lab?>">
                                    <div  class="text-xl font-semibold hover:underline transition-all ">Adicionar+</div>
                            </a>
                                <div id="Computadores" >
                                    <?php foreach ($dados_modelos as $key => $value) {
                                        $id_modelo = $dados_modelos[$key]['id'];
                                        if ($dados_modelos[$key]['lab' . $id_lab] != 0) {
                                    ?>
                                            <div class="flex h-20 w-full rounded-xl ">
                                                <div class="h-full w-1/3 rounded-l-xl bg-rose-50 "></div>
                                                <div class="w-full p-4">
                                                    <h3 class="text-xl font-bold"><?= $dados_modelos[$key]['modelo']; ?></h3>
                                                    <p>Quantidade: <span><?= $dados_modelos[$key]['lab' . $id_lab]; ?></span></p>
                                                    <a href="../../src/models/labs.model.php?l=<?=$id_lab.'&Mre='.$id_modelo ?>"><p>remover</p></a>
                                                </div>
                                            </div>
                                    <?php }}; ?>
                                </div>
                            </article>



                        </li>
                        <li>


                            <article id="Equipamentos" class="flex flex-col gap-10  p-8">
                            <a href="add.equip.php?l=<?=$id_lab?>">
                                    <div  class="text-xl font-semibold hover:underline transition-all ">Adicionar+</div>
                            </a>
                                <div>
                                    <?php foreach ($dados_equip as $key => $value) {
                                        $id_equip = $dados_equip[$key]['id'];
                                        if ($dados_equip[$key]['lab' . $id_lab] != 0) {
                                    ?>
                                            <div class="flex h-20 w-full rounded-xl ">
                                                <div class="h-full w-1/3 rounded-l-xl bg-black"></div>
                                                <div class="w-full p-4">
                                                    <h3 class="text-xl font-bold"><?= $dados_equip[$key]['modelo']; ?></h3>
                                                     <span>Quantidade: <?= $dados_equip[$key]['lab' . $id_lab]; ?></span>
                                                     <a href="../../src/models/labs.model.php?l=<?=$id_lab.'&Ere='.$id_equip ?>"><span>remover</span></a>
                                                </div>
                                            </div>
                                    <?php }
                                    }; ?>
                                </div>
                            </article>

                        </li>
                    </ul>
                </div>


            </section>


        </main>
    </section>

    <footer class="bg-slate-500 flex flex-row justify-self-end">
        <p>
            < footer aqui>
        </p>
    </footer>

    <script src="../../src/suporte_reportes.js"></script>
</body>

</html>