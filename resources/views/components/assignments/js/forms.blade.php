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

        // Almacenar los datos del formulario de asignación en el almacenamiento local
        localStorage.setItem('assignmentType', $('#assignment_type').val());
        localStorage.setItem('tableId', $('#table_id').val());
        localStorage.setItem('reservationDate', $('#reservation_date').val());
        localStorage.setItem('reservationTime', $('#reservation_time').val());

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

        // Si hay datos del formulario de asignación en el almacenamiento local, llenar el formulario con estos datos
        if (localStorage.getItem('assignmentType')) {
            $('#assignment_type').val(localStorage.getItem('assignmentType'));
        }
        if (localStorage.getItem('tableId')) {
            $('#table_id').val(localStorage.getItem('tableId'));
        }
        if (localStorage.getItem('reservationDate')) {
            $('#reservation_date').val(localStorage.getItem('reservationDate'));
        }
        if (localStorage.getItem('reservationTime')) {
            $('#reservation_time').val(localStorage.getItem('reservationTime'));
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

                    // Eliminar los datos del formulario de asignación de localStorage
                    localStorage.removeItem('assignmentType');
                    localStorage.removeItem('tableId');
                    localStorage.removeItem('reservationDate');
                    localStorage.removeItem('reservationTime');
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