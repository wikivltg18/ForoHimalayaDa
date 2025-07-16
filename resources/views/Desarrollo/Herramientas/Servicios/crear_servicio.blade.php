@extends('Desarrollo.layout_desarrollo')

@section('template-blank-development')
    @push('CSS')
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/switchery/switchery.min.css') }}">
        <!-- bootstrap-tagsinput css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
        <!-- bootstrap-touchspin css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css') }}">
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
        <a href="{{ url('superadmin/servicios')}}" class="btn btn-primary"> Listado de servicios </a>
    @endsection
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('store.servicios') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nombre del servicio <span class="text-danger">*</span></label>
                            <input type="text" name="sr-nombre" class="form-control @error('sr-nombre') form-control-warning @enderror " required value="{{ old('sr-nombre') }}">
                            @error('sr-nombre')
                                <small class="text-warning">{{ $message }} </small>
                            @else
                                <small>Eje: Publicidad Digital, Desarrollo Móvil, Base de Datos.</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Descripcion</label>
                            <input type="text" name="sr-descripcion"
                                class="form-control @error('sr-descripcion') form-control-warning @enderror " value="{{ old('sr-descripcion') }}">
                            @error('sr-descripcion')
                                <small class="text-warning">{{ $message }} </small>
                            @else
                                <small>Eje: Publicidad Digital, Desarrollo Móvil, Base de Datos.</small>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-md-12">
                        <div class="form-group">
                            <label>Fases del servicio <span class="text-danger">*</span></label>
                            <input type="text" value="Amsterdam,Washington,Sydney,Beijing" name="" data-role="tagsinput">
                            <small class="text-muted">Servicios de ejemplo, eliminarlos cuando este en proceso de creación dando click en "X". </small>
                        </div>
                    </div> --}}
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-primary col-12" value="Crear servicio">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6" style="background-color: #004EA4;">
            <div class="p-5 text-center">
                <img src="{{ asset('vendors/images/Logo_Himalaya_blanco-10.png') }}" alt="logo_himalaya">
            </div>
        </div>
    </div>

    @push('JS')
        <script src="{{ asset('vendors/scripts/core.js') }}"></script>
        <script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
        <script src="{{ asset('src/plugins/switchery/switchery.min.js') }}"></script>
        <!-- bootstrap-tagsinput js -->
        <script src="{{ asset('src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
        <!-- bootstrap-touchspin js -->
        <script src=" {{ asset('src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script>
        <script src="{{ asset('vendors/scripts/advanced-components.js') }}"></script>
    @endpush
@endsection
