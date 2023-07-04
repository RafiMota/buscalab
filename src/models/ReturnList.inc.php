<?php
    include("conn.php");
    
    if (!empty($_POST['search'])) {
        $Search_Query = $conn->real_escape_string($_POST['search']);
        $query = "SELECT * FROM tb_modelos
        WHERE modelo LIKE '%{$Search_Query}%' AND (lab1 > 0 OR lab2 > 0 OR lab3 > 0 OR lab4 > 0 OR lab5 > 0 OR lab6 > 0 );";
        $result = $conn->query($query) or die($conn->error);

        $query_soft = "SELECT * FROM tabela_softwares
        WHERE software LIKE '%{$Search_Query}%' AND (lab1 > 0 OR lab2 > 0 OR lab3 > 0 OR lab4 > 0 OR lab5 > 0 OR lab6 > 0 );";
        $result_soft = $conn->query($query_soft) or die($conn->error);
        
        $html ='<ul>';
        if (mysqli_num_rows($result) > 0 || mysqli_num_rows($result_soft) > 0) {
            while ($row = mysqli_fetch_array($result,MYSQLI_NUM)) {                
                $html .= "" .ucfirst($row[0])." | "; 
                $html .= "<li class='search_item'>";
                
                for ($i = 1; $i < 8;$i++) { 
                    // print_r(count($row));
                    if($row[$i] > 0){  
                        // $html .= "<li class='list-group-item'><a>".print_r($row)."</a></li>";
                        $href = "html/lab1.php?l=".$i."";                                     
                        $html .= "<a href=".$href."> Laboratório ".$i."</a>";
                        // $html .= " | ";                        
                    }                    
                    
                }    
                $html .= "</li></br>";
            }
            while ($row_soft = mysqli_fetch_array($result_soft,MYSQLI_NUM)) {                
                $html .= "" .ucfirst($row_soft[1])." | "; 
                $html .= "<li class='search_item'>";
                
                for ($i = 1; $i < 8;$i++) { 
                    
                    if($row_soft[$i] > 0){  
                        
                        $href = "html/lab1.php?l=".$i."";                                     
                        $html .= "<a href=".$href."> Laboratório ".$i."</a>";
                        // $html .= " | ";                        
                    }                    
                    
                }    
                $html .= "</li></br>";
            }
            
        } else {
            $html .= '<li">Sorry! No record found</li>';
        }
        $html .= "</ul>";
        echo $html;
    }    
    
    ?>