@extends('Desarrollo.layout_desarrollo')

@section('template-blank-development')
    @push('CSS')
        <link rel="stylesheet" type="text/css" href="{{ url('src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">

        <style>
            .general-container {
                background-color: transparent !important;
                padding: 0px !important;
            }

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


            .table-plus::before {
                color: #ffff !important;
                font-size: medium !important;
            }

            .table-plus::after {
                color: #ffff !important;
                font-size: medium !important;
            }


            .data-table-usuario thead tr th:first-child {
                border-top-left-radius: 10px;
                border-bottom-left-radius: 10px;
            }

            .data-table-usuario thead tr th:last-child {
                border-top-right-radius: 10px !important;
                border-bottom-right-radius: 10px !important;
            }

            label {
                color: white;
            }

            .contact-directory-box .contact-name,
            .contact-directory-box .contact-skill {
                padding-bottom: 25px;
            }
        </style>
    @endpush

@section('button-press')
    <a href="{{ url('superadmin/createUser') }}" class="btn btn-secondary"><i
            class="icon-copy fa fa-plus"aria-hidden="true"></i>
        Registrar nuevo usuario</a>
@endsection

@if (session('userSuccess'))
    <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="text-center modal-body font-18">
                    <h3 class="mb-20">{{ session('userSuccess') }}</php>
                        <div class="text-center mb-30">
                            <img src="{{ asset('vendors/images/success.png') }}" alt="Éxito">
                        </div>
                        <p class="text-center">
                            El usuario se ha creado exitosamente en el sistema. Ahora puedes
                            asignarle un rol o gestionarlo desde el módulo de configuración. ¡Gracias por usar nuestra
                            plataforma!
                        <p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
@endif

@if (session('updateSuccess'))
    <script>
        $(document).ready(function() {
            @if ('updateSuccess')
                $('#update-success-modal').modal('show');
            @endif
        });
    </script>

    <div class="modal fade" id="update-success-modal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="text-center modal-body font-18">
                    <h3 class="mb-20">{{ session('updateSuccess') }}</h3>
                    <div class="text-center mb-30">
                        <img src="{{ asset('vendors/images/success.png') }}" alt="Éxito">
                    </div>
                    <p class="text-center">El usuario se ha actualizado exitosamente en el sistema. Puedes verificar los
                        cambios realizados o gestionarlo desde el módulo de configuración. ¡Gracias por usar nuestra
                        plataforma!</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
@endif

{{-- star inputs group --}}
<form action="{{ route('Usuarios') }}" method="GET">
    <div class="pb-4 row justify-content-between">
        <div class="col-md-4">
            <label for="">Nombre: </label>
            <div class="input-group ">
                <input type="search" name="searchName" class="px-2 form-control" value="{{ $search ?? '' }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group ">
                <label for="user-filter">Areas:</label>
                <select class="form-control" name="searchArea">
                    <option value="" {{ !request('searchArea') ? 'selected' : '' }}>Seleccione...</option>
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}" {{ request('searchArea') == $area->id ? 'selected' : '' }}>
                            {{ $area->nombre }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="{{ route('Usuarios') }}" class="btn btn-secondary">Limpiar</a>
            </div>
        </div>
    </div>
</form>

@if ($query->count() > 0)
    <div class="row" id="alterUser">
        @foreach ($query as $qr)
            <div class="pb-5 col-md-3">
                <div class="contact-directory-box">
                    <div class="text-center contact-dire-info">
                        <div class="contact-avatar">
                            <span>
                                <img src="{{ asset('vendors/images/photo9.jpg') }}" alt="">
                            </span>
                        </div>
                        <div class="contact-name">
                            <h4>{{ $qr->nombre }} {{ $qr->apellido }}</h4>
                            <div class="work text-success"><i class="ion-android-person"></i> {{ $qr->cargo }}</div>
                        </div>
                        <div class="contact-skill">
                            <span class="badge badge-pill">{{ $qr->area->nombre ?? "No se encontro el nombre." }}</span>
                        </div>
                    </div>
                    <div class="view-contact">
                        @if ($qr && $qr->id)
                            <a href="{{ route('Perfil de usuario', ['id' => $qr->id]) }}">Ver Perfil</a>
                        @else
                            <span>Perfil no disponible</span>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-white d-flex justify-content-between align-items-center" id="pagination-container">
        <div>
            Mostrando {{ $query->firstItem() }} a {{ $query->lastItem() }} de {{ $query->total() }} resultados
        </div>
        <div>
            {{ $query->links() }}
        </div>
    </div>
@elseif($search || $inputArea )
    <div class="text-center alert alert-warning">
        No se encontraron usuarios con el término "{{ $search }}"
    </div>
@endif



@push('JS')
<script src="{{ asset('vendors/scripts/core.js') }}"></script>
<script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
<script src="{{ asset('vendors/scripts/process.js') }}"></script>
    <script>
        $(document).ready(function() {
            @if (session('updateSuccess'))
                $('#update-success-modal').modal('show');
            @endif
        });
    </script>
    <script>
        $(document).ready(function() {
            @if (session('success'))
                $('#success-modal').modal('show');
            @endif
        });
    </script>
@endpush




@endsection
