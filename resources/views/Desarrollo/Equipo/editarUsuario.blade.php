@extends('Desarrollo.layout_desarrollo')


@section('template-blank-development')

@push('CSS')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">

    <style>
        .mt-6{
            margin-top: 6rem !important;
        }
        .mt-10{
            margin-top: 10rem !important;
        }
        .mt-13{
            margin-top: 13em !important;
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
    <a href="{{ url('usuariosEquipo') }}" class="btn btn-secondary"><i class="icon-copy fa fa-plus" aria-hidden="true"></i> Volver</a>
@endsection


<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <form action="{{route('edit.update.user',$usuario->id)}}" method="POST">
            <div class="row">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nmu-user"><span class="text-danger">*</span>Nombres:</label>
                        <input name="nmu-user" type="text" class="form-control" required value="{{$usuario->nombre}}">
                    </div>
                    @error('nmu-user')
                    <div class="alert alert-danger" id="error-alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="apu-user"><span class="text-danger">*</span>Apellidos:</label>
                        <input name="apu-user" type="text" class="form-control" required value="{{$usuario->apellido}}">
                    </div>
                    @error('apu-user')
                    <div class="alert alert-danger" id="error-alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emu-user"><span class="text-danger">*</span>Email:</label>
                        <input name="emu-user" type="email" class="form-control" required value="{{$usuario->email}}">
                    </div>
                    @error('emu-user')
                    <div class="alert alert-danger" id="error-alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pswu-user"><span class="text-danger">*</span>Password:</label>
                        <input name="pswu-user" type="password" class="form-control"  placeholder="Nueva contraseña(Opcional)">
                    </div>
                    @error('psw-user')
                    <div class="alert alert-danger" id="error-alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cru-user"><span class="text-danger">*</span>Cargo:</label>
                        <input name="cru-user" type="text" class="form-control" required value="{{$usuario->cargo}}">
                    </div>
                    @error('cru-user')
                    <div class="alert alert-danger" id="error-alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tfu-user"><span class="text-danger">*</span>Telefono:</label>
                        <input name="tfu-user" type="text" class="form-control" required value="{{$usuario->telefono}}">
                    </div>
                    @error('tfu-user')
                    <div class="alert alert-danger" id="error-alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tfru-user"><span class="text-danger">*</span>Telefono de referencia:</label>
                        <input name="tfru-user" type="text" class="form-control" required value="{{ $usuario->numero_referencia}}">
                    </div>
                    @error('tfru-user')
                    <div class="alert alert-danger" id="error-alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="hru-user"><span class="text-danger">*</span>Horas del mes:</label>
                        <input name="hru-user" type="number" class="form-control" required value="{{$usuario->horas_disponibles}}">
                    </div>
                    @error('hru-user')
                    <div class="alert alert-danger" id="error-alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fhu-user"><span class="text-danger">*</span>Fecha de nacimiento:</label>
                        <input name="fhu-user" type="date" class="form-control" required value="{{$usuario->fecha_nacimiento}}">
                    </div>
                    @error('fhu-user')
                    <div class="alert alert-danger" id="error-alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="rlu-user">
                            <span class="text-danger">*</span> Rol a asignar:
                        </label>
                        <select name="rlu-user" id="rl-user" class="form-control">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ (old('rlu-user') ?? $usuario->roles_id) == $role->id ? 'selected' : '' }}> {{ $role->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('rlu-user')
                        <div class="alert alert-danger" id="error-alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="aru-user"><span class="text-danger">*</span>Area a asignar:</label>
                        <select name="aru-user" id="ar-user" class="form-control">
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}" {{ (old('aru-user') ?? $usuario->areas_id) == $area->id ? 'selected' : '' }}>
                                    {{ $area->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('aru-user')
                    <div class="alert alert-danger" id="error-alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <input type="submit" class="btn btn-success col-12 btn-lg"  value="Actualizar usuario">
                </div>
            </div>
        </div>
    </form>
        <div class="col-md-6">
            <div class="text-center" style="background-color: #004EA4; height: 627px;">
                <img class="mt-13" src="{{ asset('vendors/images/Logo_Himalaya_blanco-10.png') }}" alt="logo_himalaya">
            </div>
        </div>
      
    </div>
</div>



@endsection
