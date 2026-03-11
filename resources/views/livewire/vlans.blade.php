<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Panel de control de VLAN</h3>
        <button class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalVlan">
            <i class="bi bi-plus-circle me-1"></i> + NUEVA VLAN
        </button>
    </div>

    <div class="table-responsive shadow-sm bg-white rounded-3">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">ID DE VLAN</th>
                    <th>DESCRIPCIÓN</th>
                    <th>SERVICIO OLT</th>
                    <th class="text-center">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vlans as $vlan)
                    <tr>
                        <td class="ps-4 fw-bold text-primary">{{ $vlan->vlan_id }}</td>
                        <td>{{ $vlan->descripcion }}</td>
                        <td><span class="badge bg-info text-dark">{{ $vlan->olt }}</span></td>
                        <td class="text-center">
                            <button wire:click="editar({{ $vlan->id }})" class="btn btn-sm btn-light text-primary" data-bs-toggle="modal" data-bs-target="#modalVlan">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button wire:click="eliminar({{ $vlan->id }})" wire:confirm="¿Deseas eliminar esta VLAN?" class="btn btn-sm btn-light text-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-5">No hay datos registrados aún.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div wire:ignore.self class="modal fade" id="modalVlan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Configuración de VLAN</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">ID de VLAN</label>
                        <input type="text" wire:model="vlan_id" class="form-control" placeholder="Ej: 100">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Descripción de Red</label>
                        <input type="text" wire:model="descripcion" class="form-control" placeholder="Nombre de la red">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Servicio OLT</label>
                        <input type="text" wire:model="olt" class="form-control" placeholder="Ej: OLT-Central-01">
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button wire:click="guardar" class="btn btn-primary w-100 py-2 fw-bold">GUARDAR CAMBIOS</button>
                </div>
            </div>
        </div>
    </div>
</div>