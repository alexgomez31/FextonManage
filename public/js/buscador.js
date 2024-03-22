$(document).ready(function() {
  // Guardar el contenido original del cuerpo de la tabla
  var originalTableBody = $('#tableBody').html();

  $('#searchInput').on('keyup', function() {
      var value = $(this).val().toLowerCase();

      // Limpiar la tabla
      $('#tableBody').empty();

      // Si el término de búsqueda está vacío, restaurar el contenido original
      if (value === '') {
          $('#tableBody').html(originalTableBody);
          return;
      }

      // Realizar una búsqueda en todos los campos de la tabla original
      $.ajax({
          url: '/productos/search',
          type: 'GET',
          data: { term: value },
          success: function(response) {
              // Agregar filas con los resultados de la búsqueda
              response.forEach(function(producto) {
                  var row = '<tr>';
                  row += '<td>' + producto.id + '</td>';
                  row += '<td>' + producto.tipoproducto + '</td>';
                  row += '<td>' + producto.referencia + '</td>';
                  row += '<td>' + producto.descripcion + '</td>';
                  row += '<td>' + producto.alto + '</td>';
                  row += '<td>' + producto.ramas + '</td>';
                  row += '<td>' + producto.materiales + '</td>';
                  row += '<td>';
                  row += producto.plano ? '<span class="badge bg-success">PDF asociado</span>' : '<span class="badge bg-danger">Falta PDF</span>';
                  row += '</td>';
                  row += '<td>';
                  row += '<a id="mostrarPdf" href="/productos/' + producto.id + '/ver-pdf" target="_blank" class="btn btn-sm btn-primary">Ver PDF</a>';
                  row += '<a href="/productos/' + producto.id + '/edit" class="btn btn-sm btn-warning">Editar</a>';
                  row += '<button type="button" class="btn btn-sm btn-danger delete-productt" data-id="' + producto.id + '" data-tipoproducto="' + producto.tipoproducto + '" data-referencia="' + producto.referencia + '" data-url="/productos/' + producto.id + '">Eliminar</button></td>';
                  row += '</td>';
                  row += '</tr>';
                  $('#tableBody').append(row);
              });
          },
          error: function(xhr, status, error) {
              console.error(error);
          }
      });
  });
});

