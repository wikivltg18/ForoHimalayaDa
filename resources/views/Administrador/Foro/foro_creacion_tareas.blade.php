@extends('Administrador.layout_admin')

@section('template-blank-development')
    @push('CSS')
        <style>
            .text-title {
                font-weight: 500
            }

            .text-primary {
                color: #15baee !important;
            }

            .vertical-line {
                width: 1px;
                /* Grosor de la línea */
                height: 110px;
                /* Altura de la línea */
                background-color: #ccc;
                /* Color de la línea */
                margin: 0 20px;
            }
        </style>
    @endpush
    <div class="container-fluid">
        <h6 class="text-title">Especifiación de la tarea</h6>
        <hr>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <p><span class="px-1 text-danger">*</span>Nombre del proyecto</p>
                    <select class="pt-5 custom-select2 form-control" name="state" style="width: 100%; height: 38px;">
                        <option value="" selected disabled>Escribe el nombre del proyecto o el # OT</option>
                        <!-- Placeholder -->
                        <optgroup label="Nombre del proyecto">
                            <option value="HI">Hawaii</option>
                        </optgroup>
                        <optgroup label="Nombre de la OT">
                            <option value="CA">#233-442</option>
                            <option value="NV">#123-231</option>
                            <option value="OR">#423-123</option>
                            <option value="WA">#767-231</option>
                        </optgroup>
                        {{-- <optgroup label="Mountain Time Zone">
                            <option value="AZ">Arizona</option>
                            <option value="CO">Colorado</option>
                            <option value="ID">Idaho</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NM">New Mexico</option>
                            <option value="ND">North Dakota</option>
                            <option value="UT">Utah</option>
                            <option value="WY">Wyoming</option>
                        </optgroup> --}}
                    </select>
                </div>
                <div class="mt-5 col-md-6">
                    <ul>
                        <li class="pb-3"><strong class="pb-2 text-primary">Numero de OT:</strong>1234-234</li>
                        <li class="pb-3"><strong class="text-primary">Ejecutiva:</strong>Victor</li>
                        <li class="pb-3"><strong class="text-primary">Fecha de solicitud:</strong>No sé</li>
                    </ul>
                </div>
                <div class="mt-5 vertical-line"></div>
                <div class="mt-5 col-md-5">
                    <ul>
                        <li class="pb-3"><strong class="text-primary">Proyecto:</strong> </li>
                        <li class="pb-5"><strong class="text-primary">Cliente:</strong></li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <label for="">Tareas recurrentes</label>
                    <div class="container">
                        <div class="pb-4 row">
                            <div class="pr-2 mb-5 custom-control custom-radio ">
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio1">Si</label>
                            </div>
                            <div class="mb-5 custom-control custom-radio ">
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio1">No</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for=""><span class="text-danger">*</span>Prioridad</label>
                        <select name="" id="" class="form-control">
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="form-group">
                        <label for=""><span class="text-danger">*</span>Area</label>
                        <select class="pt-5 custom-select2 form-control" name="state" style="width: 100%; height: 38px;">
                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                <option value="AK">Alaska</option>
                                <option value="HI">Hawaii</option>
                            </optgroup>
                            <optgroup label="Pacific Time Zone">
                                <option value="CA">California</option>
                                <option value="NV">Nevada</option>
                                <option value="OR">Oregon</option>
                                <option value="WA">Washington</option>
                            </optgroup>
                            <optgroup label="Mountain Time Zone">
                                <option value="AZ">Arizona</option>
                                <option value="CO">Colorado</option>
                                <option value="ID">Idaho</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NM">New Mexico</option>
                                <option value="ND">North Dakota</option>
                                <option value="UT">Utah</option>
                                <option value="WY">Wyoming</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label for=""><span class="text-danger">*</span>Fase de proyecto</label>
                        <select class="pt-5 custom-select2 form-control" name="state" style="width: 100%; height: 38px;">
                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                <option value="AK">Alaska</option>
                                <option value="HI">Hawaii</option>
                            </optgroup>
                            <optgroup label="Pacific Time Zone">
                                <option value="CA">California</option>
                                <option value="NV">Nevada</option>
                                <option value="OR">Oregon</option>
                                <option value="WA">Washington</option>
                            </optgroup>
                            <optgroup label="Mountain Time Zone">
                                <option value="AZ">Arizona</option><i class="fa fa-xing" aria-hidden="true"></i>
                                <option value="CO">Colorado</option>
                                <option value="ID">Idaho</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NM">New Mexico</option>
                                <option value="ND">North Dakota</option>
                                <option value="UT">Utah</option>
                                <option value="WY">Wyoming</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><span class="text-danger">*</span>Fecha ideal de entrega</label>
                        <input class="form-control date-picker" placeholder="Fecha fin" type="text">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label for=""><span class="text-danger">*</span>Nombre de la solicitud</label>
                        <input class="form-control" placeholder="Solicitud " type="text">
                    </div>
                </div>
                <div class="form-group col-12">
                    <label for=""><span class="text-danger">*</span>Descripción</label>
                    <br>
                    <textarea class="textarea_editor form-control border-radius-0" placeholder="Enter text ..."></textarea>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for=""><span class="text-danger">*</span>Ruta del server</label>
                        <textarea name="" id="" class="form-control" placeholder="Ruta del server..."></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for=""><span class="text-danger">*</span>Estado</label>
                        <select name="" id="" class="form-control">
                            <option value="0">Ok</option>
                            <option value="1">Ok</option>
                            <option value="">Ok</option>
                            <option value="">Ok</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for><span class="text-danger">*</span>Tiempo estimado mapa del cliente</label>
                        <input type="text" name="" id="" class="form-control" placeholder="Tiempo mapa del cliente">
                    </div>

                </div>
            </div>
            <div class="button-group d-flex justify-content-center">
                <button class="mx-3 btn btn-success col-3 ">Agregar tarea</button>
                <button class="mx-3 rounded btn btn-primary col-3 ">Publicar tarea</button>
            </div>
        </div>
    </div>
@endsection
