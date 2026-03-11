<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">Gestión de Maestros</h2>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-primary shadow-sm">
                <i class="bi bi-person-plus-fill me-1"></i> Agregar Alumnos
            </button>
            <button class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalMaestro">
                <i class="bi bi-person-badge-fill me-1"></i> Agregar Maestros
            </button>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-secondary">
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
                            <td><span class="badge bg-light text-dark border">{{ $maestro->especialidad ?? 'General' }}</span></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-light text-primary"><i class="bi bi-pencil-square"></i></button>
                                <button wire:click="eliminarMaestro({{ $maestro->id }})" class="btn btn-sm btn-light text-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-5 text-muted">No hay maestros registrados aún.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="modalMaestro" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo Maestro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label class="form-label">Nombre Completo</label>
                    <input type="text" wire:model="nombre_maestro" class="form-control" placeholder="Escribe el nombre...">
                    @error('nombre_maestro') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="modal-footer">
                    <button wire:click="guardarMaestro" class="btn btn-success w-100 text-uppercase fw-bold">Registrar Maestro</button>
                </div>
            </div>
        </div>
    </div>
</div>