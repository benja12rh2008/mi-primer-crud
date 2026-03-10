<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">Gestión de Maestros</h2>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-primary shadow-sm">
                <i class="bi bi-person-plus-fill me-1"></i> Agregar Alumnos
            </button>
            <button class="btn btn-primary shadow-sm">
                <i class="bi bi-person-badge-fill me-1"></i> Agregar Maestros
            </button>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3">Nombre</th>
                        <th class="py-3">Especialidad</th>
                        <th class="py-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($maestros as $maestro)
                        <tr>
                            <td class="ps-4 fw-bold">{{ $maestro->nombre }}</td>
                            <td>{{ $maestro->especialidad ?? 'General' }}</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-light text-primary"><i class="bi bi-pencil-square"></i></button>
                                <button class="btn btn-sm btn-light text-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-5 text-muted">
                                No hay maestros registrados aún.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>