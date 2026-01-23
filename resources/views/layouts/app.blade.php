<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Proyecto - Agenda</title>
    @livewireStyles
    <style>
    body { 
        font-family: 'Tahoma', sans-serif; 
        background-color: #546b8d; 
        padding: 20px; 
    }
    .contenedor { 
        background: #ffffff;
        padding: 20px; 
        border-radius: 8px; 
        box-shadow: 0 2px 4px rgba(0,0,0,0.1); 
        max-width: 1000px; 
        margin: auto; 
    }
    input, button, table {
        font-family: 'Tahoma', sans-serif;
    }
    </style>
</head>
<body>
    <div class="contenedor">
        {{ $slot }}
    </div>

    @livewireScripts
</body>
</html>