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

        <main class="flex flex-col p-4 gap-8 w-full h-full">
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
                <h3 class="font-semibold text-xl p-4">
                    Laboratório 2
                </h3>
                <article class="flex flex-row gap-4">
                    <div class="cursor-pointer bg-slate-50 rounded-xl w-1/5 flex flex-col shadow-xl" onclick="concluiTarefa()">
                        <div class="p-4">
                            <p class="w-full">Mesa:</p>
                            <span>123</span>
                        </div>
                        <div class="p-4 pt-0">
                            <p class="w-full">Detalhes:</p>
                            <span>Teclado quebrado</span>
                        </div>

                        <div id="tarefa" class="bg-slate-500 font-semibold text-white rounded-b-xl pl-4 pt-2 pb-2">
                            <p id="status">Pendente</p>
                        </div>
                    </div>

                    <div class="cursor-pointer bg-slate-50 rounded-xl w-1/5 flex flex-col shadow-xl" onclick="concluiTarefa()">
                        <div class="p-4">
                            <p class="w-full">Mesa:</p>
                            <span>123</span>
                        </div>
                        <div class="p-4 pt-0">
                            <p class="w-full">Detalhes:</p>
                            <span>Teclado quebrado</span>
                        </div>

                        <div id="tarefa" class="bg-slate-500 font-semibold text-white rounded-b-xl pl-4 pt-2 pb-2">
                            <p id="status">Pendente</p>
                        </div>
                    </div>
                </article>

            </section>
        </main>
    </section>

    <footer class="bg-slate-500 flex flex-row justify-self-end">
        <p>oi</p>
    </footer>

    <script src="../../src/suporte_reportes.js"></script>
</body>

</html>