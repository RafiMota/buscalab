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
    <title>Adicionar Software</title>
</head>
<body>
<?php
// condicional para gerar página de edição
    if(isset($_GET['edit']) && !empty($_GET['edit'])){
        $modelo = $_GET['edit'];
        $query_edit_modelo = $conexao->prepare("SELECT * FROM tb_modelos WHERE modelo = '$modelo'");
        $query_edit_modelo->execute();
        $dados_modelos = $query_edit_modelo->fetchAll(PDO::FETCH_ASSOC);
        $query_edit_detalhes = $conexao2->prepare("SELECT * FROM tb_info_modelos WHERE modelo = '$modelo'");
        $query_edit_detalhes->execute();
        $dados_detalhes = $query_edit_detalhes->fetchAll(PDO::FETCH_ASSOC);

        
      
?>
<div class="flex flex-col gap-10 p-8 pl-0 pr-0 absolute items-center justify-center bg-slate-300 w-screen">
            

            <div id="formAdicionar" class="flex flex-col items-center justify-between bg-slate-100 shadow-xl w-1/2 rounded-xl h-full p-8">
                <header class="w-full text-center mb-4">
                    <h2 class="text-xl font-semibold">
                        Editar modelo
                    </h2>
                </header>
                <main class="flex flex-col w-full h-full">

                    <form action="../../src/models/labs.model.php?Medit=1&l=<?=$id_lab?>" method="post" class="flex flex-col justify-center items-center gap-4 w-full h-full">
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="fabricante">Fabricante</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="fabricante" name="fabricante" value="<?=$dados_detalhes[0]['fabricante'];?>">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="modelo">Modelo</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="modelo" name="modelo" value="<?=$dados_detalhes[0]['modelo'];?>">
                        </div>
                        
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="processador">Processador</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="processador" name="procesador"value="<?=$dados_detalhes[0]['processador'];?>">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="cpu_mark">CPU Mark</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="cpu_mark" name="cpu_mark" value="<?=$dados_detalhes[0]['cpu_mark'];?>">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="mem_capacidade">Capacidade de memória (RAM)</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="mem_capacidade" name="mem_capacidade" value="<?=$dados_detalhes[0]['mem_capacidade'];?>">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="mem_tipo">Tipo de memória</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="mem_tipo" name="mem_tipo" value="<?=$dados_detalhes[0]['mem_tipo'];?>">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="disc1_capacidade">Capacidade do disco 1</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="disc1_capacidade" name="disc1_capacidade" value="<?=$dados_detalhes[0]['disco1_capacidade'];?>">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="disc1_tipo">Tipo do disco 1</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="disc1_tipo" name="disc1_tipo" value="<?=$dados_detalhes[0]['disco1_tipo'];?>">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="disc1_modelo">Modelo do disco 1</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="disc1_modelo" name="disc1_modelo" value="<?=$dados_detalhes[0]['disco1_modelo'];?>">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="disc2_capacidade">Capacidade do disco 2 ( caso exista )</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="disc2_capacidade" name="disc2_capacidade"value="<?=$dados_detalhes[0]['disco2_capacidade'];?>">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="disc2_tipo">Tipo do disco 2 ( caso exista )</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="disc2_tipo" name="disc2_tipo" value="<?=$dados_detalhes[0]['disco2_tipo'];?>">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="disc2_modelo">Modelo disco 2 ( caso exista )</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="disc2_modelo" name="disc2_modelo" value="<?=$dados_detalhes[0]['disco2_modelo'];?>">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="so_nome">Sistema operacional</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="so_nome" name="so_nome" value="<?=$dados_detalhes[0]['so_nome'];?>">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="so_comp">Compilação do sistema operacional</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="so_comp" name="so_comp" value="<?=$dados_detalhes[0]['so_compilacao'];?>">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="lab1">Quantidade no Lab 1</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="number" id="lab1" name="lab1" value="<?=$dados_modelos[0]['lab1'];?>">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="lab2">Quantidade no Lab 2</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="number" id="lab2" name="lab2" value="<?=$dados_modelos[0]['lab2'];?>">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="lab3">Quantidade no Lab 3</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="number" id="lab3" name="lab3" value="<?=$dados_modelos[0]['lab3'];?>">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="lab4">Quantidade no Lab 4</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="number" id="lab4" name="lab4 value=" value="<?=$dados_modelos[0]['lab4'];?>">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="lab5">Quantidade no Lab 5</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="number" id="lab5" name="lab5" value="<?=$dados_modelos[0]['lab5'];?>">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="lab6">Quantidade no Lab 6</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="number" id="lab6" name="lab6" value="<?=$dados_modelos[0]['lab6'];?>">
                        </div>
                        
                        
                        
                        
                        
                        
                            <button type="submit" class="bg-slate-300 hover:bg-slate-500 shadow-md hover:text-slate-100 font-semibold transition-all p-2 rounded-md">Concluir</button>
                    </form>

                </main>
               
            </div>
        </div>
<?php } else{?>
<div class="flex flex-col gap-10 p-8 pl-0 pr-0 absolute items-center justify-center bg-slate-300 w-screen">
            <div class="flex flex-col justify-between items-center bg-slate-100 shadow-xl w-1/2 rounded-xl h-full p-8">
                <header class="w-full text-center">
                    <h2 class="text-xl font-semibold">
                        Qual modelo você deseja adicionar?
                    </h2>
                </header>
                <main class="flex">

                   
                <div id="Computadores" class="justify-start p-8 w-full">
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
                    

                </main>
                
            </div>

            <div id="formAdicionar" class="flex flex-col items-center justify-between bg-slate-100 shadow-xl w-1/2 rounded-xl h-full p-8">
                <header class="w-full text-center mb-4">
                    <h2 class="text-xl font-semibold">
                        Cadastre um modelo novo
                    </h2>
                </header>
                <main class="flex flex-col w-full h-full">

                    <form action="../../src/models/labs.model.php?Mcad=1&l=<?=$id_lab?>" method="post" class="flex flex-col justify-center items-center gap-4 w-full h-full">
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="fabricante">Fabricante</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="fabricante" name="fabricante">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="modelo">Modelo</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="modelo" name="modelo">
                        </div>
                        
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="processador">Processador</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="processador" name="processador">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="cpu_mark">CPU Mark</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="cpu_mark" name="cpu_mark">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="mem_capacidade">Capacidade de memória (RAM)</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="mem_capacidade" name="mem_capacidade">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="mem_tipo">Tipo de memória</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="mem_tipo" name="mem_tipo">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="disc1_capacidade">Capacidade do disco 1</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="disc1_capacidade" name="disc1_capacidade">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="disc1_tipo">Tipo do disco 1</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="disc1_tipo" name="disc1_tipo">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="disc1_modelo">Modelo do disco 1</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="disc1_modelo" name="disc1_modelo">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="disc2_capacidade">Capacidade do disco 2 ( caso exista )</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="disc2_capacidade" name="disc2_capacidade">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="disc2_tipo">Tipo do disco 2 ( caso exista )</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="disc2_tipo" name="disc2_tipo">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="disc2_modelo">Modelo disco 2 ( caso exista )</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="disc2_modelo" name="disc2_modelo">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="so_nome">Sistema operacional</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="so_nome" name="so_nome">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="so_comp">Compilação do sistema operacional</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="text" id="so_comp" name="so_comp">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="lab1">Quantidade no Lab 1</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="number" id="lab1" name="lab1">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="lab2">Quantidade no Lab 2</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="number" id="lab2" name="lab2">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="lab3">Quantidade no Lab 3</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="number" id="lab3" name="lab3">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="lab4">Quantidade no Lab 4</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="number" id="lab4" name="lab4">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="lab5">Quantidade no Lab 5</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="number" id="lab5" name="lab5">
                        </div>
                        <div class="flex flex-col w-2/3">
                            <label class="ml-2" for="lab6">Quantidade no Lab 6</label>
                            <input class="border-2 border-slate-300 p-2 pt-1 pb-1 rounded-md" type="number" id="lab6" name="lab6">
                        </div>
                        
                        
                        
                        
                        
                        
                            <button type="submit" class="bg-slate-300 hover:bg-slate-500 shadow-md hover:text-slate-100 font-semibold transition-all p-2 rounded-md">Concluir</button>
                    </form>

                </main>
               
            </div>
        </div>
    </div>
    <?php };?>

</body>
</html>













   <div id="Computadores" class="justify-start p-8 w-full">
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