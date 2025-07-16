@extends('Desarrollo.layout_desarrollo')

@section('template-blank-development')
        {{-- Sección para agregar estilos CSS específicos para la tabla de clientes --}}
    @push('CSS')
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
        <style>
            {{-- Estilos personalizados para el botón principal --}}
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

    {{-- Botón para crear un nuevo cliente --}}
    @section('button-press')
        <a href="{{ url('superadmin/crearCliente') }}" class="btn btn-primary"> Crear cliente </a>
    @endsection


    {{-- Tabla de clientes --}}
    <div class="table-responsive">
        <table id="data-table-clientes" class="table stripe hover nowrap table-responsive">
            <thead class="text-center">
                {{-- Encabezados de la tabla --}}
                <tr>
                    <th class="table-plus datatable-nosort">Logo</th>
                    <th>Nombre</th>
                    <th>Web</th>
                    <th>Email</th>
                    <th>Ejecutivo asignado</th>
                    <th>Estado</th>
                    <th class="datatable-nosort">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-start">
                {{-- Las filas de la tabla se llenarán dinámicamente con DataTables --}}
                {{-- Aquí no se define contenido estático, ya que DataTables se encargará de cargar los datos --}}
                {{-- Puedes agregar filas de ejemplo si es necesario, pero no es recomendable para una tabla dinámica --}}
                {{-- Ejemplo de fila estática (opcional) --}}
                <!-- DataTables llenará esto dinámicamente -->
            </tbody>
        </table>

                <td>

                </td>

        {{-- Scripts JS para inicializar DataTables y funcionalidades de la tabla --}}
        @push('JS')
            <script src="{{ asset('vendors/scripts/core.js') }}"></script>
            <script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
            <script src="{{ asset('src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
            <script>
                // Inicialización de la tabla de clientes usando DataTables
                $(document).ready(function() {
                    $('#data-table-clientes').DataTable({
                        // Configuración de la fuente de datos vía AJAX
                        ajax: {
                            url: '{{ route('api.clientes') }}',
                            type: 'GET'
                        },
                        // Definición de las columnas y renderizado personalizado
                        columns:  [
                            {
                                data: 'logo',
                                render: function(data) {
                                    return data ?? '<img src="{{ asset('vendors/images/photo4.jpg') }}" class="rounded-circle" alt="logo_cliente" >'
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
                                        '<span class="badge badge-success">Cliente Activo</span>' :
                                        '<span class="badge badge-danger">Cliente Inactivo</span>';
                                }
                            },
                            {
                                data: null,
                                orderable: false,
                                render: function(data) {
                                var baseUrl = "{{ url('superadmin/verCliente') }}";
                                var botonesContratos = '';
                                if (Array.isArray(data.contratos) && data.contratos.length > 0) {
                                    botonesContratos = data.contratos.map(nombre => {
                                        return `<a href="${baseUrl}/${data.id}" class="m-1 text-white btn btn-primary btn-sm">${nombre}</a>`;
                                    }).join(' ');
                                } else {
                                    botonesContratos = '<span class="text-muted">Sin contratos asignados</span>';
                                }
                                return `
                                    <a href="${baseUrl}/${data.id}" class="text-white btn btn-secondary">Editar</a>
                                    ${botonesContratos}
                                `;
                            }
                            },
                        ]
                    });
                });
            </script>
        @endpush
    @endsection