@extends('Desarrollo.layout_desarrollo')

@section('template-blank-development')
    @push('CSS')
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/core.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icon-font.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/switchery/switchery.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/jquery-steps/jquery.steps.css') }}">
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

            .btn-outline-success:hover,
            .btn-outline-success:active {
                color: #fff !important;
                background-color: #15baee !important;
                border-color: #15baee !important;
            }

            .btn-outline-success {
                border-color: #15baee !important;
            }

            .mt-6 {
                margin-top: 6rem;
            }

            .mt-7 {
                margin-top: 7rem;
            }

            .mt-8 {
                margin-top: 8rem;
            }

            .mt-9 {
                margin-top: 9rem;
            }

            .mt-10 {
                margin-top: 10rem;
            }

            .mt-11 {
                margin-top: 11rem;
            }

            .mt-12 {
                margin-top: 12rem;
            }

            .mt-13 {
                margin-top: 13rem;
            }

            .mt-14 {
                margin-top: 14rem;
            }

            .mt-15 {
                margin-top: 15rem;
            }


            .form-control-warning {
                /* Estilo consistente para errores */
                border-color: #dc3545;
            }

            .error-message {
                /* Estilo para los mensajes de error */
                color: #dc3545;
                font-size: 0.8rem;
                margin-top: 0.25rem;
            }

            /* Estilo adicional para el wizard como en la imagen */
            .steps ul {
                display: flex;
                justify-content: center;
            }

            .steps li {
                flex: 1;
                max-width: 200px;
            }

            .steps .current .step {
                background-color: #0d6efd;
                color: white;
            }

            .steps .done .step {
                background-color: #0d6efd;
                color: white;
            }
        </style>
    @endpush

     @section('button-press')
        <a href="{{ route('Clientes')}}" class="btn btn-primary">Listado de clientes</a>
    @endsection

    <form action="{{ route('store.cliente') }}" method="POST" enctype="multipart/form-data">
        @csrf {{-- Protección contra CSRF --}}
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lg_cliente">Logo del cliente</label>
                            <input type="file" name="lg_cliente" id="logo_cliente" class="form-control @error('lg_cliente') form-control-warning @enderror">
                            <small class="text-muted"> Foto de referencia del cliente. </small>
                            @error('lg_cliente')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre_cliente">Nombre del cliente <span class="text-danger">*</span></label>
                            <input type="text" name="nm_cliente" class="form-control @error('nm_cliente') form-control-warning @enderror" required>
                            <small class="text-muted"> Eje: Unicentro, Manitoba, Comfandi. </small>
                            @error('nm_cliente')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email_cliente">Email <span class="text-danger">*</span></label>
                            <input type="email" name="em_cliente" id="email_cliente"
                                class="form-control @error('em_cliente') form-control-warning @enderror" value="{{ old('em_cliente') }}" required>
                            <small class="text-muted"> Eje: Manitoba@gmail.com, Comfandi@gmail.com. </small>
                            @error('em_cliente')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telefono_cliente">Teléfono <span class="text-danger"> * </span></label>
                            <input type="text" name="telefono_cliente" id="telefono_cliente"
                                class="form-control @error('telefono_cliente') form-control-warning @enderror" value="{{ old('telefono_cliente') }}" required>
                            <small class="text-muted"> Telefono de comunicación directo del cliente. </small>
                            @error('telefono_cliente')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telefono_referencia_cliente">Teléfono referencia <span class="text-danger">
                                    * </span></label>
                            <input type="text" name="telefono_referencia_cliente" id="telefono_referencia_cliente"
                                class="form-control @error('telefono_referencia_cliente') form-control-warning @enderror"
                                value="{{ old('telefono_referencia_cliente') }}" required>
                            <small class="text-muted"> Telefono de referencia del cliente. </small>
                            @error('telefono_referencia_cliente')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sitio_web_cliente">Sitio web <span class="text-danger">*</span></label>
                            <input type="text" name="st_web" class="form-control @error('st_web') form-control-warning @enderror" value="{{ old('st_web') }}"  required>
                            <small class="text-muted"> Url del sitio web del cliente.</small>
                            @error('st_web')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="usuario_id">Director ejecutivo <span class="text-danger"> * </span></label>
                            <select name="usuario_id" id="usuario_id"
                                class="form-control @error('usuario_id') form-control-warning @enderror">
                                <option value="">Seleccione un ejecutivo</option>
                                @foreach ($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}" {{ old('usuario_id') == $usuario->id ? 'selected' : '' }}>{{ $usuario->nombre }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted"> Elegir el ejecutivo que se encargara del cliente. </small>
                            @error('usuario_id')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select name="estado" id="estado" class="form-control" value="{{ old('estado') }}" required>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Contratos <span class="text-danger">*</span></label>
                            <div class="row">
                                @foreach ($contratos as $contrato)
                                    <div class="col-md-6">
                                        <input class="px-2" type="checkbox" name="contrato[]" value="{{ $contrato->id }}" id="contrato_{{ $contrato->id }}" class="form-check-input @error('contrato[]') form-control-warning @enderror">
                                        @error('contrato[]')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                        <label for="contrato_{{ $contrato->id }}" class="form-check-label">{{ $contrato->nombre }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <small class="text-muted">Marque el tipo de contrato.</small>
                            <div id="error-contrato" class="text-danger" style="display: none;">Debe seleccionar al menos una opción.</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="url_instagram">Link Instagram </label>
                                    <input type="text" name="url_instagram" id="url_instagram"
                                        class="form-control @error('url_instagram') form-control-warning @enderror"
                                        required>
                                    <small class="text-muted"> Eje: https://www.instagram.com </small>
                                    @error('url_instagram')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="url_facebook">Link Facebook </label>
                                    <input type="text" name="url_facebook" id="url_facebook"
                                        class="form-control @error('url_facebook') form-control-warning @enderror"
                                        required>
                                    <small class="text-muted"> Eje: https://www.facebook.com </small>
                                    @error('url_facebook')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="url_youtube">Link Youtube </label>
                                    <input type="text" name="url_youtube" id="url_youtube"
                                        class="form-control @error('url_youtube') form-control-warning @enderror"
                                        required>
                                    <small class="text-muted"> Eje: https://www.youtube.com</small>
                                    @error('url_youtube')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary col-12">Siguiente</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-5 text-center" style="background-color: #004EA4; height: 853px !important; ">
                    <img src="{{ asset('vendors/images/Logo_Himalaya_blanco-10.png') }}" alt="logo_himalaya"
                        class="mt-15">
                </div>
            </div>
        </div>
    {{-- No JS extra necesario, se eliminó la lógica de servicios relacionados y fee --}}
    @push('JS')
        <script>
            // Validación del formulario antes de enviar
            document.querySelector('form').addEventListener('submit', function(event) {
                const checkboxes = document.querySelectorAll('input[name="contrato[]"]');
                let checked = false;
                checkboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        checked = true;
                    }
                });
                if (!checked) {
                    event.preventDefault();
                    document.getElementById('error-contrato').style.display = 'block';
                } else {
                    document.getElementById('error-contrato').style.display = 'none';
                }
            });
        </script>
    @endpush
    @endsection