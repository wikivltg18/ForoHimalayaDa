$('document').ready(function(){

    $('.data-table').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        searching: true,
        columnDefs: [{
            targets: "datatable-nosort",
            orderable: true,
        }],
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
        language: {
            info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ entradas",
            infoEmpty: "Mostrando 0 a 0 de 0 entradas",
            infoFiltered: "(filtrado de _MAX_ entradas totales)",
            loadingRecords: "Cargando...",
            zeroRecords: "No se encontraron resultados",
            emptyTable: "No hay datos disponibles en la tabla",
            paginate: {
                next: '<i class="ion-chevron-right"></i>',
                previous: '<i class="ion-chevron-left"></i>'
            },
            aria: {
                sortAscending: ": activar para ordenar la columna de manera ascendente",
                sortDescending: ": activar para ordenar la columna de manera descendente"
            }
        }
    });


    $('.data-table-export').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        columnDefs: [{
            targets: "datatable-nosort",
            orderable: false,
        }],
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
        language: {
            info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ entradas",
            infoEmpty: "Mostrando 0 a 0 de 0 entradas",
            infoFiltered: "(filtrado de _MAX_ entradas totales)",
            loadingRecords: "Cargando...",
            zeroRecords: "No se encontraron resultados",
            emptyTable: "No hay datos disponibles en la tabla",
            paginate: {
                next: '<i class="ion-chevron-right"></i>',
                previous: '<i class="ion-chevron-left"></i>'
            },
            aria: {
                sortAscending: ": activar para ordenar la columna de manera ascendente",
                sortDescending: ": activar para ordenar la columna de manera descendente"
            }
        },
        dom: 'Bfrtp',
        buttons: [
            'copy', 'csv', 'pdf', 'print'
        ]
    });

    var table = $('.select-row').DataTable();
    $('.select-row tbody').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });

    var multipletable = $('.multiple-select-row').DataTable();
    $('.multiple-select-row tbody').on('click', 'tr', function () {
        $(this).toggleClass('selected');
    });

    var table = $('.checkbox-datatable').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
        language: {
            info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ entradas",
            infoEmpty: "Mostrando 0 a 0 de 0 entradas",
            infoFiltered: "(filtrado de _MAX_ entradas totales)",
            loadingRecords: "Cargando...",
            zeroRecords: "No se encontraron resultados",
            emptyTable: "No hay datos disponibles en la tabla",
            paginate: {
                next: '<i class="ion-chevron-right"></i>',
                previous: '<i class="ion-chevron-left"></i>'
            },
            aria: {
                sortAscending: ": activar para ordenar la columna de manera ascendente",
                sortDescending: ": activar para ordenar la columna de manera descendente"
            }
        },
        columnDefs: [{
            targets: 0,
            searchable: false,
            orderable: false,
            className: 'dt-body-center',
            render: function (data, type, full, meta) {
                return '<div class="dt-checkbox"><input type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '"><span class="dt-checkbox-label"></span></div>';
            }
        }],
        order: [[1, 'asc']]
    });

    $('#example-select-all').on('click', function(){
        var rows = table.rows({ 'search': 'applied' }).nodes();
        $('input[type="checkbox"]', rows).prop('checked', this.checked);
    });

    $('.checkbox-datatable tbody').on('change', 'input[type="checkbox"]', function(){
        if (!this.checked) {
            var el = $('#example-select-all').get(0);
            if (el && el.checked && ('indeterminate' in el)) {
                el.indeterminate = true;
            }
        }
    });
});
