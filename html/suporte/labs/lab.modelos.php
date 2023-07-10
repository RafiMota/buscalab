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
            <a href="lab.modelos.php?l=1">
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
                    <a href="../add.comp.php?l=<?= $id_lab ?>">
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
                    <button class="text-lg font-semibold underline" data-page="Computadores">
                        Computadores
                    </button>
                    <a href="lab.equip.php?l=<?= $id_lab; ?>">
                        <button class="text-lg" data-page="Equipamentos">
                            Equipamentos
                        </button>
                    </a>
                    
                </div>
                <div>
                    <ul>
                        <li>
                            <div id="Equipamentos" class="flex flex-col gap-10 p-8">

                                <div class="flex flex-wrap gap-4">
                                    <?php foreach ($dados_modelos as $key => $value) {
                                        $id_modelo = $dados_modelos[$key]['id'];
                                        if ($dados_modelos[$key]['lab' . $id_lab] != 0) {
                                            $modelo = $dados_modelos[$key]['modelo'];
                                            
                                    ?>
                                            <div class="flex flex-col h-full w-3/4 rounded-xl border-2 border-slate-300">
                                                <div class="flex flex-row border-b-2 border-slate-300">
                                                    <div class="h-42 w-1/3 rounded-l-xl border-r-2 border-slate-300">
                                                        <img src="../../../assets/suporte/laptop.png" alt="">
                                                    </div>

                                                    <div class="flex w-full items-center gap-4 p-4 justify-between">
                                                        <div >
                                                            <h3 class="text-xl font-bold"><?= $dados_modelos[$key]['modelo']; ?></h3>
                                                            <div class="flex flex-row flex-nowrap gap-4 justify-center align-center"> 
                                                                <span>Quantidade: <?= $dados_modelos[$key]['lab' . $id_lab]; ?></span>
                                                                <a href="../../../src/models/labs.model.php?l=<?= $id_lab . '&mc=' . $id_modelo; ?>">
                                                                    <button>
                                                                        <span class="transition-all bg-slate-100 hover:bg-slate-300 p-0 font-bold text-xl rounded-md">
                                                                            +
                                                                        </span>
                                                                    </button>
                                                                </a>
                                                                <a href="../../../src/models/labs.model.php?l=<?= $id_lab . '&lc=' . $id_modelo; ?>">
                                                                    <button>
                                                                        <span class="transition-all bg-slate-100 hover:bg-slate-300 p-0 font-bold text-xl rounded-md">
                                                                            -
                                                                        </span>
                                                                    </button>
                                                                </a>
                                                            </div>
                                                        </div>                                                        
                                                            
                                                        <div class="flex flex-row items-center gap-2">
                                                            <style>
                                                                .lixo{
                                                                    width: 50px;
                                                                }
                                                            </style>
                                                            <a class ="lixo" data-id="../../../src/models/labs.model.php?l=<?=$id_lab . '&Mre=' . $id_modelo ?>" data-todos="../../../src/models/labs.model.php?l=<?= $id_lab . '&Mdel=' . $modelo ?>" >
                                                                <img src="../../../assets/suporte/lixo.png" alt="" class="h-6 mt-4 ml-4 hover:h-8 transition-all duration-200">
                                                            </a><br>
                                                            <a href="../add.comp.php?l=<?=$id_lab.'&edit='.$modelo; ?>">
                                                                <img src="../../../assets/suporte/editar.png" alt="" class="h-6 mt-4 ml-4 hover:h-8 transition-all duration-200">
                                                            </a>
                                                        </div>                                            
                                                        
                                                    </div>
                                                </div>
                                                <?php
                                                    $query_detalhes = $conexao2->prepare("SELECT * FROM tb_info_modelos WHERE modelo = '$modelo' ");
                                                    $query_detalhes->execute();
                                                    $dados_detalhes = $query_detalhes->fetchAll(PDO::FETCH_ASSOC);
                                                   
                                                ?>
                                                <div class="flex items-center justify-center h-fit">
                                                    <details class="flex justify-center items-center w-full p-2 cursor-pointer">
                                                        
                                                        <summary class="">
                                                            Detalhes
                                                        </summary>

                                                        <p class="p-4 pt-2 pb-2">
                                                             <b>Fabricante:</b> <?=$dados_detalhes[0]['fabricante'];?>
                                                        </p>

                                                        <p class="p-4 pt-2 pb-2">
                                                            <b>Modelo:</b> <?=$dados_detalhes[0]['modelo'];?>
                                                        </p>

                                                        <p class="p-4 pt-2 pb-2">
                                                            <b>Procesador: </b> <?=$dados_detalhes[0]['processador'];?>
                                                        </p>

                                                        <p class="p-4 pt-2 pb-2">
                                                            <b>CPU MARK: </b> <?=$dados_detalhes[0]['cpu_mark'];?>
                                                        </p>

                                                        <p class="p-4 pt-2 pb-2">
                                                            <b>Memória: </b> <?=$dados_detalhes[0]['mem_capacidade'];?>
                                                        </p>

                                                        <p class="p-4 pt-2 pb-2">
                                                            <b>Tipo de memória: </b> <?=$dados_detalhes[0]['mem_tipo'];?>
                                                        </p>

                                                        <p class="p-4 pt-2 pb-2">
                                                            <b>Disco: </b> <?=$dados_detalhes[0]['disco1_capacidade'];?>
                                                        </p>

                                                        <p class="p-4 pt-2 pb-2">
                                                            <b>Tipo de disco: </b> <?=$dados_detalhes[0]['disco1_tipo'];?>
                                                        </p>
                                                        <p class="p-4 pt-2 pb-2">
                                                            <b>Modelo do disco: </b> <?=$dados_detalhes[0]['disco1_modelo'];?>
                                                        </p>

                                                        
                                                        <?php
                                                        //condicional para testar se o modelo tem dois discos rígidos
                                                        if($dados_detalhes[0]['disco2_capacidade'] != ''){ ?>

                                                        <p class="p-4 pt-2 pb-2">
                                                            <b>Disco 2: </b> <?=$dados_detalhes[0]['disco2_capacidade'];?>
                                                        </p>

                                                        <p class="p-4 pt-2 pb-2">
                                                            <b>Tipo de disco2: </b> <?=$dados_detalhes[0]['disco2_tipo'];?>
                                                        </p>

                                                        <p class="p-4 pt-2 pb-2">
                                                            <b>Modelo do disco2: </b> <?=$dados_detalhes[0]['disco2_modelo'];?>
                                                        </p>

                                                        <?php };?>

                                                        <p class="p-4 pt-2 pb-2">
                                                            <b>Sistema operacional: </b> <?=$dados_detalhes[0]['so_nome'];?>
                                                        </p>

                                                        <p class="p-4 pt-2 pb-2">
                                                            <b>Compilação:</b> <?=$dados_detalhes[0]['so_compilacao'];?>
                                                        </p>
                                                    </details>
                                                </div>

                                            </div>
                                    <?php }
                                    }; ?>
                                </div>
                                </div>



                    </ul>
                </div>


            </section>