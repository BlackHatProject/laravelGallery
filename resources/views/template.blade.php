<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>Document</title>
</head>
<body>

  <header class="bg-purple-600 w-full py-2 px-4 flex items-center">
    <h1 class="text-4xl text-white mr-4">Galeria</h1>
    <nav>
        <a class="text-white m-2" href="{{ url('galeria') }}">Inicio</a>
        <a class="text-white m-2" href="{{ url('galeria/create/') }}">Crear</a>
    </nav>
  </header>

  <div class="container mx-auto">
    @yield('contenido')
  </div>
  
</body>
</html>

