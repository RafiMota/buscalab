<?php include '../src/models/labs.model.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Laboratório 1</title>
  <link rel="stylesheet" href="../src/css/glide.core.css" />
  <link rel="stylesheet" href="../src/css/carousel.css" />
  <link rel="stylesheet" href="../src/css/glide_carrossel_lab.css" />
  <link rel="stylesheet" href="../src/css/output.css" />
  <script src="../src/lab.js"></script>
</head>
<!-- <style>
  * {
    outline: dashed 1px #00000044;
  }
</style> -->
<style>
  #reportar_facil {
    font-size: 14px;

    position: fixed;
    display: flex;
    flex-flow: column nowrap;
    justify-content: center;
    align-items: center;

    right: 30px;
    bottom: 30px;


    width: 83px;
    height: 83px;
    border-radius: 50%;
    padding: 4px;
    color: #ffffff;
    z-index: 1;
  }

  .megafone {
    width: 25px;
    height: 25px;
  }
</style>
<a href="reportar.html" id="reportar_facil" class="font-montserrat">
  <img src="../assets/megafone_branco.svg" alt="Megafone de reporte" class="megafone">
  Reportar
</a>

<body class="font-montserrat">



  <header id="header" class="flex items-center justify-between border-b-2 p-8 pb-2 pt-2">
    <a href="../index.php">
      <img id="logo" src="../assets/cyberpunk/logo-cyberpunk.svg" alt="" class="w-16" />
    </a>
  </header>

  <section>
    <img id="capa" src="../assets/cyberpunk/capa-cyberpunk.png" alt="">
  </section>

  <main>
    <article class="flex w-screen">
      <div class="carousel m-0">
        <div class="glide2 w-screen">
          
          <div id="abas" class="flex h-10 items-center justify-around mt-2 mb-2" data-glide-el="controls[nav]">
            <button class="bg-white text-rose-600" data-number="0" data-glide-dir="= 0" onclick="">
              Softwares
            </button>
            <button class="bg-white text-rose-600" data-number="1" data-glide-dir="= 1" onclick="">
              Computadores
            </button>
            <button class="bg-white text-rose-600" data-number="2" data-glide-dir="= 2" onclick="">
              Equipamentos
            </button>
          </div>
          <div data-glide-el="track" class="glide__track">
            <ul class="glide__slides">
              <li class="glide__slide">

                <!-- <style>
                  #softwares {
                    display: flex;
                    flex-flow: row wrap;
                    justify-content: space-around;
                    align-items: start;
                  }
                </style> -->
                <section id="softwares" class="flex flex-row flex-wrap justify-center items-start p-4 gap-4">

                  <?php foreach ($dados_soft as $key => $value) {
                    if ($dados_soft[$key]['lab' . $id_lab] != 0) {
                  ?>

                      <div class="flex flex-col items-center justify-center border-2 border-slate-700 h-36 w-36 rounded-lg mb-2 p-4 text-center hover:brightness-50">
                        <img src="../assets/<?= $dados_soft[$key]['imagem']; ?>" alt="" />
                        <p class="text-xs font-bold"><?= $dados_soft[$key]['software']; ?></p>
                      </div>

                  <?php }
                  }; ?>
                </section>



              </li>
              <li class="glide__slide">

                <section id="computadores" class="flex flex-col gap-10 p-8">
                  <?php foreach ($dados_modelos as $key => $value) {
                    if ($dados_modelos[$key]['lab' . $id_lab] != 0) {
                  ?>
                      <div class="flex flex-col h-fit w-full rounded-xl border-2 border-slate-700">
                        <div class="flex flex-row border-b-2 border-slate-700">
                          <div class="flex justify-center items-center h-full w-1/3 rounded-l-xl border-r-2 border-slate-700">
                            <img src="../assets/suporte/laptop.png" alt="">
                          </div>
                          <div class="w-2/3 p-4">
                            <h3 class="text-xl font-bold"><?= $dados_modelos[$key]['modelo']; ?></h3>
                            <p>Quantidade: <span><?= $dados_modelos[$key]['lab' . $id_lab]; ?></span></p>
                          </div>
                        </div>
                        <div class="flex items-center justify-center h-fit">
                          <details class="p-2">
                            <summary>Detalhes</summary>
                            <p class="p-4">Conteúdo Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque eaque et totam excepturi est sunt quia in nobis id, quam fuga odio sed nihil consequuntur beatae impedit, perferendis unde repellendus?</p>
                          </details>
                        </div>
                      </div>
                  <?php }
                  }; ?>
                </section>



              </li>
              <li class="glide__slide">


                <section id="equipamentos" class="flex flex-col gap-10 p-8">
                  <?php foreach ($dados_equip as $key => $value) {
                    if ($dados_equip[$key]['lab' . $id_lab] != 0) {
                  ?>
                      <div class="flex h-20 w-full rounded-xl border-2 border-slate-700">
                        <div class="flex justify-center items-center h-full w-1/3 rounded-l-xl border-r-2 border-slate-700">
                          <div class="h-fit w-5/6 rounded-l-xl ">
                            <img src="../assets/suporte/projetor.png" alt="">
                          </div>
                        </div>
                        <div class="w-full p-4">
                          <h3 class="text-xl font-bold"><?= $dados_equip[$key]['modelo']; ?></h3>
                          <p> <span>Quantidade: <?= $dados_equip[$key]['lab' . $id_lab]; ?></span></p>
                        </div>
                      </div>
                  <?php }
                  }; ?>
                </section>

              </li>
            </ul>
          </div>
        </div>
      </div>
    </article>

    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    <script>
      const config = {
        type: "carousel",
        perView: 1,
      };
      new Glide(".glide2", config).mount();
    </script>
  </main>
</body>

</html>