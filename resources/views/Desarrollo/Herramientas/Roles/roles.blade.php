@extends('Desarrollo.layout_desarrollo')

@section('template-blank-development')
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
        <a href="{{ url('superadmin/createRoles') }}" class="btn btn-primary">Crear rol</a>
    @endsection

    {{-- ELIMINAR ROLES -> DIRECTOR EJECUTIVO, CUENTAS, CLIENTES --}}

    @if (session('successRoleUpdate'))
        <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="text-center modal-body font-18">
                        <h3 class="mb-20">{{ session('successRoleUpdate') }}</h3>
                        <div class="text-center mb-30">
                            <img src="{{ asset('vendors/images/success.png') }}" alt="Éxito">
                        </div>
                        <p>El rol se ha creado exitosamente en el sistema. Ahora puedes asignarlo a los usuarios
                            correspondientes o gestionarlo desde el módulo de configuración. ¡Gracias por usar nuestra
                            plataforma!</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <table id="data-table-roles" class="table stripe hover nowrap">
        <thead class="text-center">
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>Acciones</th>
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
                $('#data-table-roles').DataTable({
                    ajax: {
                        url: '{{ route('api.roles') }}',
                        type: 'GET',
                    },

                    columns: [{
                            data: 'nombre'
                        },
                        {
                            data: 'descripcion',
                            render: function(data) {
                                return data ?? 'Descripcion no asignada.'
                            }
                        },
                        {
                            data: 'estado',
                            render: function(data) {
                                return data == 1 ?
                                    '<span class="badge badge-success">Rol Disponible </span>' :
                                    '<span class="badge badge-danger"> Rol Inactivo </span>';
                            }
                        },
                        {
                            data: null,
                            orderable: false,
                            render: function(data) {
                                var baseUrl = "{{ url('superadmin/editRoles') }}";
                                return `<a href="${baseUrl}/${data.id}" class="btn btn-primary">Editar rol</a>`;
                            }
                        },
                    ]
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                @if (session('successRoleUpdate'))
                    $('#success-modal').modal('show');
                @endif
            });
        </script>
        <script src="{{ asset('src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('src/plugins/datatables/js/pdfmake.min.js') }}"></script>
        <script src="{{ asset('src/plugins/datatables/js/vfs_fonts.js') }}"></script>
    @endpush
@endsection
