<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buscalab</title>
    <link rel="stylesheet" href="src/css/glide.core.css" />
    <link rel="stylesheet" href="src/css/glide.theme.css" />
    <link rel="stylesheet" href="src/css/carousel.css" />
    <link rel="stylesheet" href="src/css/output.css" />


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="src\busca_dinamica.js"></script>
  </head>

  <body class="font-montserrat">
    <header
      class="flex items-center justify-between border-b-2 border-red-300 p-8 pb-2 pt-2"
    >
      <a href="../index.php">
        <img
          id="logo"
          src="./assets/cyberpunk/logo-cyberpunk.svg"
          alt=""
          class="w-16"
        />
      </a>
      <a onclick="showbar()" href="#" class="text-xl font-bold text-slate-600">
        <img
          id="lupa"
          src="./assets/cyberpunk/lupa-cyberpunk.svg"
          alt=""
          class=""
        />        
      </a>
      
        <div id="barra" class="search" >
            <form>
                <div class="search">
                  <input type="text" id="search" class="search" placeholder="Search Here" autocomplete="off">
                  <button type="submit" id="submit" class=""></button>
                </div>
            </form>
          <div class="search" onclick="hidebar()" id="pop" >  
              <div onclick="hidebar()" id="list"></div>
          </div>
        </div>
    </header>


   
    


    <main id="carrossel">
      <section id="carousel">
        <h2 id="title" class="mb-8 mt-4 text-2xl">Conheça os laboratórios</h2>
        <!-- Article abaixo representa o Carrossel -->
        <article class="mb-8 flex flex-col justify-center">
          <div class="carousel">
            <div class="glide">
              <div data-glide-el="track" class="glide__track">
                <ul class="glide__slides">
                  <a href="html/lab1.php?l=1" class="glide__slide">
                    <img
                      src="./assets/cyberpunk/cyberpunk.png"
                      alt=""
                      class="rounded-xl"
                    />
                  </a>
                  <a href="html/lab1.php?l=2" class="glide__slide">
                    <img
                      src="./assets/solarpunk/solarpunk.png"
                      alt=""
                      class="rounded-xl"
                    />
                  </a>
                  <a href="html/lab1.php?l=3" class="glide__slide">
                    <img
                      src="./assets/magicworld/magicworld.png"
                      alt=""
                      class="rounded-xl"
                    />
                  </a>
                  <a href="html/lab1.php?l=4" class="glide__slide">
                    <img
                      src="./assets/medieval/medieval.png"
                      alt=""
                      class="rounded-xl"
                    />
                  </a>
                  <a href="html/lab1.php?l=5" class="glide__slide">
                    <img
                      src="./assets/steampunk/steampunk.png"
                      alt=""
                      class="rounded-xl"
                    />
                  </a>
                  <a href="html/lab1.php?l=6" class="glide__slide">
                    <img
                      src="./assets/spaceopera/spaceopera.png"
                      alt=""
                      class="rounded-xl"
                    />
                  </a>
                </ul>
              </div>
              <div class="glide__arrows" data-glide-el="controls">
                <button
                  class="prev glide__arrow glide__arrow--left"
                  data-glide-dir="<"
                  onclick="showSlides(-1)"
                >
                  <
                </button>
                <button
                  class="next glide__arrow glide__arrow--right"
                  data-glide-dir=">"
                  onclick="showSlides(-1)"
                >
                  >
                </button>
              </div>
              <div
                class="glide__bullets flex h-10 items-center justify-center"
                data-glide-el="controls[nav]"
              >
                <button
                  class="glide__bullet h-2 w-2 hover:bg-slate-400 focus:bg-slate-400"
                  data-number="0"
                  data-glide-dir="= 0"
                  onclick="showSlides(0)"
                ></button>
                <button
                  class="glide__bullet h-2 w-2 hover:bg-slate-400 focus:bg-slate-400"
                  data-number="1"
                  data-glide-dir="= 1"
                  onclick="showSlides(1)"
                ></button>
                <button
                  class="glide__bullet h-2 w-2 hover:bg-slate-400 focus:bg-slate-400"
                  data-number="2"
                  data-glide-dir="= 2"
                  onclick="showSlides(2)"
                ></button>
                <button
                  class="glide__bullet h-2 w-2 hover:bg-slate-400 focus:bg-slate-400"
                  data-number="3"
                  data-glide-dir="= 3"
                  onclick="showSlides(3)"
                ></button>
                <button
                  class="glide__bullet h-2 w-2 hover:bg-slate-400 focus:bg-slate-400"
                  data-number="4"
                  data-glide-dir="= 4"
                  onclick="showSlides(4)"
                ></button>
                <button
                  class="glide__bullet h-2 w-2 hover:bg-slate-400 focus:bg-slate-400"
                  data-number="5"
                  data-glide-dir="= 5"
                  onclick="showSlides(5)"
                ></button>
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
          new Glide(".glide", config).mount();
        </script>
      </section>

      <section id="report" class="flex h-full flex-col bg-rose-400 p-10">
        <img
          id="megafone"
          src="./assets/cyberpunk/megafone-cyberpunk.svg"
          alt=""
          class="w-1/2 self-center"
        />
        <h3 id="h3-report" class="text-2xl font-bold text-cyan-950">
          Aconteceu algum problema?
        </h3>
        <div class="pb-4 pt-4 text-left">
          <p class="text-slate-50">Seu computador não está ligando?</p>
          <p class="text-slate-50">O projetor não conectou no celular?</p>
          <br />
          <p class="text-slate-50">
            Não se preocupe, informe seu problema abaixo!
          </p>
        </div>

        <a href="html/reportar.html" class="self-start"
          ><button
            id="report_button"
            class="mt-8 rounded-md bg-cyan-950 p-4 text-xl font-bold text-slate-50"
          >
            Reportar
          </button></a
        >
      </section>

      <section class="flex h-full flex-col bg-rose-50 p-10 text-rose-500">
        <img
          id="regras"
          src="./assets/cyberpunk/regras-cyberpunk.svg"
          alt=""
          class="mb-2 w-1/2 self-center"
        />

        <h3 id="h3-regras" class="text-2xl font-bold text-rose-500">
          O que pode ou não pode fazer nos Laboratórios?
        </h3>
        <div class="pb-4 pt-4 text-left">
          <p class="mb-1">Será que posso comer nos laboratórios?</p>
          <p class="mb-1">É permitido escutar música nos laboratórios?</p>
          <p class="mb-1">Informe-se aqui!</p>
        </div>

        <a href="html/regras.html" class="self-start"
          ><button
            id="regras_button"
            class="mt-8 rounded-md bg-cyan-950 p-4 text-xl font-bold text-slate-50"
          >
            Regras
          </button></a
        >
      </section>
    </main>

    <footer id="footer" class="flex justify-between bg-red-300 p-4 text-sm">
      <p>UFC</p>
      <p>Desenvolvido por Techplan©</p>
    </footer>
  </body>
  <script src="src/main.js"></script>
</html>
