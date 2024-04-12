<div class="card-body">
    <h6 class="heading-small text-muted mb-4">Información del Tipo</h6>
    <div class="pl-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="table_number"><i class="fas fa-signature"></i>
                        Nombre</label>
                    <p>{{ $type->name }}</p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="table_number"><i class="fas fa-signature"></i>
                        Capacidad</label>
                    <p>{{ $type->capacity }}</p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="table_number"><i class="fas fa-signature"></i>
                        Precio Unitatio</label>
                    <p>{{ $type->unit_price }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">
        <i class="fas fa-times"></i> Cerrar</button>
</div>
