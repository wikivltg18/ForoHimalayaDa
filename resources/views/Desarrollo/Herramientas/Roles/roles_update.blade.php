@extends('Desarrollo.layout_desarrollo')

@section('template-blank-development')

@section('button-press')
    <a href="{{ url('forumRoles') }}" class="btn btn-primary">Listado roles</a>
@endsection

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

@if(session('warningUpdateRole'))
<div class="modal fade" id="warning-modal-update" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content bg-warning">
            <div class="modal-body text-center">
                <h3 class="mb-15"><i class="fa fa-exclamation-triangle"></i> Advertencia</h3>
                <p class="text-center">
                    No se detectaron modificaciones.
                </p>
                <button type="button" class="btn btn-dark" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>
@endif

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('update.roles', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nombre <span class="text-danger">*</span></label>
                            <input type="text" name="nm-lou" class="form-control @error('nm-lou') form-control-warning @enderror" required value="{{ $role->nombre ?? '¡El nombre existe!' }}">
                            @error('nm-lou')
                                <small class="text-warning">{{ $message }} </small>
                            @else
                                <small class="text-muted">Eje: Contador, Colaborador, Project Manager</small>
                            @enderror
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Descripción</label>
                        <input type="text" name="dc-ionu" class="form-control @error('dc-ionu') form-control-warning @enderror" value="{{ $role->descripcion ?? 'Agregue descripcion' }}">
                        @error('dc-ionu')
                            <small class="text-warning">{{ $message }} </small>
                        @else
                            <small class="text-muted">Funcionamiento del rol.</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <input type="submit" class="btn btn-primary col-12 btn-lg" value="Actualizar rol">
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-6" style="background-color: #004EA4;">
            <div class="p-5 text-center">
                <img src="{{ asset('vendors/images/Logo_Himalaya_blanco-10.png') }}" alt="logo_himalaya">
            </div>
        </div>
    </div>
</div>

@push('JS')
    <script src="{{ asset('vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('vendors/scripts/layout-settings.js') }}"></script>
    <script>
        $(document).ready(function() {
            @if (session('warningUpdateRole'))
                $('#warning-modal-update').modal('show');
            @endif
        });
    </script>
@endpush

@endsection
