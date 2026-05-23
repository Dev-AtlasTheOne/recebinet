<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class="fixed top-0 left-0 right-0 z-50 bg-white shadow">
        <div class="max-w-6xl mx-auto p-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-500">Recebinet</h1>
            <nav class="hidden md:flex gap-6 ">
                <a href="" class="hover:text-blue-500 transition">Inicio</a>
                <a href="" class="hover:text-blue-500 transition">Workstation</a>
                <a href="" class="hover:text-blue-500 transition">Usuário</a>
            </nav>
            <button class="md:hidden p-2" onclick="togglePhoneMenu()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                  </svg>
            </button>
        </div>
        <div id="phone-menu" class="w-full flex flex-col gap-4 bg-white shadow-lg p-4 absolute hidden">
            <a href="" class="mr-auto ml-2 text-lg py-2 rounded">Inicio</a>
            <a href="" class="mr-auto ml-2 text-lg py-2 rounded">Workstation</a>
            <a href="" class="mr-auto ml-2 text-lg  py-2 rounded">Usuário</a>
        </div>







    </header>


    @yield('conteudo')



    @stack('scripts')



</body>
</html>