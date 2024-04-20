<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="createUserModalLabel">Agregar Nuevo Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para crear un nuevo usuario -->
                <form id="createUserForm" method="POST">
                    @csrf
                    <h6 class="heading-small text-muted mb-4">Datos del Cliente</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="name">Nombre</label>
                                    <input type="text" id="name" name="name"
                                        class="form-control form-control-alternative" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="email"><i
                                            class="fas fa-graduation-cap"></i> Correo</label>
                                    <input type="email" id="email" name="email" placeholder="Correo"
                                        class="form-control form-control-alternative">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="phone"><i
                                            class="fas fa-graduation-cap"></i> Teléfono</label>
                                    <input type="phone" id="phone" name="phone" placeholder="Teléfono"
                                        class="form-control form-control-alternative">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <!-- Description -->
                    <h6 class="heading-small text-muted mb-4">Guardar</h6>
                    <div class="pl-lg-4">
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary"
                                onclick="closeCreateUserModal()">Cerrar</button>
                            <button type="button" class="btn btn-primary"
                                onclick="submitCreateUserForm()">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>