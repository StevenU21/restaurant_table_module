<h6 class="heading-small text-muted mb-4">Datos de la Mesa</h6>
<div class="pl-lg-4">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="name">Nombre</label>
                <input type="text" id="name" name="name" class="form-control form-control-alternative"
                    placeholder="Nombre" value="{{ old('name', $type->name) }}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="name">Precio</label>
                <input type="number" id="unit_price" name="unit_price" class="form-control form-control-alternative"
                    placeholder="Precio" value="{{ old('unit_price', $type->unit_price) }}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="name">Capacidad</label>
                <input type="number" id="capactity" name="capacity" class="form-control form-control-alternative"
                    placeholder="Capacidad" value="{{ old('capacity', $type->capacity) }}">
            </div>
        </div>
    </div>
</div>
<hr class="my-4" />
<!-- Description -->
<h6 class="heading-small text-muted mb-4">Guardar</h6>
<div class="pl-lg-4">
    <div class="form-group">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fas fa-times"></i> Cancelar
        </button>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Registrar
        </button>
    </div>
</div>
