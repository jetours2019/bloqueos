// Call the dataTables jQuery plugin
var checked = true;

$(document).ready(function () {

    $('#programas').DataTable({
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "No se encuentran registros",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty": "No se encuentran registros",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            "lengthMenu": "Mostrar _MENU_ registros",
            "search": "Buscar:",
            "paginate": {
                "first": "Primera",
                "last": "Última",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        },
        "order": [
            [2, "asc"]
        ],
    });

    $('#archivos').DataTable({
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "No se encuentran registros",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty": "No se encuentran registros",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            "lengthMenu": "Mostrar _MENU_ registros",
            "search": "Buscar:",
            "paginate": {
                "first": "Primera",
                "last": "Última",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        },
        "order": [
            [2, "asc"]
        ],
        "columnDefs": [{
            "orderable": false,
            "targets": 0
        }]
    });
});

function confirm_delete_one_file(button) {

    var filename = button.attr('data-name');
    var url = button.attr('data-url');

    Swal.fire({
        title: '¿Seguro desea borrar el archivo ' + filename + '?',
        text: "Una vez borrado del servidor no se podrá recuperar",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Borrar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            delete_files([url]);
        }
    })
}

function confirm_delete_all_files() {
    var atLeastOneIsChecked = $('input:checkbox:checked').length > 0;
    if (!atLeastOneIsChecked) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Debe seleccionar al menos un archivo!',
        })
        return;
    }
    var urls = [];
    $('input:checkbox:checked').each(function () {
        urls.push($(this).attr('data-url'));
    })

    Swal.fire({
        title: '¿Seguro desea borrar los archivos seleccionados?',
        text: "Una vez borrados del servidor no se podrán recuperar",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Borrar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            delete_files(urls);
        }
    })
}

function select_all() {
    $('input:checkbox').prop('checked', checked);
    var newText = checked ? "Deseleccionar Todos" : "Seleccionar Todos";
    $("#botonSel").html(newText).toggleClass('btn-info').toggleClass('btn-primary');
    checked = checked ? false : true;
}

function delete_files(urls) {
    $.ajax({
        type: "POST",
        url: "delete_files_controller.php",
        dataType: "json",
        data: {
            "urls": urls,
        },
        success: function (response) {
            Swal.fire(
                response.title,
                response.msg,
                response.success
            )

            setTimeout(() => {
               location.reload(); 
            }, 2000);
        },
        error: function (error) {
            Swal.fire(
                "Error",
                "Error de conexión con el servidor",
                "error"
            )
            console.log(error);
        }
    });
}