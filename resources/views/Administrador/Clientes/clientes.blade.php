@extends('Administrador.layout_admin')

@section('template-blank-admin')
    @push('CSS')
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
        <style>
            .btn-primary {
                background-color: #15baee !important;
                border-color: #15baee !important;
                color: white !important;
                font-weight: bolder !important;
            }

            .btn-primary:hover {
                background-color: #004EA4 !important;
                border-color: #004EA4 !important;
            }
        </style>
    @endpush

    @section('button-press')
        <a href="{{ url('superadmin/crearCliente') }}" class="btn btn-primary"> Crear cliente </a>
    @endsection


    <div class="table-responsive">
        <table id="data-table-clientes" class="table stripe hover nowrap table-responsive">
            <thead class="text-center">
                <tr>
                    <th class="table-plus datatable-nosort">Logo</th>
                    <th>Nombre</th>
                    <th>Web</th>
                    <th>Email</th>
                    <th>Mapa</th>
                    <th>Contrato</th>
                    <th>Ejecutivo asignado</th>
                    <th>Estado</th>
                    <th class="datatable-nosort">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- DataTables llenará esto -->
            </tbody>
        </table>


        @push('JS')
            <script src="{{ asset('vendors/scripts/core.js') }}"></script>
            <script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
            <script src="{{ asset('src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
            <script>
                $(document).ready(function() {
                    $('#data-table-clientes').DataTable({
                        ajax: {
                            url: '{{ route('api.clientes') }}',
                            type: 'GET'
                        },
                        columns:  [
                            {
                                data: 'logo',
                                render: function(data) {
                                    return data ??
                                        '<img src="{{ asset('vendors/images/photo4.jpg') }}" class="rounded-circle" alt="logo_cliente" >'
                                }
                            },
                            {
                                data: 'nombre'
                            },
                            {
                                data: 'sitio_web',
                                render: function(data, type, row) {
                                    return `<a href="${data}" target="_blank" class="btn btn-primary">Web ${row.nombre}</a>`;
                                }
                            },
                            {
                                data: 'email',
                                render: function(data) {
                                    return data ?? "Correo sin asignar."
                                }

                            },
                            {
                                data: 'mapa_cliente',
                                render: function(data){
                                    return data ?? "Mapa sin agregar."
                                }
                            },

                            {
                                data: 'contrato',
                                render: function(data, type, row) {
                                    if (data && Array.isArray(data) && data.length > 0) {
                                        return data.map(contrato => contrato.nombre).join(', ');
                                    } else {
                                        return 'Sin contrato.';
                                    }
                                }
                            },
                            {
                                data: 'usuario',
                                render: function(data, type, row) {
                                    if (data && Array.isArray(data) && data.length > 0) {
                                        return data.map(usuario => usuario.nombre).join(', ');
                                    } else {
                                        return 'Ejecutivo no asignado.';
                                    }
                                }
                            },
                            {
                                data: 'estado',
                                render: function(data) {
                                    return data == 1 ?
                                        '<span class="badge badge-success">Cliente Disponible</span>' :
                                        '<span class="badge badge-danger">Cliente Inactivo</span>';
                                }
                            },
                            {
                                data: null,
                                orderable: false,
                                render: function(data) {
                                    var baseUrl = "{{ url('superadmin/verCliente') }}";
                                    var urlServicio = "{{ url('superadmin/editarCliente') }}";
                                    return `
                                    <a href="${baseUrl}/${data.id}" class="btn btn-primary">Ver proyecto</a>
                                    <a href="${baseUrl}/${data.id}" class="text-white btn btn-secondary">Editar cliente</a>
                                    `;
                                }
                            },

                        ]
                    });
                });
            </script>
        @endpush
    @endsection
