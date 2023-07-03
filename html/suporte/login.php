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

<body class="font-montserrat bg-slate-800 flex flex-col justify-center items-center h-screen">
    <main class="bg-white w-3/5 h-2/3 flex flex-row rounded-xl border-none">
        <section class="flex flex-col items-center p-8 w-1/2">
            <h2 class="text-3xl font-bold m-10 mt-4">Faça seu login</h2>

            <form action="" class="flex flex-col gap-4 w-full">
                <div class="flex flex-col">
                    <label for="usuario">Usuário</label>
                    <input type="text" id="usuario" name="usuario" class="bg-slate-200 rounded-md h-12 p-4" placeholder="Digite seu usuário">

                </div>
                <div class="flex flex-col">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" class="bg-slate-200 rounded-md h-12 p-4" placeholder="Digite sua senha">
                </div>
                <input type="submit" value="Entrar" class="self-center bg-rose-600 hover:bg-rose-800 cursor-pointer text-xl text-white font-semibold w-1/3 rounded-md p-2 mb-4">
            </form>

            <a href="" class="underline text-slate-500 hover:text-slate-800">Esqueceu sua senha?</a>
        </section>

        <section class="flex items-center w-1/2 overflow-hidden">
            <img src="../../assets/suporte/login.png" class="w-full" alt="">
        </section>
    </main>
</body>

</html>