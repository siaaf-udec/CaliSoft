$(document).ready(function(){
        $('#documento').DataTable({
            responsive: true,
            "lengthMenu": [[5, 10, 25,50, -1], [5, 10, 25,50, "All"]],
            "language": {
            "lengthMenu": "Mostrando _MENU_ registros por pagina",
            "zeroRecords": "No se Encontraron Datos",
            "info": "Mostrando Página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponiblese",
            "infoFiltered": "(filtrando de _MAX_ total records)",
            "search": "Buscar",
          }
          });
});
