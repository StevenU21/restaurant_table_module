<script>
    // Edit Modal
    $('.edit-button').on('click', function() {
        var type = $(this).data('type'); // Obtiene el tipo

        // Llena el formulario con los datos del tipo
        $('#editForm' + type.id + ' #name').val(type.name);
        $('#editForm' + type.id + ' #unit_price').val(type.unit_price);
        $('#editForm' + type.id + ' #capacity').val(type.capacity);

        // Cambia la acción del formulario para apuntar a la URL correcta
        $('#editForm' + type.id).attr('action', '/types/' + type.id);

        // Abre el modal
        $('#editTypeModal' + type.id).modal('show');
    });

    // Show Modal
    $('.edit-button').on('click', function() {
        var typeSlug = $(this).data('type').slug;

        $.ajax({
            url: '/types/show/' + typeSlug,
            method: 'GET',
            success: function(response) {
                var type = response.type;

                $('#editForm #name').val(type.name);
                $('#editForm #unit_price').val(type.unit_price);
                $('#editForm #capacity').val(type.capacity);

                $('#editForm').attr('action', '/types/' + type.slug);

                $('#editTypeModal').modal('show');
            }
        });
    });
</script>