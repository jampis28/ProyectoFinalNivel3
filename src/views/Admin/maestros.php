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
    <main class="h-screen flex ">

        <!---------------Menu Izquierdo------------->

        <div class="w-[20%] bg-[#353a40]">
            <div class=" flex justify-start items-center  border-b-2 border-[#b1acbd] h-[60px]">
                <div class="flex ml-5 justify-center items-center rounded-3xl ">
                    <img class="flex object-cover h-[50px] w-[50px] rounded-3xl" src="/src/assets/logo.jpg" alt="Logo">
                </div>
                <h1 class="ml-5 text-[18px] text-[#b1acbd]">Universidad</h1>
            </div>

            <div class="flex flex-col items-start justify-center h-[90px] border-b-2 border-[#b1acbd]">
                <h2 class="ml-5 text-[20px]  text-[#a9b0b9] font-medium">admin</h2>
                <span class="ml-5 text-[14px]  text-[#a9b0b9] font-medium">Administrador</span>
            </div>
            <div class="flex flex-col justify-center items-start gap-4">
                <div class="mt-4">
                    <p class="ml-11 text-[12px] text-[#a9b0b9] font-medium">MENU ADMINISTRACION</p>
                </div>
                <div>
                    <a class="flex ml-5 justify-center items-center" href="/permisos">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <style>
                                svg {
                                    fill: #c8cacf
                                }
                            </style>
                            <path d="M224 0a128 128 0 1 1 0 256A128 128 0 1 1 224 0zM178.3 304h91.4c11.8 0 23.4 1.2 34.5 3.3c-2.1 18.5 7.4 35.6 21.8 44.8c-16.6 10.6-26.7 31.6-20 53.3c4 12.9 9.4 25.5 16.4 37.6s15.2 23.1 24.4 33c15.7 16.9 39.6 18.4 57.2 8.7v.9c0 9.2 2.7 18.5 7.9 26.3H29.7C13.3 512 0 498.7 0 482.3C0 383.8 79.8 304 178.3 304zM436 218.2c0-7 4.5-13.3 11.3-14.8c10.5-2.4 21.5-3.7 32.7-3.7s22.2 1.3 32.7 3.7c6.8 1.5 11.3 7.8 11.3 14.8v30.6c7.9 3.4 15.4 7.7 22.3 12.8l24.9-14.3c6.1-3.5 13.7-2.7 18.5 2.4c7.6 8.1 14.3 17.2 20.1 27.2s10.3 20.4 13.5 31c2.1 6.7-1.1 13.7-7.2 17.2l-25 14.4c.4 4 .7 8.1 .7 12.3s-.2 8.2-.7 12.3l25 14.4c6.1 3.5 9.2 10.5 7.2 17.2c-3.3 10.6-7.8 21-13.5 31s-12.5 19.1-20.1 27.2c-4.8 5.1-12.5 5.9-18.5 2.4l-24.9-14.3c-6.9 5.1-14.3 9.4-22.3 12.8l0 30.6c0 7-4.5 13.3-11.3 14.8c-10.5 2.4-21.5 3.7-32.7 3.7s-22.2-1.3-32.7-3.7c-6.8-1.5-11.3-7.8-11.3-14.8V454.8c-8-3.4-15.6-7.7-22.5-12.9l-24.7 14.3c-6.1 3.5-13.7 2.7-18.5-2.4c-7.6-8.1-14.3-17.2-20.1-27.2s-10.3-20.4-13.5-31c-2.1-6.7 1.1-13.7 7.2-17.2l24.8-14.3c-.4-4.1-.7-8.2-.7-12.4s.2-8.3 .7-12.4L343.8 325c-6.1-3.5-9.2-10.5-7.2-17.2c3.3-10.6 7.7-21 13.5-31s12.5-19.1 20.1-27.2c4.8-5.1 12.4-5.9 18.5-2.4l24.8 14.3c6.9-5.1 14.5-9.4 22.5-12.9V218.2zm92.1 133.5a48.1 48.1 0 1 0 -96.1 0 48.1 48.1 0 1 0 96.1 0z" />
                        </svg>
                        <p class="ml-3 text-[#a9b0b9] font-medium">Permisos</p>
                    </a>
                </div>
                <div>
                    <a class="flex ml-5 justify-center items-center" href="/maestros">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <style>
                                svg {
                                    fill: #c8cacf
                                }
                            </style>
                            <path d="M160 64c0-35.3 28.7-64 64-64H576c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H336.8c-11.8-25.5-29.9-47.5-52.4-64H384V320c0-17.7 14.3-32 32-32h64c17.7 0 32 14.3 32 32v32h64V64L224 64v49.1C205.2 102.2 183.3 96 160 96V64zm0 64a96 96 0 1 1 0 192 96 96 0 1 1 0-192zM133.3 352h53.3C260.3 352 320 411.7 320 485.3c0 14.7-11.9 26.7-26.7 26.7H26.7C11.9 512 0 500.1 0 485.3C0 411.7 59.7 352 133.3 352z" />
                        </svg>
                        <p class="ml-3 text-[#a9b0b9] font-medium">Maestros</p>
                    </a>
                </div>
                <div>
                    <a class="flex ml-5 justify-center items-center" href="/alumnos">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <style>
                                svg {
                                    fill: #c8cacf
                                }
                            </style>
                            <path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z" />
                        </svg>
                        <p class="ml-3 text-[#a9b0b9] font-medium">Alumnos</p>
                    </a>
                </div>
                <div>
                    <a class="flex ml-5 justify-center items-center" href="/clases">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <style>
                                svg {
                                    fill: #c8cacf
                                }
                            </style>
                            <path d="M96 32C60.7 32 32 60.7 32 96V384H96V96l384 0V384h64V96c0-35.3-28.7-64-64-64H96zM224 384v32H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H544c17.7 0 32-14.3 32-32s-14.3-32-32-32H416V384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32z" />
                        </svg>
                        <p class="ml-3 text-[#a9b0b9] font-medium">Clases</p>
                    </a>
                </div>
            </div>
        </div>

        <!---------------Parte Derecha------------->

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
                                    Administrador
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
                                        Dashboard
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

                    <!---------------Script Barra Nav------------->

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
                    <p class="text-[30px]">Lista de Maestros</p>
                    <p>Home/Maestros</p>
                </div>
                <div class="w-[1150px] h-[50px] flex justify-between items-center border-2 border-[#a9b0b9] p-2 text-[12px] bg-white ml-6">
                    <p>Informacion de Maestro</p>
                    <button id="open-modalmaestro" class="bg-blue-500 text-white px-4 py-2 rounded-lg mr-8">Agregar Maestro</button>
                </div>
            </div>

            <!------------------------------------ MODAL Crear Maestro-------------------------->

            <div class="bg-gray-100  flex items-center justify-center">

                <!-- Modal oculto -->

                <div id="modalmaestro" class="fixed inset-0 z-50 flex items-center justify-center hidden">
                    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

                    <div class="modal-container bg-white w-[400px] h-[600px] md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                        <!-- Contenido del modal -->
                        <div class="modal-content py-4 text-left ">
                            <div class="flex justify-between items-center pb-3 mb-3  border-b border-[#a9b0b9]">
                                <p class="text-2xl font-bold mx-4">Agregar Maestro</p>
                            </div>
                            <form class="flex flex-col gap-2" action="/maestro" method="post">
                                <div class="flex flex-col justify-center items-start pl-4 mb-2">
                                    <label for="">Clase Asignada</label>
                                    <select type="text" id="input-group-1" class=" mb-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 flex w-[370px] h-[10px] pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="clase_id">
                                        <?php
                                        foreach ($clases as $clase) {
                                        ?>
                                            <option class="w-[370px] rounded-md flex mb-2" value="<?= $clase["id"] ?>"><?= $clase["nombre"] ?></option>
                                        <?php
                                        };
                                        ?>
                                </div>
                                <div class="flex flex-col justify-center items-start pl-4">
                                    <label for="">Correo Electronico</label>
                                    <input type="text" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[370px] h-[32px] pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingresa email" name="email">
                                </div>
                                <div class="flex flex-col justify-center items-start pl-4">
                                    <label for="">Contraseña</label>
                                    <input type="password" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[370px] h-[32px] pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingresa Password" name="contrasena">
                                </div>

                                <div class="flex flex-col justify-center items-start pl-4">
                                    <label for="">Nombre(s)</label>
                                    <input type="text" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[370px] h-[32px] pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingresa nombre(s)" name="nombres">
                                </div>
                                <div class="flex flex-col justify-center items-start pl-4">
                                    <label for="">Apellido(s)</label>
                                    <input type="text" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[370px] h-[32px] pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingresa apellido(s)" name="apellidos">
                                </div>
                                <div class="flex flex-col justify-center items-start pl-4">
                                    <label for="">Dirección</label>
                                    <input type="text" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[370px] h-[32px] pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingresa direccion" name="direccion">
                                </div>
                                <div class="flex flex-col justify-center items-start pl-4">
                                    <label for="">Fecha de nacimiento</label>
                                    <input type="date" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[370px] h-[32px] pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="nacimiento">
                                    <input type="hidden" name="rol_id" value="2">
                                </div>

                                <div class="flex justify-end items-center pl-4 mt-[8px]">
                                    <button type="submit" class="w-[150px] text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">Guardar Cambios</button>
                                </div>
                            </form>
                            <div class="absolute top-[539px] ml-6">
                                <button id="close-modalmaestro" class="w-[150px] text-white bg-gradient-to-r from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-300 dark:focus:ring-gray-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 close-modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                const openModalButton = document.getElementById("open-modalmaestro");
                const modal = document.getElementById("modalmaestro");
                const closeModalButton = document.getElementById("close-modalmaestro");

                openModalButton.addEventListener("click", () => {
                    modal.classList.remove("hidden");
                });
                closeModalButton.addEventListener("click", () => {
                    modal.classList.add("hidden");
                });
            </script>


            <div class="ml-6">
                <table class="table-fixed selection:border-collapse border border-slate-400 w-[1100px] text-[12px]">

                    <th class="border border-slate-300 text-center w-11">#</th>
                    <th class="border border-slate-300 text-center">NOMBRE</th>
                    <th class="border border-slate-300 text-center">APELLIDO</th>
                    <th class="border border-slate-300 text-center">CORREO</th>
                    <th class="border border-slate-300 text-center">DIRECCION</th>
                    <th class="border border-slate-300 text-center w-[120px]">FECHA DE NACIMIENTO</th>
                    <th class="border border-slate-300 text-center">CLASE ASIGNADA</th>
                    <th class="border border-slate-300 text-center w-[90px]">ACCIONES</th>
                    <tbody>
                        <?php
                        foreach ($data as $alumnos) {
                        ?>
                            <!-- Use a white background for odd rows, and slate-50 for even rows -->
                            <tr class="odd:bg-white even:bg-slate-50 ">
                                <td class="border border-slate-300 text-center"><?= $alumnos["maestro_id"] ?></td>
                                <td class="border border-slate-300 text-center"><?= $alumnos["nombres"] ?></td>
                                <td class="border border-slate-300 text-center"><?= $alumnos["apellidos"] ?></td>
                                <td class="border border-slate-300 text-center"><?= $alumnos["email"] ?></td>
                                <td class="border border-slate-300 text-center"><?= $alumnos["direccion"] ?></td>
                                <td class="border border-slate-300 text-center w-[30px]"><?= $alumnos["nacimiento"] ?></td>
                                <td class="border border-slate-300 text-center"><?= $alumnos["nombre_clase"] ?></td>

                            <td class="border border-slate-300 text-center flex w-[90px] h-[70px] items-center">
                                <a class="w-[20px] ml-3 mr-3" href="/maestroedit?id=<?= $alumnos["maestro_id"] ?>">
                                    <svg class="fill-[#4896a2] w-[20px]" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                    </svg>
                                </a>
                                <form action="/deletemaestro" method="post">
                                    <button type="submit" name="maestro_id" value="<?= $alumnos["maestro_id"] ?>">
                                        <svg class="fill-[#da1616]" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    </main>
</body>

</html>