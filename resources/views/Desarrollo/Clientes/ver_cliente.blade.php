@extends('Desarrollo.layout_desarrollo')


@section('template-blank-development')

@push('CSS')
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
    <a href="" class="btn btn-primary">Crear tablero</a>
@endsection

<div class="container-fluid">
    <div class=" row">
        <div class="col-md-3">
            <h4>Soporte a hosting</h4>
            <br>
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Concepto creativo / tendencia</h5>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <h4 class="">Pauta digital</h4>
            <br>
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Plan de medios</h5>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <h4>Seo</h4>
            <br>
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Keyword research</h5>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <h4>Diseño web</h4>
            <br>
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

