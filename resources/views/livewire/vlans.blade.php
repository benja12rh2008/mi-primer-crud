<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 bg-white p-3 shadow-sm rounded">
        <div>
            <h5 class="mb-0 fw-bold text-dark"><i class="fas fa-network-wired me-2 text-primary"></i>Panel de Control VLAN</h5>
            <small class="text-muted">Gestión de redes y conectividad</small>
        </div>
        <button type="button" class="btn btn-primary shadow-sm px-4 fw-bold" data-bs-toggle="modal" data-bs-target="#modalNuevaVlan">
            <i class="fas fa-plus me-2"></i>NUEVA VLAN
        </button>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card shadow-sm mb-4 border-0">
    <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-bold text-secondary text-uppercase small">
            <i class="fas fa-users me-2"></i>Usuarios en el Sistema
        </h6>
        <button class="btn btn-outline-primary btn-sm py-0 rounded-pill" data-bs-toggle="modal" data-bs-target="#modalNuevoMaestro">
            <i class="fas fa-plus"></i>
        </button>
    </div>
    <div class="card-body">
        <div class="d-flex flex-wrap justify-content-center gap-4 text-center">
            
            @forelse($maestros as $maestro)
                <div class="user-item position-relative">
                    <button wire:click="eliminarMaestro({{ $maestro->id }})" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border-0" style="font-size: 0.5rem; cursor: pointer;">x</button>
                    
                    <div class="avatar bg-success text-white mb-2 shadow-sm">
                        {{ substr($maestro->nombre, 0, 2) }} </div>
                    <h6 class="small fw-bold mb-0 text-truncate">{{ $maestro->nombre }}</h6>
                    <small class="text-muted" style="font-size: 0.65rem;">{{ $maestro->created_at->diffForHumans() }}</small>
                </div>
            @empty
                <small class="text-muted">No hay usuarios registrados.</small>
            @endforelse

        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="modalNuevoMaestro" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered"> <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white">
                <h6 class="modal-title fw-bold"><i class="fas fa-user-plus me-2"></i>Nuevo Usuario</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="guardarMaestro">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Nombre Completo</label>
                        <input type="text" wire:model="nombre_maestro" class="form-control form-control-sm" placeholder="Ej: Juan Pérez" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark btn-sm fw-bold" data-bs-dismiss="modal">
                            Guardar Usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-header bg-primary text-white py-3">
                    <h6 class="mb-0 fw-bold"><i class="fas fa-list-ul me-2"></i>Registros de VLANs Activas</h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr class="small text-uppercase text-secondary">
                                <th class="ps-4">ID VLAN</th>
                                <th>Descripción de Red</th>
                                <th>Servicio OLT</th>
                                <th class="text-end pe-4">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="small">
                            @forelse($vlans as $v)
                            <tr class="align-middle">
                                <td class="ps-4 fw-bold text-primary">{{ $v->vlan_id ?? 'N/A' }}</td>
                                <td>{{ $v->descripcion ?? 'Sin descripción' }}</td>
                                <td><span class="badge bg-light text-dark border">{{ $v->olt ?? 'S/O' }}</span></td>
                                <td class="text-end pe-4">
                                    <button wire:click="editar({{ $v->id }})" class="btn btn-sm btn-light border" data-bs-toggle="modal" data-bs-target="#modalNuevaVlan">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button wire:click="eliminar({{ $v->id }})" class="btn btn-sm btn-light border text-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center py-5">No hay datos registrados.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="modalNuevaVlan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title fw-bold"><i class="fas fa-save me-2"></i>Configurar VLAN</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light">
                    <form wire:submit.prevent="guardar">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">SISTEMA OLT</label>
                            <select wire:model="olt" class="form-select border-0 shadow-sm" required>
                                <option value="">Seleccionar OLT...</option>
                                <option value="OLT 1">OLT 1</option>
                                <option value="OLT 2">OLT 2</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">IDENTIFICACIÓN DE RED (ID)</label>
                            <input type="text" wire:model="vlan_id" class="form-control border-0 shadow-sm" placeholder="Ej: 100" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">ETIQUETA / DESCRIPCIÓN</label>
                            <input type="text" wire:model="descripcion" class="form-control border-0 shadow-sm" placeholder="Nombre del servicio..." required>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary py-2 fw-bold" data-bs-dismiss="modal">
                                <i class="fas fa-check-circle me-1"></i> GUARDAR CAMBIOS
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .avatar { width: 45px; height: 45px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-weight: bold; margin: 0 auto; }
        .user-item { width: 95px; }
        .modal-content { border-radius: 15px; overflow: hidden; }
    </style>
</div>