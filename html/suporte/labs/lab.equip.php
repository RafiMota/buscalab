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
    <script src="../../../src\lab_suporte.js" defer></script>

</head>

<body class="font-montserrat h-screen flex flex-col justify-between bg-slate-100">
    <header class="flex justify-between pt-2 pb-2 pr-8 pl-8 items-center shadow-lg border-b-2 border-slate-200 bg-white">
        <section>
            <a href="../main.php"><img src="../../../assets/cyberpunk/logo-cyberpunk.svg" alt="" class="w-3/4"></a>
        </section>

        <section class="flex gap-10 items-center">
            <a href="../main.php">
                <p class="transition-all cursor-pointer font-medium hover:font-semibold">Reportes</p>
            </a>
            <a href="lab.equip.php?l=1">
                <p class="transition-all cursor-pointer font-medium hover:font-semibold">Laboratório</p>
            </a>
            <a href="../../../src/models/logout.php"><img src="../../../assets/logout.svg" class="w-5 hover:w-6 transition-all" alt=""></a>
        </section>
    </header>






    <section class="flex align-start bg-slate-100 p-8 h-screen">
        <nav class="flex flex-col gap-3 w-1/5 h-2/3 p-8 bg-slate-50 rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold mb-2">Laboratórios</h3>
            <?php
            $row = mysqli_fetch_all($result_num_report_lab);
            $aux = 0;

            for ($i = 1; $i < 7; $i++) {
                echo '<a class="transition-all hover:font-semibold flex flex-row flex-nowrap gap-4" href="lab.soft.php?l=' . $i . '">
                                <p>Laboratório ' . $i . '</p>';

                if ($row[$aux][1] == $i) {
                    // echo "<div class='bg-orange-400 w-4 rounded-md text-center'>" . $row[$aux][0] . "</div>";
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
                    <a href="../add.equip.php?l=<?= $id_lab ?>">
                        <div class="text-xl font-semibold hover:underline transition-all ">Adicionar+</div>
                    </a>
                </div>
            </section>


            <section class="flex flex-col w-100">

                <div class="flex h-10 items-center justify-around mt-2 mb-2 w-100">
                    <a href="lab.soft.php?l=<?= $id_lab; ?>">
                        <button class="text-lg" data-page="Softwares">
                            Softwares
                        </button>
                    </a>
                    <a href="lab.modelos.php?l=<?= $id_lab; ?>">
                        <button class="text-lg" data-page="Computadores">
                            Computadores
                        </button>
                    </a>
                    <button class="text-lg font-semibold underline" data-page="Equipamentos">
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

                            <div id="Equipamentos" class="flex flex-col gap-10 p-8">

                                <div class="flex flex-row flex-wrap gap-4">
                                    <?php foreach ($dados_equip as $key => $value) {
                                        $id_equip = $dados_equip[$key]['id'];
                                        if ($dados_equip[$key]['lab' . $id_lab] != 0) {
                                    ?>
                                            <div class="flex h-full w-3/4 rounded-xl border-2 border-slate-300">
                                                <div class="flex items-center justify-center h-42 w-1/3 rounded-l-xl border-r-2 border-slate-300">
                                                    <img src="../../../assets/suporte/projetor.png" alt="" class="h-5/6">
                                                </div>
                                                <div class="flex w-full p-4 items-center justify-between">
                                                    <div class="flex flex-col">
                                                        <h3 class="text-xl font-bold"><?= $dados_equip[$key]['modelo']; ?></h3>
                                                        <span>Fabricante: <?= $dados_equip[$key]['fabricante']; ?></span>
                                                    </div>

                                                    <div class="flex flex-row gap-4">
                                                        <a  data-id="../../../src/models/labs.model.php?l=<?= $id_lab . '&Ere=' . $id_equip ?>" data-todos="../../../src/models/labs.model.php?l=<?= $id_lab . '&Edel=' . $id_equip ?>" class ="lixo">
                                                            <img src="../../../assets/suporte/lixo.png" alt="" class="h-7 mt-4 ml-4 hover:h-8 transition-all duration-200">
        
                                                        </a>
                                                        <a href="../add.equip.php?l=<?=$id_lab.'&edit='.$id_equip; ?>">
                                                            <img src="../../../assets/suporte/editar.png" alt="" class="h-7 mt-4 ml-4 hover:h-8 transition-all duration-200">
                                                        </a>
                                                    </div>

                                                </div>
                                                
                                            </div>
                                            
                                    <?php }
                                    }; ?>
                                </div>
                                </div>


                    </ul>
                </div>


            </section>