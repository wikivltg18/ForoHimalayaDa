@extends('Administrador.layout_admin')

@section('template-blank-development')

    @vite(['resources/css/app.css','resources/js/app.js'])

    @push('CSS')
        <style>
            .mt-6 {
                margin-top: 6rem !important;
            }

            .mt-10 {
                margin-top: 10rem !important;
            }

            .mt-13 {
                margin-top: 13rem !important;
            }

            .mt-14 {
                margin-top: 14rem !important;
            }

            .mt-15 {
                margin-top: 15rem !important;
            }

            .mt-16 {
                margin-top: 16rem !important;
            }

            .mt-17 {
                margin-top: 17rem !important;
            }

            .btn-secondary {
                background-color: #15baee !important;
                border-color: #15baee !important;
            }

            .btn-secondary:hover {
                background-color: #15baee !important;
            }
        </style>
    @endpush

@section('button-press')
    <a href="{{ url('listOt') }}" class="btn btn-secondary btn-lg">Volver</a>
@endsection

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('store.create.ot') }}" method="POST">
                <div class="row">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nm-ot"><span class="text-danger">*</span> Número de OT</label>
                            <input type="text" class="form-control" id="nombre" name="nm-ot"
                                value="{{ old('nm-ot') }}" placeholder="EJ: #1106" required>
                            <small class="text-muted">Ingrese el númeroe de la orden de trabajo.</small>
                        </div>
                        @error('nm-ot')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="es-ot"><span class="text-danger">*</span> Estado de OT</label>
                            <select name="es-ot" id="" class="form-control">
                                <option value="">Seleccione el estado...</option>
                                @foreach ($estados as $estado)
                                    <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted">Ingrese el estado actual de la OT.</small>
                            @error('es-ot')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cl-ot"><span class="text-danger">*</span> Cliente</label>
                            <input type="text" class="form-control" id="nombre"
                                name="cl-ot"placeholder="EJ: Comfandi - Corporativo" value="{{ old('cl-ot') }}">
                            <small class="text-muted">Ingrese el cliente relacionado a la orden de trabajo.</small>
                            @error('cl-ot')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="f-ot"><span class="text-danger">*</span> Fee </label>
                            <select name="f-ot" id="" class="form-control">
                                <option value="0">Seleccione el Fee...</option>
                                <option value="0">Tiene Fee mensual</option>
                                <option value="1">No tiene Fee mensual</option>
                            </select>
                            <small class="text-muted">Ingrese el cliente relacionado a la orden de trabajo.</small>
                            @error('f-ot')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="py-ot"><span class="text-danger">*</span> Proyecto</label>
                            <input type="text" class="form-control" id="nombre" name="py-ot"
                                placeholder="EJ: Pauta Concierto de la Cuna a la Jungla" required
                                value="{{ old('py-ot') }}">
                            <small class="text-muted">Ingrese el nombre del proyecto de la orden de trabajo.</small>
                            @error('py-ot')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="vl-ot"><span class="text-danger">*</span> Valor total</label>
                            <input type="text" class="form-control" id="nombre" name="vl-ot"placeholder="EJ:$500.000" required value="{{ old('vl-ot') }}"  oninput="formatToInteger(this)" >
                            <small class="text-muted">Ingrese el valor de la orden de trabajo.</small>
                            @error('vl-ot')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ej-ot"><span class="text-danger">*</span> Ejecutivo</label>
                            <select name="ej-ot" class="form-control" required>
                                <option value="">Seleccione el Ejecutivo...</option>
                                @foreach ($ejecutivos as $ejecutivo)
                                    <option value="{{ $ejecutivo->id }}">{{ $ejecutivo->nombre }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted">Ingrese el ejecutivo a asignar.</small>
                            @error('ej-ot')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="hr-ot"><span class="text-danger">*</span> Horas totales</label>
                            <input type="number" class="form-control" id="hr-ot" name="hr-ot"placeholder="Ingrese el número de horas totales" required value="{{ old('hr-ot') }}">
                            <small class="text-muted">Ingrese las horas totales aproximadas del proyecto.</small>
                            @error('hr-ot')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fh-ot"><span class="text-danger">*</span> Fecha OT</label>
                            <input type="date" name="fh-ot" id=""class="form-control"
                                placeholder="Fecha inicio" required value="{{ old('fh-ot') }}">
                            <small class="text-muted">Ingrese fecha inicial del proyecto.</small>
                            @error('fh-ot')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ff-ot"><span class="text-danger">*</span> fecha fin</label>
                            <input type="date" name="ff-ot" id="" class="form-control"
                                placeholder="Fecha fin" required value="{{ old('ff-ot') }}">
                            <small class="text-muted">Ingrese fecha final del proyecto.</small>
                            @error('ff-ot')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center col-md-12">
                        <div class="form-group">
                            <label for=""><span class="text-danger">*</span> Horas disponibles</label>
                            <div class="card">
                                <div class="card-body" style="background-color: #15baee;">
                                    <h1 class="text-white font-weight-bold">0</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-success col-12 btn-lg">Agregar Orden De Trabajo</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <div class="text-center" style="background-color: #004EA4; height: 790px;">
                <img class="mt-17" src="{{ asset('vendors/images/Logo_Himalaya_blanco-10.png') }}"
                    alt="logo_himalaya">
            </div>
        </div>
    </div>
</div>
</div>



@push('JS')
    <script>
        function closeInfoBox() {
            const infoBox = document.getElementById("infoBox")
            infoBox.classList.add("fade-out");
        }
    </script>
<script>
    function formatToInteger(input) {
        let value = input.value;

        // Remover cualquier carácter que no sea número
        value = value.replace(/[^0-9]/g, '');

        // Eliminar ceros a la izquierda
        value = value.replace(/^0+/, '') || '0';

        // Aplicar separadores de miles con puntos
        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

        // Asignar el valor formateado al input
        input.value = value;
    }
</script>
@endpush
@endsection
