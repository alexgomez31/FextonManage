$(document).ready(function() {
  // Guardar el contenido original del cuerpo de la tabla
  var originalTableBody = $('#tableBody').html();

  $('#searchInput').on('keyup', function() {
    var value = $(this).val().toLowerCase();
    $('#tableBody tr').filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    if($('#tableBody tr:visible').length == 0) {
      $('#tableBody').html('<tr><td colspan="7" class="text-center">No se encontraron coincidencias en la tabla</td></tr>');
    }
  });

  // Restablecer la lista completa cuando se borra el contenido del campo de búsqueda
  $('#searchInput').on('input', function() {
    if($(this).val() === '') {
      $('#tableBody').html(originalTableBody); // Restaurar el contenido original
    } else {
      // Restaurar solo las filas visibles
      $('#tableBody').html(originalTableBody); // Restaurar el contenido original
      var value = $(this).val().toLowerCase();
      $('#tableBody tr').filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
      if($('#tableBody tr:visible').length == 0) {
        $('#tableBody').html('<tr><td colspan="7" class="text-center">No se encontraron coincidencias en la tabla</td></tr>');
      }
    }
  });
});