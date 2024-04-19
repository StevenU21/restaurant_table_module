<h6 class="heading-small text-muted mb-4">Datos de la Asignación</h6>
<div class="pl-lg-4">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="status_id"><i class="fas fa-graduation-cap"></i>
                    Tipo de Asignación</label>

                <select name="assignment_type" id="assignment_type" class="form-control form-control-alternative">
                    <option value="asignar"
                        {{ old('assignment_type', $assignment->assignment_type) == 'asignar' ? 'selected' : '' }}
                        {{-- @selected(true) --}}>
                        Asignar
                    </option>

                    <option value="reservar"
                        {{ old('assignment_type', $assignment->assignment_type) == 'reservar' ? 'selected' : '' }}>
                        Reservar</option>
                </select>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="status_id"><i class="fas fa-graduation-cap"></i>
                    Seleccionar Mesa</label>

                <select name="table_id" id="table_id" class="form-control form-control-alternative">
                    <option value="" selected>Seleccionar Mesa</option>
                    @foreach ($tables as $table)
                        <option value="{{ $table->id }}"
                            {{ old('table_id', $assignment->table_id) == $table->id ? 'selected' : '' }}>
                            {{ $table->table_number . ' ' . $table->type->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="reservation_date"><i class="fas fa-calendar"></i> Fecha de
                    Reserva</label>
                <input type="date" name="reservation_date" id="reservation_date"
                    class="form-control form-control-alternative"
                    value="{{ old('reservation_date', $assignment->reservation_date) }}" placeholder="Fecha de Reserva">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="reservation_time"><i class="fas fa-clock"></i> Hora de
                    Reserva</label>
                <input type="time" name="reservation_time" id="reservation_time"
                    class="form-control form-control-alternative"
                    value="{{ old('reservation_time', $assignment->reservation_time) }}" placeholder="Hora de Reserva">
            </div>
        </div>
    </div>
</div>
<hr class="my-4" />

<!-- Extra -->
<div class="d-flex justify-content-between mb-3">
    <h6 class="heading-small text-muted mb-0">Datos del Cliente</h6>
    <!-- Botón para abrir el modal -->
    <button type="button" class="btn btn-primary" onclick="openCreateUserModal()">Agregar Nuevo Usuario</button>

</div>

<div class="pl-lg-4">
    <div class="form-group">
        <label class="form-control-label" for="client_id"><i class="fas fa-user"></i> Seleccionar
            Usuario</label>
        <select name="client_id" id="existing_clients" class="form-control form-control-alternative">
            @foreach ($clients as $client)
                <option value="{{ $client->id }}">{{ $client->user->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<!-- Modal para agregar nuevo usuario -->
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

<script>
    function openCreateUserModal() {
        $('#createUserModal').modal('show');
    }

    function closeCreateUserModal() {
        $('#createUserModal').modal('hide');
    }

    function submitCreateUserForm() {
        // Obtener la URL del endpoint para crear un nuevo cliente
        var url = "{{ route('clients.store') }}";

        // Obtener los datos del formulario
        var formData = {
            name: $('#name').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            _token: $('input[name="_token"]').val()
        };

        // Enviar la solicitud AJAX
        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            success: function(response) {
                // Almacenar el mensaje de éxito en localStorage
                localStorage.setItem('success', '¡Cliente creado correctamente!');

                // Redirigir a la vista assignments.create
                window.location.href = "{{ route('assignments.create') }}";

                // Cerrar el modal después de guardar el usuario
                closeCreateUserModal();
            },
            error: function(xhr, status, error) {
                // Mostrar SweetAlert con el mensaje de error
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error al crear el usuario. Por favor, inténtalo de nuevo.'
                });
                console.error(xhr.responseText);
            }
        });
    }

    $(document).ready(function() {
        var successMessage = localStorage.getItem('success');

        if (successMessage) {
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: successMessage
            });

            // Eliminar el mensaje de éxito de localStorage
            localStorage.removeItem('success');
        }
    });

    function submitCreateAssingmentForm() {
        // Obtener la URL del endpoint para crear un nuevo cliente
        var url = "{{ route('assignments.store') }}";

        // Obtener los datos del formulario
        var formData = {
            assignment_type: $('#assignment_type').val(),
            table_id: $('#table_id').val(),
            reservation_date: $('#reservation_date').val(),
            reservation_time: $('#reservation_time').val(),
            client_id: $('#existing_clients').val(),
            _token: $('input[name="_token"]').val()
        };

        // Enviar la solicitud AJAX
        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            success: function(response) {
                // Almacenar el mensaje de éxito en localStorage
                localStorage.setItem('success', '¡Asignacion creada correctamente!');

                // Mostrar SweetAlert con el mensaje de éxito
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: '¡Asignacion creada correctamente!'
                }).then((result) => {
                    // Redirigir a la vista assignments.create
                    window.location.href = "{{ route('assignments.index') }}";

                    // Cerrar el modal después de guardar el usuario
                    closeCreateUserModal();

                    // Eliminar el mensaje de éxito de localStorage
                    localStorage.removeItem('success');
                });
            },
            error: function(xhr, status, error) {
                // Mostrar SweetAlert con el mensaje de error
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error al crear el usuario. Por favor, inténtalo de nuevo.'
                });
                console.error(xhr.responseText);
            }
        });
    }
</script>

<hr class="my-4" />
<!-- Description -->
<h6 class="heading-small text-muted mb-4">Guardar</h6>
<div class="pl-lg-4">
    <div class="form-group">
        <button type="button" class="btn btn-primary" onclick="submitCreateAssingmentForm()">
            <i class="fas fa-save"></i> Registrar
        </button>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var assignmentTypeSelect = document.getElementById("assignment_type");
        var reservationDateInput = document.getElementById("reservation_date");
        var reservationTimeInput = document.getElementById("reservation_time");

        function disableDateTimeFields() {
            reservationDateInput.disabled = true;
            reservationTimeInput.disabled = true;
        }

        function enableDateTimeFields() {
            reservationDateInput.disabled = false;
            reservationTimeInput.disabled = false;
        }
        disableDateTimeFields();

        assignmentTypeSelect.addEventListener("change", function() {
            if (this.value === "reservar") {
                enableDateTimeFields();
            } else {
                disableDateTimeFields();
            }
        });
    });
</script>
