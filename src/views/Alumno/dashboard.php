<?php
if (!isset($_SESSION["user"])) {
    header("Location: /index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <main class="h-screen flex  ">
        <div class="bg-[#353a40] w-[20%]">
            <div class=" flex justify-start items-center  border-b-2 border-[#b1acbd] h-[60px]">
                <div class="flex ml-5 justify-center items-center rounded-3xl ">
                    <img class="flex object-cover h-[50px] w-[50px] rounded-3xl" src="/src/assets/logo.jpg" alt="Logo">
                </div>
                <h1 class="ml-5 text-[18px] text-[#b1acbd]">Universidad</h1>
            </div>

            <div class="flex flex-col items-start justify-center h-[90px] border-b-2 border-[#b1acbd]">
                <h2 class="ml-5 text-[20px]  text-[#a9b0b9] font-medium"><?=$_SESSION["user"]["nombre"]?></h2>
                <span class="ml-5 text-[14px]  text-[#a9b0b9] font-medium"><?=$_SESSION["user"]["nombres"]?> <?=$_SESSION["user"]["apellidos"]?></span>
            </div>
            <div class="flex flex-col justify-center items-start gap-4">
                <div class="mt-4">
                    <p class="ml-11 text-[12px] text-[#a9b0b9] font-medium">MENU ADMINISTRACION</p>
                </div>
                <div>
                    <a class="flex ml-5 justify-center items-center" href="/calificaciones">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <style>
                                svg {
                                    fill: #c8cacf
                                }
                            </style>
                            <path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z" />
                        </svg>
                        <p class="ml-3 text-[#a9b0b9] font-medium">Ver Calificaciones</p>
                    </a>
                </div>
                <div>
                    <a class="flex ml-5 justify-center items-center" href="/clases">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <style>
                                svg {
                                    fill: #c8cacf
                                }
                            </style>
                            <path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z" />
                        </svg>
                        <p class="ml-3 text-[#a9b0b9] font-medium">Administra tus Clases</p>
                    </a>
                </div>
            </div>
        </div>


        <div class="bg-[#f5f6fa] w-[85%]">

            <nav class="bg-[#ffffff] border-2 border-[#a9b0b9]">
                <div class="mx-auto w-[1150px] h-[60px] px-2 sm:px-6 lg:px-8">
                    <div class="relative flex h-[60px] items-center justify-between">
                        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                            <div class="flex flex-shrink-0 items-center text-[#a9b0b9]">
                                <h1>Home</h1>
                            </div>
                        </div>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                            <!-- Profile dropdown -->
                            <div class="">
                                <!-- Navigation Menu Button -->
                                <button id="menu-button" class="p-2 text-[#a9b0b9]">
                                <?=$_SESSION["user"]["nombres"]?> <?=$_SESSION["user"]["apellidos"]?>
                                </button>
                                <!-- Hidden Menu -->
                                <div id="hidden-menu" class="hidden bg-white absolute right-1 top-14 mt-2 w-35 rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                                    <a href="#" class="flex justify-start items-center px-4 py-2 text-sm text-gray-700">
                                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <style>
                                                svg {
                                                    fill: #c8cacf
                                                }
                                            </style>
                                            <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm80 256h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zm256-32H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                        </svg>
                                        Perfil
                                    </a>
                                    <a href="/log_out" class="px-4 py-2 text-sm text-red-700 flex justify-start items-center">
                                        <svg id="log out" class="mr-3 fill-[#cd270a]" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->

                                            <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                                        </svg>
                                        Log_Out
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        const menuButton = document.getElementById("menu-button");
                        const hiddenMenu = document.getElementById("hidden-menu");

                        menuButton.addEventListener("click", function() {
                            if (hiddenMenu.style.display === "block") {
                                hiddenMenu.style.display = "none";
                            } else {
                                hiddenMenu.style.display = "block";
                            }
                        });
                    </script>
                </div>
            </nav>

            <div>
                <div class="w-[1150px] flex justify-between items-center text-center pl-4 pr-4 mb-7">
                    <p class="text-[30px]">Dashboard</p>
                    <p>Home/Dashboard</p>
                </div>
                <div class="w-[600px] h-[70px] flex flex-col justify-center items-start border-2 border-[#a9b0b9] p-2 text-[12px] bg-white ml-6">
                    <p>Bienvenido</p>
                    <p>Selecciona la acción que quieras ralizar en las pestañas del menu de la izquierda</p>
                </div>
            </div>
        </div>

    </main>
</body>

</html>