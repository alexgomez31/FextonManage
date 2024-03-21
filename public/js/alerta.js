$(document).ready(function() {
    $('.delete-product').click(function() {
        var id = $(this).data('id');
        var tipoproducto = $(this).data('tipoproducto');
        var referencia = $(this).data('referencia');

        Swal.fire({
            title: "¿Estás seguro?",
            html: "Estás a punto de eliminar el producto: <strong>" + tipoproducto + "</strong>, referencia: <strong>" + referencia + "</strong>.<br>¡No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminarlo"
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma la eliminación, enviar la solicitud de eliminación
                $.ajax({
                    url: '/productos/' + id,
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function(data) {
                        // Si la eliminación es exitosa, mostrar una alerta de éxito
                        Swal.fire({
                            title: "¡Eliminado!",
                            text: "El producto ha sido eliminado.",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        });

                        // Actualizar la tabla de productos
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Si hay un error al eliminar, mostrar una alerta de error
                        Swal.fire({
                            title: "¡Error!",
                            text: "Hubo un error al eliminar el producto.",
                            icon: "error",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }
        });
    });
});

$(document).ready(function() {
    $('.delete-empleado').click(function() {
        var id = $(this).data('id');
        var names = $(this).data('names');
        var documento = $(this).data('documento');
        // Agrega más variables según sea necesario

        Swal.fire({
            title: "¿Estás seguro?",
            html: "Estás a punto de eliminar al empleado: <strong>" + names + "</strong>, documento: <strong>" + documento + "</strong>.<br>¡No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminarlo"
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma la eliminación, enviar la solicitud de eliminación
                $.ajax({
                    url: '/empleados/' + id,
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function(data) {
                        // Si la eliminación es exitosa, mostrar una alerta de éxito
                        Swal.fire({
                            title: "¡Eliminado!",
                            text: "El empleado ha sido eliminado.",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        });

                        // Actualizar la tabla de empleados
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Si hay un error al eliminar, mostrar una alerta de error
                        Swal.fire({
                            title: "¡Error!",
                            text: "Hubo un error al eliminar el empleado.",
                            icon: "error",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }
        });
    });
});


