<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Panel de control de VLAN</h3>
        <button class="btn btn-primary">+ NUEVA VLAN</button>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID DE VLAN</th>
                    <th>DESCRIPCIÓN</th>
                    <th>SERVICIO OLT</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vlans as $vlan)
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">No hay datos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>