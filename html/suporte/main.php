<?php  
 
    require '../../src/models/login_seguranca.php';
    require '../../src/models/conn.php'; 

    // //Config. para acesso ao mySql localmente 
    // $hostname = "localhost";
    // $bancodedados = "inventario_labs";
    // $usuario = "root";
    // $senha = "";


    // $mysqli = mysqli_connect($hostname, $usuario, $senha, $bancodedados);
    // if ($mysqli->connect_errno) {
    //     echo "Falha ao conectar:(" . $mysqli->connect_errno . ")" . $mysqli->connect_error;
    // } else {
    //     echo "Conectado com sucesso";
    // }

    // Consulta SQL
    $sql = "SELECT id, laboratório, categoria, software, equipamento, problema, outro_problema, mesa, situação FROM problemas";
    $sql2 = "SELECT id, laboratório, categoria, software, equipamento, problema, outro_problema, mesa, situação FROM problemas ORDER BY laboratório ASC";

    $result = mysqli_query($conn, $sql2);
    $row_count = mysqli_num_rows($result);
    if (!$result) {
        echo "Nao foi possivel executar a consulta ($sql2) no banco de dados: " . mysqli_error($conn);
        exit;
    }

    if (mysqli_num_rows($result) == 0) {
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
</head>

<body class="font-montserrat h-screen flex flex-col justify-between">
    <header class="flex justify-between pt-2 pb-2 pr-8 pl-8 items-center shadow-lg border-b-2 border-slate-100">
        <section>
            <img src="../../assets/cyberpunk/logo-cyberpunk.svg" alt="" class="w-1/4">
        </section>

        <section class="flex gap-10 items-center">
            <p class="transition-all cursor-pointer font-medium hover:font-semibold">Reportes</p>
            <p class="transition-all cursor-pointer font-medium hover:font-semibold">Laboratório</p>
            <img src="../../assets/logout.svg" class="w-5 hover:w-6 transition-all" alt="">
        </section>
    </header>
    <section class="flex bg-slate-100 p-8">
        <nav class="flex flex-col gap-3 w-1/6 p-4 bg-slate-50 rounded-lg shadow-lg">
            <h3 class="text-lg font-semibold">Laboratórios</h3>
            <a class="transition-all hover:font-semibold" href="">Laboratório 1</a>
            <a class="transition-all hover:font-semibold" href="">Laboratório 2</a>
            <a class="transition-all hover:font-semibold" href="">Laboratório 3</a>
            <a class="transition-all hover:font-semibold" href="">Laboratório 4</a>
            <a class="transition-all hover:font-semibold" href="">Laboratório 5</a>
            <a class="transition-all hover:font-semibold" href="">Laboratório 6</a>
        </nav>

        <main class="flex flex-col p-4 gap-8 w-full ">
            <section>
                <div class="flex flex-row justify-between">
                    <h2 class="text-2xl font-semibold">Reportes</h2>
                    <h3 class="text-2xl">Problemas: <span class="font-semibold">3</span></h3>
                </div>
                <div>
                    <p class="text-lg">Laboratórios com problemas: <span class="font-semibold">2, 3</span></p>
                </div>
            </section>

            <section>          

            <?php            

            // Enquanto uma linha de dados existir, coloca esta linha em $row como uma matriz associativa e mostra os dados na página
            $first = True;
            $n_rows = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                
                // print_r ($row);
                // echo '<div class="agrupamento> laboratório: ' . $row["laboratório"] . '<br>';
                // echo 'categoria: ' . $row["categoria"] . '<br>';
                // echo 'software:' . $row["software"] . '<br>';
                // echo 'equipamento:' . $row["equipamento"] . '<br>';
                // echo 'problema: ' . $row["problema"] . '<br>';
                // echo 'outro problema: ' . $row["outro_problema"] . '<br>';
                // echo 'mesa: ' . $row["mesa"] . '<br>';
                
                $situacao = $row["situação"];
                    $id = $row["id"];
                    if($situacao == 1){
                        $situacao = 'Pendente';
                            
                    }else if($situacao == 2){
                        $situacao = 'Em andamento';
                            
                    }else if($situacao == 3){
                        $situacao = 'Concluído';
                            
                }
                if($first){
                    $lab = intval($row["laboratório"]);
                    $labend = $lab+1;
                    
                    echo '<section class="flex flex-col" style="outline: dashed 1px red">
                            <h3 class="font-semibold text-xl p-4 transition-all">
                            Laboratório '. $row["laboratório"]. '
                            </h3>
                            <article class="flex flex-row gap-4" >'; 
                    $first = false;
                }
                
                if($labend == $lab){                    
                    $labend = $lab+1;                    
                } 

                if($lab != intval($row["laboratório"])){ 
                    echo '</article>   
                         </section>';                   
                    $lab = intval($row["laboratório"]);
                    echo '<section class="flex flex-col" style="outline: dashed 1px red">
                            <h3 class="font-semibold text-xl p-4 transition-all">
                            Laboratório ' . $row["laboratório"] . '
                            </h3>
                            <article class="flex flex-row gap-4" >';  
                                                              
                }                    
                
                echo '          
                
                                <div class="cursor-pointer bg-slate-50 rounded-xl w-1/5 flex flex-col shadow-xl hover:shadow-2xl transition-all duration-300" onclick="concluiTarefa()">
                                    <div class="p-4">
                                        <p class="w-full">Mesa:</p>
                                        <span>'. $row["mesa"] .'</span>
                                    </div>
                                    <div class="p-4 pt-0">
                                        <p class="w-full">Detalhes:</p>
                                        <span>' . $row["problema"] . '</span>
                                    </div>

                                    <div id="tarefa" class="bg-slate-500 font-semibold text-white rounded-b-xl pl-4 pt-2 pb-2">
                                        <p id="status">' . $situacao . '</p>
                                    </div>
                                </div> 
                                                       
                            ';

                
                if($n_rows == $row_count){                    
                    $labend = $lab+1;
                    echo '   
                        </article> </section>';
                } 
                        
                $n_rows++;
                // Parte relacionada ao pagamento e validade da reserva 
                // $situacao = $row["situação"];
                // $id = $row["id"];
                // if($situacao == 1){
                //     echo 'situação: a fazer';
                //     echo "<p><a href='update.php?id=$id'>Reporte em andamento</a><p></div><br>";
                // }else if($situacao == 2){
                //     echo 'situação: em andamento';
                //     echo "<p><a href='update.php?id=$id'>Reporte concluído</a><p></div><br>";
                // }else if($situacao == 3){
                //     echo 'situação: feito';
                //     echo "<p><a href='remover.php?id=$id'>Remover reporte</a><p></div><br>";
                // }
                
            }

            ?>



        </main>
    </section>

    <footer class="bg-slate-500 flex flex-row justify-self-end">
        <p>< footer aqui ></p>
    </footer>

    <script src="../../src/suporte_reportes.js"></script>
</body>

</html>