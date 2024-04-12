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
<h6 class="heading-small text-muted mb-4">Datos del Cliente</h6>
<div class="pl-lg-4">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="name"><i class="fas fa-graduation-cap"></i> Nombre</label>
                <input type="text" name="name" id="name" class="form-control form-control-alternative"
                    value="{{ old('name', $client->user->name) }}" placeholder="Nombre del Cliente" required>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="phone"><i class="fas fa-graduation-cap"></i> Teléfono</label>
                <input type="phone" name="phone" id="phone" class="form-control form-control-alternative"
                    value="{{ old('phone', $client->phone) }}" placeholder="Teléfono" required>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="form-control-label" for="email"><i class="fas fa-graduation-cap"></i> Correo</label>
        <input type="phone" name="email" id="email" class="form-control form-control-alternative"
            value="{{ old('email', $client->user->email) }}" placeholder="Email">
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
