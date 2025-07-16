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
    <a href="{{ url('superadmin/crearServicio') }}" class="btn btn-primary">Crear servicio</a>
@endsection

@if(session('successServicio'))
    <div class="modal fade" id="success-modal-servicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="text-center modal-body font-18">
                <h3 class="mb-20">{{ session('successServicio') }}</h3>
                <div class="text-center mb-30">
                    <img src="{{ asset('vendors/images/success.png') }}" alt="Éxito">
                </div>
                <p>El servicio se ha creado exitosamente en el sistema. Ahora puedes asignarlo a los empleados correspondientes o gestionarlo desde el módulo de configuración. ¡Gracias por usar nuestra plataforma!</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
    </div>
@endif

<table id="data-table-servicios" class="table stripe hover nowrap">
    <thead class="text-center">
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Acciones</th>
            <th>Fecha creación</th>
            <th>Fecha actualización</th>
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
        $(document).ready(function(){
            @if(session('successServicio'))
                $('#success-modal-servicio').modal('show');
            @endif
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#data-table-servicios').DataTable({
                ajax: {
                    url: '{{ route('api.servicios') }}',
                    type: 'GET'
                },
                columns: [
                    {
                        data: 'nombre'
                    },
                    {
                        data: 'descripcion',
                        render: function(data){
                            return data ?? 'Descripcion sin asignada.'
                        }
                    },
                    {
                        data: 'estado',
                        render: function(data) {
                            return data == 1 ?
                                '<span class="badge badge-success">Servicio Disponible</span>' :
                                '<span class="badge badge-danger">Servicio Inactiva</span>';
                        }
                    },
                    {
                        data: null,
                        orderable: false,
                        render: function(data) {
                            var baseUrl = "{{ url('superadmin/editarServicio') }}";
                            return `<a href="${baseUrl}/${data.id}" class="btn btn-primary">Editar servicio</a>`;
                        }
                    },
                    {
                        data: 'created_at',
                        render: function(data, type, row) {
                            let fecha = new Date(data);
                            return fecha.toLocaleString('es-CO', {
                                timeZone: 'America/Bogota',
                                day: '2-digit',
                                month: '2-digit',
                                year: 'numeric',
                                hour: '2-digit',
                                minute: '2-digit',
                                hour12: true
                            });
                        }
                    },
                    {
                        data:'updated_at',
                        render: function(data, type, row) {
                            let fecha = new Date(data);
                            return fecha.toLocaleString('es-CO', {
                                timeZone: 'America/Bogota',
                                day: '2-digit',
                                month: '2-digit',
                                year: 'numeric',
                                hour: '2-digit',
                                minute: '2-digit',
                                hour12: true
                            });
                        }
                    },
                ]
            });
        });
    </script>

@endpush

@endsection
