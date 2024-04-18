<h6 class="heading-small text-muted mb-4">Datos del Cliente</h6>
<div class="pl-lg-4">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="name">Nombre</label>
                <input type="text" id="name" name="name" class="form-control form-control-alternative"
                    placeholder="Nombre" value="{{ old('name', $client->user->name) }}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="email"><i class="fas fa-graduation-cap"></i>
                    Correo</label>
                <input type="email" id="email" name="email" value="{{ old('email', $client->user->email) }}"
                    placeholder="Correo" class="form-control form-control-alternative">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="phone"><i class="fas fa-graduation-cap"></i>
                    Teléfono</label>
                <input type="phone" id="phone" name="phone" value="{{ old('phone', $client->phone) }}"
                    placeholder="Teléfono" class="form-control form-control-alternative">
            </div>
        </div>
    </div>
</div>
<hr class="my-4" />
<!-- Description -->
<h6 class="heading-small text-muted mb-4">Guardar</h6>
<div class="pl-lg-4">
    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Registrar
        </button>
    </div>
</div>
