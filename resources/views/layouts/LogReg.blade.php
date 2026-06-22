<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="min-w-screen min-h-screen flex justify-center items-center bg-blue-500">

        <div class="bg-slate-100 flex flex-col justify-center items-center">
            
            @yield('conteudo')



        </div>




    </div>


    



    @stack('scripts')



</body>
</html>