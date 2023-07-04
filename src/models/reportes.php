<?php

$sql = "SELECT id, laboratório, categoria, software, equipamento, problema, outro_problema, mesa, situação 
FROM problemas
ORDER BY laboratório ASC";

$slq_labs_c_problemas = "SELECT DISTINCT laboratório
                 FROM problemas
                 ORDER BY laboratório ASC";

$sql_num_report_lab = "SELECT Count(laboratório) AS num, laboratório AS lab
               FROM problemas 
               GROUP BY laboratório
               ORDER BY laboratório ASC";

$result = mysqli_query($conn, $sql);
$row_count = mysqli_num_rows($result);
if (!$result) {
echo "Nao foi possivel executar a consulta (".$sql.") no banco de dados: " . mysqli_error($conn);
exit;
}

if (mysqli_num_rows($result) == 0) {
echo "Nao foram encontradas linhas, nada para mostrar<br><br>";
}
$result_labs_c_problemas = mysqli_query($conn, $slq_labs_c_problemas);    
if (!$result_labs_c_problemas) {
echo "Nao foi possivel executar a consulta (".$slq_labs_c_problemas.") no banco de dados: " . mysqli_error($conn);
exit;
}

if (mysqli_num_rows($result_labs_c_problemas) == 0) {
echo "Nao foram encontradas linhas, nada para mostrar<br><br>";
}
$result_num_report_lab = mysqli_query($conn, $sql_num_report_lab);    
if (!$result_num_report_lab) {
echo "Nao foi possivel executar a consulta (".$sql_num_report_lab.") no banco de dados: " . mysqli_error($conn);
exit;
}

if (mysqli_num_rows($result_num_report_lab) == 0) {
echo "Nao foram encontradas linhas, nada para mostrar<br><br>";
}



?>