<?php
   
    class Conexao {
        private  $host = 'localhost';
        private  $dbname = 'inventario_labs';
        private  $user = 'root';
        private  $pass = '';

        public function conectar() {
            try {
                $conexao= new PDO(
                    "mysql:host=$this->host;dbname=$this->dbname",
                    "$this->user",
                    "$this->pass"
                );
                return $conexao;
            }
            catch(PDOException $e){
                echo '<p>'.$e->getMessage().'</p>';
                echo 'oi';
            }

        }


    }
    $con = new Conexao;
    $conexao = $con ->conectar();
    $con2 = new Conexao;
    $conexao2 = $con2->conectar();
    
?>