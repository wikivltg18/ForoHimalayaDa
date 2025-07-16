@extends('Desarrollo.layout_desarrollo')

@section('template-blank-development')

@section('button-press')
    <a href="{{ url('superadmin/roles') }}" class="btn btn-primary">Listado de roles</a>
@endsection

@push('CSS')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css') }}">
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


<div class="container-fluid">
<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('Roles.store') }}" method="POST">
                     @csrf
                    <div class="form-group">
                        <label for="">Nombre del rol <span class="text-danger">*</span></label>
                        <input type="text" name="nm-lo" class="form-control @error('nm-lo') form-control-warning @enderror" required value="{{ old('nm-lo') }}">
                        @error('nm-lo')
                            <small class="text-warning"">{{ $message }} </small>
                        @else
                            <small class="text-muted">Eje: Contador, Colaborador, Project Manager  </small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Descripción <span class="text-danger">*</span></label>
                        <input type="text" name="dc-ion" class="form-control @error('dc-ion') form-control-warning @enderror" value="{{ old('dc-ion') }}">
                        @error('dc-ion')
                            <small class="text-warning">{{ $message }} </small>
                        @else
                            <small class="text-muted ">Funcionamiento del rol. </small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <input type="submit" class="btn btn-primary col-12 btn-lg" value="Añadir rol nuevo">
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
    <script src="{{ asset('vendors/scripts/core.js')}}"></script>
    <script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
@endpush
@endsection
