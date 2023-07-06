<?php

require '../../../src/models/login_seguranca.php';
require '../../../src/models/conn.php';
include '../../../src/models/labs.model.php';

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
    <link rel="stylesheet" href="../../../src/css/output.css" />
    
</head>

<body class="font-montserrat h-screen flex flex-col justify-between">
    <header class="flex justify-between pt-2 pb-2 pr-8 pl-8 items-center shadow-lg border-b-2 border-slate-200">
        <section>
            <a href="../main.php"><img src="../../../assets/cyberpunk/logo-cyberpunk.svg" alt="" class="w-1/4"></a>
        </section>

        <section class="flex gap-10 items-center">
            <a href="../main.php">
                <p class="transition-all cursor-pointer font-medium hover:font-semibold">Reportes</p>
            </a>
            <a href="lab.modelos.php?l=1">
                <p class="transition-all cursor-pointer font-medium hover:font-semibold">Laboratório</p>
            </a>
            <a href="../../../src/models/logout.php"><img src="../../../assets/logout.svg" class="w-5 hover:w-6 transition-all" alt=""></a>
        </section>
    </header>

    




    <section class="flex align-start bg-slate-100 p-8 h-screen">
        <nav class="flex flex-col gap-3 w-1/5 p-4 bg-slate-50 rounded-lg shadow-lg">
            <h3 class="text-lg font-semibold">Laboratórios</h3>
            <?php
            $row = mysqli_fetch_all($result_num_report_lab);
            $aux = 0;

            for ($i = 1; $i < 7; $i++) {
                echo '<a class="transition-all hover:font-semibold flex flex-row flex-nowrap gap-4" href="lab.modelos.php?l=' . $i . '">
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
                    <a href="lab.soft.php?l=<?=$id_lab;?>">
                        <button class="bg-white text-rose-600" data-page="Softwares">
                            Softwares
                        </button>
                    </a>
                    <button class="bg-white text-rose-600" data-page="Computadores">
                        Computadores
                    </button>
                    <a href="lab.equip.php?l=<?=$id_lab;?>">
                        <button class="bg-white text-rose-600" data-page="Equipamentos">
                            Equipamentos
                        </button>
                    </a>
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
                            <article  class="flex flex-col gap-10 p-8">
                            <a href="../add.comp.php?l=<?=$id_lab?>">
                                    <div  class="text-xl font-semibold hover:underline transition-all ">Adicionar+</div>
                            </a>
                                <div >
                                    <?php foreach ($dados_modelos as $key => $value) {
                                        $id_modelo = $dados_modelos[$key]['id'];
                                        if ($dados_modelos[$key]['lab' . $id_lab] != 0) {
                                    ?>
                                            <div class="flex h-20 w-full rounded-xl ">
                                                <div class="h-full w-1/3 rounded-l-xl bg-rose-50 "></div>
                                                <div class="w-full p-4">
                                                    <h3 class="text-xl font-bold"><?= $dados_modelos[$key]['modelo']; ?></h3>
                                                    <span>Quantidade: <?= $dados_modelos[$key]['lab' . $id_lab]; ?></span>
                                                    <a href="../../../src/models/labs.model.php?l=<?=$id_lab.'&mc='.$id_modelo;?>"><button><span class="bg-red-400 p-2 rounded-md">+</span></button></a>
                                                    <a href="../../../src/models/labs.model.php?l=<?=$id_lab.'&lc='.$id_modelo;?>"><button><span class="bg-red-400 p-2 rounded-md">-</span></button></a>
                                                    
                                                    
                                                    <a href="../../../src/models/labs.model.php?l=<?=$id_lab.'&Mre='.$id_modelo ?>"><p>remover</p></a>
                                                </div>
                                            </div>
                                    <?php }}; ?>
                                </div>
                            </article>


                       
                    </ul>
                </div>


            </section>