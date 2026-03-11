<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Empresa S.A.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    @livewireStyles
    <style>
        body {
            background-color: #f8f9fa;
        }
        /* Estructura de la Barra Lateral (Sidebar) */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed; /* Esto la mantiene fija a la izquierda */
            left: 0;
            top: 0;
            background-color: #1a1a1a; /* El color negro del ejemplo */
            z-index: 1000;
            padding-top: 20px;
        }
        /* Ajuste del contenido principal para que no se oculte tras la barra */
        .main-content {
            margin-left: 260px; /* Debe ser igual al ancho de la barra */
            padding: 30px;
            width: calc(100% - 260px);
        }
        /* Estilos de los enlaces del menú */
        .nav-link {
            color: #bdc3c7;
            padding: 15px 25px;
            display: flex;
            align-items: center;
            transition: all 0.3s;
        }
        .nav-link:hover {
            background-color: #2c3e50;
            color: #ffffff;
        }
        .nav-link.active {
            background-color: #34495e;
            color: #ffffff;
            border-left: 4px solid #3498db;
        }
        .sidebar-brand {
            color: white;
            text-align: center;
            padding: 20px;
            font-weight: bold;
            border-bottom: 1px solid #2c3e50;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="sidebar shadow">
        <div class="sidebar-brand">
            <i class="bi bi-cpu fs-3"></i>
            <div class="mt-2">Mi Empresa S.A.</div>
        </div>
        
        <nav class="nav flex-column">
            <a class="nav-link {{ request()->routeIs('vlans') ? 'active' : '' }}" href="{{ route('vlans') }}">
                <i class="bi bi-diagram-3 me-3"></i> Gestión VLAN
            </a>
            <a class="nav-link {{ request()->routeIs('maestros') ? 'active' : '' }}" href="{{ route('maestros') }}">
                <i class="bi bi-people me-3"></i> Maestros y Alumnos
            </a>
            <a class="nav-link" href="#">
                <i class="bi bi-gear me-3"></i> Configuración
            </a>
        </nav>

        <div class="position-absolute bottom-0 w-100 p-3">
            <button class="btn btn-outline-light btn-sm w-100">
                <i class="bi bi-box-arrow-left me-2"></i> Cerrar Sesión
            </button>
        </div>
    </div>

    <main class="main-content">
        {{ $slot }}
    </main>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Escuchadores para cerrar modales automáticamente
        window.addEventListener('close-modal', event => {
            const modal = bootstrap.Modal.getInstance(document.querySelector('.modal.show'));
            if (modal) modal.hide();
        });
    </script>
</body>
</html>
