<?php
require '../../src/models/login_seguranca.php';
require '../../src/models/conn.php';


$sql = "SELECT id, laboratorio, categoria, software, equipamento, problema, outro_problema, mesa, situação 
            FROM problemas
            ORDER BY laboratorio ASC";

$slq_labs_c_problemas = "SELECT DISTINCT laboratorio
                             FROM problemas
                             ORDER BY laboratorio ASC";

$sql_num_report_lab = "SELECT Count(laboratorio) AS num, laboratorio AS lab
                           FROM problemas 
                           GROUP BY laboratorio
                           ORDER BY laboratorio ASC";

$result = mysqli_query($conn, $sql);
$row_count = mysqli_num_rows($result);
if (!$result) {
    echo "Nao foi possivel executar a consulta (" . $sql . ") no banco de dados: " . mysqli_error($conn);
    exit;
}

if (mysqli_num_rows($result) == 0) {
    echo "Nao foram encontradas linhas, nada para mostrar<br><br>";
}
$result_labs_c_problemas = mysqli_query($conn, $slq_labs_c_problemas);
if (!$result_labs_c_problemas) {
    echo "Nao foi possivel executar a consulta (" . $slq_labs_c_problemas . ") no banco de dados: " . mysqli_error($conn);
    exit;
}

if (mysqli_num_rows($result_labs_c_problemas) == 0) {
    echo "Nao foram encontradas linhas, nada para mostrar<br><br>";
}
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
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buscalab</title>
    <link rel="stylesheet" href="../../src/css/output.css" />

    <script src="../../src/suporte_reportes.js" defer></script>
    <script src="../../src/novo.js"></script>
</head>

<body class="font-montserrat h-screen flex flex-col justify-between">
    <header class="flex justify-between pt-2 pb-2 pr-8 pl-8 items-center shadow-lg border-b-2 border-slate-200">
        <section>
            <img src="../../assets/cyberpunk/logo-cyberpunk.svg" alt="" class="w-1/4">
        </section>

        <section class="flex gap-10 items-center">
            <a href="main.php">
                <p class="transition-all cursor-pointer font-medium hover:font-semibold" id="reportes">Reportes</p>
            </a>
            <a href="lab.php?l=1">
                <p class="transition-all cursor-pointer font-medium hover:font-semibold" id="laboratorio">Laboratório</p>
            </a>
            <img src="../../assets/logout.svg" class="w-5 hover:w-6 transition-all" alt="">
        </section>
    </header>

    <section class="flex bg-slate-100 p-8">
        <!-- <nav class="flex flex-col gap-3 w-1/4 p-4 bg-slate-50 rounded-lg shadow-lg">
            <h3 class="text-lg font-semibold">Laboratorios</h3>
            <?php
            $row = mysqli_fetch_all($result_num_report_lab);
            $aux = 0;

            for ($i = 1; $i < 7; $i++) {
                echo '<a class="transition-all hover:font-semibold flex flex-row flex-nowrap gap-4" href="lab.php?l=' . $i . '">
                            <p>Laboratorio ' . $i . '</p>';

                if ($row[$aux][1] == $i) {
                    echo "<div class='bg-orange-400 w-4 rounded-md text-center'>" . $row[$aux][0] . "</div>";
                    $aux++;
                }
                echo '</a>';
            }

            ?>
        </nav> -->

        <main class="flex flex-col p-4 gap-8 w-full ">
            <section>
                <div class="flex flex-row justify-between">
                    <h2 class="text-2xl font-semibold">Reportes</h2>
                    <h3 class="text-2xl">Problemas: <span class="font-semibold"><?php echo $row_count; ?></span></h3>
                </div>
                <div>
                    <p class="text-lg">Laboratórios com problemas:
                        <span class="font-semibold">
                            <?php
                            $num_result_labs_c_problemas = mysqli_num_rows($result_labs_c_problemas);
                            $aux = 0;
                            while ($row = mysqli_fetch_assoc($result_labs_c_problemas)) {
                                $aux++;
                                echo $row["laboratorio"];
                                if ($aux < $num_result_labs_c_problemas) {
                                    echo ", ";
                                }
                            }
                            ?>
                        </span>
                    </p>
                </div>
            </section>

            <section>

                <?php

                // Enquanto uma linha de dados existir, coloca esta linha em $row como uma matriz associativa e mostra os dados na página
                $first = True;
                $n_rows = 1;
                while ($row = mysqli_fetch_assoc($result)) {


                    $situacao = $row["situação"];
                    $id = $row["id"];
                    if ($situacao == 1) {
                        $situacao = 'Pendente';
                    } else if ($situacao == 2) {
                        $situacao = 'Em andamento';
                    } else if ($situacao == 3) {
                        $situacao = 'Concluído';
                    }
                    if ($first) {
                        $lab = intval($row["laboratorio"]);
                        $labend = $lab + 1;

                        echo '<section class="flex flex-col" style="">
                            <h3 class="font-semibold text-xl p-4 transition-all">
                            Laboratorio ' . $row["laboratorio"] . '
                            </h3>
                            <article class="flex flex-row flex-wrap gap-4" >';
                        $first = false;
                    }

                    if ($labend == $lab) {
                        $labend = $lab + 1;
                    }

                    if ($lab != intval($row["laboratorio"])) {
                        echo '</article>   
                         </section>';
                        $lab = intval($row["laboratorio"]);
                        echo '<section class="flex flex-col" style="">
                            <h3 class="font-semibold text-xl p-4 transition-all">
                            Laboratorio ' . $row["laboratorio"] . '
                            </h3>
                            <article class="flex flex-row flex-wrap gap-4">';
                    }

                    echo '          
                
                                <div class=" bg-slate-50 rounded-xl w-1/5 shrink-0 shadow-xl hover:shadow-2xl transition-all duration-300"  onclick="concluiTarefa()">
                                    <div class="p-4">
                                        <p class="w-full">Mesa:</p>
                                        <span>' . $row["mesa"] . '</span>
                                    </div>
                                    <div class="p-4 pt-0">
                                        <p class="w-full">Detalhes:</p>
                                        <span>' . $row["problema"] . '</span>
                                    </div>

                                    <div id="tarefa" data-estado="' . $situacao . '" class="reporte cursor-pointer bg-slate-500 font-semibold text-white rounded-b-xl pl-4 pt-2 pb-2">
                                        <p class="" id="status">' . $situacao . '</p>
                                    </div>
                                </div> 
                                                       
                            ';


                    if ($n_rows == $row_count) {
                        $labend = $lab + 1;
                        echo '   
                        </article> </section>';
                    }

                    $n_rows++;
                }

                ?>



        </main>
    </section>

    <footer class="bg-slate-500 flex flex-row justify-self-end">
        <p>
            < footer aqui>
        </p>
    </footer>


</body>

</html>