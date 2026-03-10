<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de VLAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    @livewireStyles
    <style>
        body { 
            font-family: 'Tahoma', sans-serif; 
            background-color: #f4f7f6; /* Un gris más claro para resaltar el panel */
        }
        .sidebar {
            min-height: 100vh;
            background: #ffffff;
            border-right: 1px solid #dee2e6;
            padding-top: 20px;
        }
        .nav-link {
            color: #333;
            padding: 12px 20px;
            border-radius: 5px;
            margin: 5px 10px;
        }
        .nav-link:hover {
            background-color: #e9ecef;
        }
        .nav-link.active {
            background-color: #0d6efd;
            color: white !important;
        }
        .main-content {
            padding: 30px;
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block sidebar shadow-sm">
                <div class="px-3 mb-4">
                    <h5 class="fw-bold text-primary">TecNet</h5>
                </div>
                
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('vlans') ? 'active' : '' }}" href="{{ route('vlans') }}">
                            <i class="bi bi-diagram-3 me-2"></i> Vlan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('maestros') ? 'active' : '' }}" href="{{ route('maestros') }}">
                            <i class="bi bi-person-workspace me-2"></i> Tabla de Maestros
                        </a>
                    </li>
                </ul>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 main-content">
                <div class="bg-white p-4 rounded-3 shadow-sm">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>