$(document).ready(function() {
  // Manejador de eventos para el clic en el botón "Eliminar"
  $(document).on('click', '.delete-productt', function() {
      var id = $(this).data('id');
      var tipoproducto = $(this).data('tipoproducto');
      var referencia = $(this).data('referencia');
      var url = $(this).data('url');

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
                  url: url,
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









// document.addEventListener('DOMContentLoaded', function() {
//     // Obtén el elemento de entrada de búsqueda
//     const searchInput = document.getElementById('searchInputEmp');

//     // Agrega un event listener para detectar cambios en el campo de búsqueda
//     searchInput.addEventListener('input', function() {
//         // Obtén el valor del campo de búsqueda
//         const searchTerm = this.value;

//         // Realiza una solicitud AJAX al servidor para obtener los resultados filtrados
//         fetch(`/empleados/searchEm?term=${searchTerm}`)
//             .then(response => response.json())
//             .then(data => {
//                 // Limpiar la tabla de empleados
//                 const tableBody = document.getElementById('tableBody');
//                 tableBody.innerHTML = '';

//                 // Insertar los resultados de la búsqueda en la tabla
//                 data.forEach(empleado => {
//                     const row = document.createElement('tr');
//                     row.innerHTML = `
//                         <td>${empleado.id}</td>
//                         <td>${empleado.names}</td>
//                         <td>${empleado.documento}</td>
//                         <td>${empleado.numdoc}</td>
//                         <td>${empleado.cargo}</td>
//                         <td>${empleado.fecha_ingreso}</td>
//                         <td>${empleado.fecha_fin}</td>
//                         <td>${empleado.nacionalidad}</td>
//                         <td>${empleado.ciudad}</td>
//                         <td>${empleado.direccion}</td>
//                         <td>${empleado.telefono}</td>
//                         <td>${empleado.email}</td>
//                         <td>${empleado.document_soport ? '<span class="badge bg-success">PDF asociado</span>' : '<span class="badge bg-danger">Falta PDF</span>'}</td>
//                         <td>${empleado.contrato_soport ? '<span class="badge bg-success">PDF asociado</span>' : '<span class="badge bg-danger">Falta PDF</span>'}</td>
//                         <td>${empleado.carta_soport ? '<span class="badge bg-success">PDF asociado</span>' : '<span class="badge bg-danger">Falta PDF</span>'}</td>
//                         <td>${empleado.otro_si_soport ? '<span class="badge bg-success">PDF asociado</span>' : '<span class="badge bg-danger">Falta PDF</span>'}</td>
//                         <td>${empleado.liquidaciones_soport ? '<span class="badge bg-success">PDF asociado</span>' : '<span class="badge bg-danger">Falta PDF</span>'}</td>
//                         <td>
//                             <div class="button-container">
//                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verEmpleadoModal${empleado.id}">
//                                     <i class="fas fa-eye"></i>
//                                 </button>

//                                 <a href="/empleados/${empleado.id}/edit" class="btn btn-sm btn-warning">
//                                     <i class="fas fa-edit"></i>
//                                 </a>
                          
//                                 <button class="btn btn-danger delete-empleado" data-id="${empleado.id}" data-names="${empleado.names}" data-numdoc="${empleado.numdoc}" data-url="/empleados/${empleado.id}">
//                                 <i class="fas fa-trash-alt"></i>
//                             </button>


//                             </div>
//                         </td>
//                     `;
//                     tableBody.appendChild(row);
//                 });
//             })
//             .catch(error => {
//                 console.error('Error al realizar la solicitud AJAX:', error);
//             });
//     });
// });
document.addEventListener('DOMContentLoaded', function() {
    // Obtén el elemento de entrada de búsqueda
    const searchInput = document.getElementById('searchInputEmp');

    // Agrega un event listener para detectar cambios en el campo de búsqueda
    searchInput.addEventListener('input', function() {
        // Obtén el valor del campo de búsqueda
        const searchTerm = this.value;

        // Realiza una solicitud AJAX al servidor para obtener los resultados filtrados
        fetch(`/empleados/searchEm?term=${searchTerm}`)
            .then(response => response.json())
            .then(data => {
                // Limpiar la tabla de empleados
                const tableBody = document.getElementById('tableBody');
                tableBody.innerHTML = '';

                // Verificar si se encontraron resultados
                if (data.length === 0) {
                    // Si no se encuentran registros, mostrar un mensaje en una fila especial
                    const noRecordsRow = document.createElement('tr');
                    noRecordsRow.innerHTML = `
                        <td colspan="17" class="">No se encontraron registros con aquella busqueda prueba buscar por su numero de identificacion y nombre</td>
                    `;
                    tableBody.appendChild(noRecordsRow);
                } else {
                    // Insertar los resultados de la búsqueda en la tabla
                    data.forEach(empleado => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${empleado.id}</td>
                            <td>${empleado.names}</td>
                            <td>${empleado.documento}</td>
                            <td>${empleado.numdoc}</td>
                            <td>${empleado.cargo}</td>
                            <td>${empleado.fecha_ingreso}</td>
                            <td>${empleado.fecha_fin}</td>
                            <td>${empleado.nacionalidad}</td>
                            <td>${empleado.ciudad}</td>
                            <td>${empleado.direccion}</td>
                            <td>${empleado.telefono}</td>
                            <td>${empleado.email}</td>
                            <td>${empleado.document_soport ? '<span class="badge bg-success">PDF asociado</span>' : '<span class="badge bg-danger">Falta PDF</span>'}</td>
                            <td>${empleado.contrato_soport ? '<span class="badge bg-success">PDF asociado</span>' : '<span class="badge bg-danger">Falta PDF</span>'}</td>
                            <td>${empleado.carta_soport ? '<span class="badge bg-success">PDF asociado</span>' : '<span class="badge bg-danger">Falta PDF</span>'}</td>
                            <td>${empleado.otro_si_soport ? '<span class="badge bg-success">PDF asociado</span>' : '<span class="badge bg-danger">Falta PDF</span>'}</td>
                            <td>${empleado.liquidaciones_soport ? '<span class="badge bg-success">PDF asociado</span>' : '<span class="badge bg-danger">Falta PDF</span>'}</td>
                            <td>
                                <div class="button-container">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verEmpleadoModal${empleado.id}">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    <a href="/empleados/${empleado.id}/edit" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                
                                    <button class="btn btn-danger delete-empleado" data-id="${empleado.id}" data-names="${empleado.names}" data-numdoc="${empleado.numdoc}" data-url="/empleados/${empleado.id}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        `;
                        tableBody.appendChild(row);
                    });
                }
            })
            .catch(error => {
                console.error('Error al realizar la solicitud AJAX:', error);
            });
    });
});




$(document).ready(function() {
    // Manejador de eventos para el clic en el botón "Eliminar"
    $(document).on('click', '.delete-empleado', function() {
        var id = $(this).data('id');
        var names = $(this).data('names');
        var numdoc = $(this).data('numdoc');
        var url = $(this).data('url');
  
        Swal.fire({
            title: "¿Estás seguro?",
            html: "Estás a punto de eliminar al empleado de nombre: <strong>" + names + "</strong>, Número de Documento: <strong>" + numdoc + "</strong>.<br>¡No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminarlo"
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma la eliminación, enviar la solicitud de eliminación
                $.ajax({
                    url: url,
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