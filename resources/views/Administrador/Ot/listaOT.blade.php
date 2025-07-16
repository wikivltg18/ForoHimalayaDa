@extends('Administrador.layout_admin')

@section('template-blank-development')


@push('CSS')


<link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
<style>
    .btn-secondary {
        background-color: #15baee !important;
        border-color: #15baee !important;
    }

    .btn-secondary:hover {
        background-color: #15baee !important;
    }

    .color-header-table {
        background-color: #004EA4 !important;
        color: #fff !important;
    }

    .dw {
        color: white !important;
    }

    .table-plus::before,
    .table-plus::after {
        color: #ffff !important;
        font-size: medium !important;
    }
</style>
@endpush


@section('button-press')
<a href="{{ url('createOt') }}" class="btn btn-secondary btn-lg">
    <i class="icon-copy fa fa-plus" aria-hidden="true"></i> Crear Orden De Trabajo
</a>
@endsection

<div class="pb-20">
    <table class="table data-table-ots stripe hover">
        <thead>
            <tr class="color-header-table">
                <th>Numero Ot</th>
                <th>Ejecutivo</th>
                <th>Cliente</th>
                <th>Nombre</th>
                <th>Fee</th>
                <th>Fecha inicio</th>
                <th>Estado</th>
                <th>Horas totales</th>
                <th>Valor</th>
                <th>Observaciones</th>
                <th>Fecha Final</th>
                <th>Acciones</th>
            </tr>
        </thead>

    </table>
</div>

@push('JS')
<script>
    $(document).ready(function () {
        $('.data-table-ots').DataTable({
            ajax: "{{ route('api.ots') }}",
            columns: [
                { data: 'referencia', render: function(data){
                    return `#${data}`;
                } },
                { data: 'users.nombre' },
                { data: 'cliente.nombre' },
                { data: 'nombre' },
                { data: 'fee', render: function (data) {
                        return data
                            ? '<span class="badge badge-success rounded-pill">Fee activo</span>'
                            : '<span class="badge badge-danger rounded-pill">Fee no activo</span>';
                    }
                },
                { data: 'fecha_inicio' },
                { data: 'estados.id', render: function (data) {
                        if (data == 10) return '<span class="badge badge-success rounded-pill">Terminado</span>';
                        if (data == 9) return '<span class="badge badge-warning rounded-pill">En espera</span>';
                        if (data == 8) return '<span class="badge badge-info rounded-pill">On going</span>';
                        return '<span class="badge badge-secondary rounded-pill">Desconocido</span>';
                    }
                },
                { data: 'horas_totales' },
                { data: 'valor' },
                { data: 'observaciones' },
                { data: 'fecha_final' },
                { data: 'id', render: function (data) {
                        return `
                        <div class="row no-gutters">
                            <div class="col-md-6">
                                <a href="/editDivisa/${data}" class="text-white btn btn-primary col-12">
                                    <i class="dw dw-eye"></i>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="/editDivisa/${data}" class="text-white btn btn-info col-12">
                                    <i class="dw dw-edit2"></i>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="/descargar-excel" class="text-white btn btn-success col-12">
                                    <i class="icon-copy ion-clipboard"></i>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <form method="POST" action="/delete/${data}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="icon-copy ion-trash-a"></i>
                                    </button>
                                </form>
                            </div>
                        </div>`;
                    }
                }
            ],
            responsive: true,
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
            }

        });
    });
</script>
<script src="{{ asset('src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
@endpush

@endsection
