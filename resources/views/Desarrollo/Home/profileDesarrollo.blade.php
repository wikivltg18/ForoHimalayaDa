@extends('Desarrollo.layout_desarrollo')

@section('template-blank-development')
    @push('CSS')

        <head>
            <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/core.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icon-font.min.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css') }}">
        </head>
        <style>
            .general-container {
                background-color: transparent !important;
                box-shadow: none !important;
                padding: 0px;
            }

            .btn-primary {
                background-color: #15baee !important;
                border-color: #15baee !important;
                color: #ffff !important;
                font-weight: bolder !important;
            }

            .btn-primary:hover {
                background-color: #004EA4 !important;
                color: #ffff !important;
                border-color: #004EA4 !important: font-weight: bolder !important;
            }
        </style>
    @endpush

@section('button-press')
    <a class="btn btn-primary" href="{{ route('Usuarios') }}"> Interfaz de usuarios</a>
@endsection

<div class="row">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
        <div class="pd-20 card-box height-100-p">
            <div class="profile-photo">
                <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i
                        class="fa fa-pencil"></i></a>
                <img src="{{ asset('vendors/images/photo1.jpg') }}" alt="" class="avatar-photo">
                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="{{ route('image.update') }}" enctype="multipart/form-data" method="POST">
                                <div class="modal-body pd-5">
                                    <div class="img-container">
                                        @csrf
                                        @method('PUT')
                                        <img id="image"
                                            src="
                                                {{ asset($userAuthenticate->img_perfil ? 'storage/images/' . $userAuthenticate->img_perfil : 'vendors/images/default.png') }}"
                                            alt="Picture" enctype="multipart/form-data">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="file" name="image" class="mt-3 form-control">
                                    <input type="submit" value="Update" class="btn btn-primary">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="mb-0 text-center h5">{{ $userAuthenticate->nombre }} {{ $userAuthenticate->apellido }}</h5>
            <p class="text-center text-muted font-14">{{ $userAuthenticate->cargo }}</p>
            <div class="profile-info">
                <h5 class="mb-20 h5 text-blue">Información de contacto</h5>
                <ul>
                    <li>
                        <span>Dirección de correo electrónico:</span>
                        {{ $userAuthenticate->email ?? '¡No es posible encontrar un correo electronico!' }}
                    </li>
                    <li>
                        <span>Número de teléfono:</span>
                        {{ $userAuthenticate->telefono ?? '¡Agrega un número de telefono!' }}
                    </li>
                    <li>
                        <span>Fecha de nacimiento:</span>
                        {{ $userAuthenticate->fecha_nacimiento ?? '¡No es posible encontrar un correo electronico!' }}
                    </li>
                    <li>
                        <span>Número de referencia:</span>
                        {{ $userAuthenticate->telefono_referencia }}
                    </li>
                    <li>
                        <span>Dirección:</span>
                        {{ $userAuthenticate->direccion ?? '¡Agrega tu dirección!' }}
                    </li>
                    <li>
                        <span>Rol:</span>
                        {{ $userAuthenticate->rol->nombre ?? '¡No es posible encontrar el rol especificado!.' }}
                    </li>
                    <li>
                        <span>Area asignada:</span>
                        {{ $userAuthenticate->area->nombre ?? '¡No es posible encontrar el area asignada!.' }}
                    </li>
                </ul>
            </div>
            <div class="profile-skills">
                <h5 class="mb-20 h5 text-blue">Habilidades clave</h5>
                <h6 class="mb-5 font-14">HTML</h6>
                <div class="mb-20 progress" style="height: 6px;">
                    <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="0" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
                <h6 class="mb-5 font-14">Css</h6>
                <div class="mb-20 progress" style="height: 6px;">
                    <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="0" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
                <h6 class="mb-5 font-14">jQuery</h6>
                <div class="mb-20 progress" style="height: 6px;">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="0" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
                <h6 class="mb-5 font-14">Bootstrap</h6>
                <div class="mb-20 progress" style="height: 6px;">
                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="0" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
        <div class="overflow-hidden card-box height-100-p">
            <div class="profile-tab height-100-p">
                <div class="tab height-100-p">
                    <ul class="nav nav-tabs customtab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#timeline"
                                role="tab">Timeline</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tasks" role="tab">Tasks</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#setting" role="tab">Settings</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="timeline" role="tabpanel">
                            <div class="pd-20">
                                <div class="profile-timeline">
                                    <div class="timeline-month">
                                        <h5>August, 2020</h5>
                                    </div>
                                    <div class="profile-timeline-list">
                                        <ul>
                                            <li>
                                                <div class="date">12 Aug</div>
                                                <div class="task-name"><i class="ion-android-alarm-clock"></i> Task
                                                    Added</div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                <div class="task-time">09:30 am</div>
                                            </li>
                                            <li>
                                                <div class="date">10 Aug</div>
                                                <div class="task-name"><i class="ion-ios-chatboxes"></i> Task Added
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                <div class="task-time">09:30 am</div>
                                            </li>
                                            <li>
                                                <div class="date">10 Aug</div>
                                                <div class="task-name"><i class="ion-ios-clock"></i> Event Added</div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                <div class="task-time">09:30 am</div>
                                            </li>
                                            <li>
                                                <div class="date">10 Aug</div>
                                                <div class="task-name"><i class="ion-ios-clock"></i> Event Added</div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                <div class="task-time">09:30 am</div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="timeline-month">
                                        <h5>July, 2020</h5>
                                    </div>
                                    <div class="profile-timeline-list">
                                        <ul>
                                            <li>
                                                <div class="date">12 July</div>
                                                <div class="task-name"><i class="ion-android-alarm-clock"></i> Task
                                                    Added</div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                <div class="task-time">09:30 am</div>
                                            </li>
                                            <li>
                                                <div class="date">10 July</div>
                                                <div class="task-name"><i class="ion-ios-chatboxes"></i> Task Added
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                <div class="task-time">09:30 am</div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="timeline-month">
                                        <h5>June, 2020</h5>
                                    </div>
                                    <div class="profile-timeline-list">
                                        <ul>
                                            <li>
                                                <div class="date">12 June</div>
                                                <div class="task-name"><i class="ion-android-alarm-clock"></i> Task
                                                    Added</div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                <div class="task-time">09:30 am</div>
                                            </li>
                                            <li>
                                                <div class="date">10 June</div>
                                                <div class="task-name"><i class="ion-ios-chatboxes"></i> Task Added
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                <div class="task-time">09:30 am</div>
                                            </li>
                                            <li>
                                                <div class="date">10 June</div>
                                                <div class="task-name"><i class="ion-ios-clock"></i> Event Added</div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                <div class="task-time">09:30 am</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tasks" role="tabpanel">
                            <div class="pd-20 profile-task-wrap">
                                <div class="container pd-0">
                                    <div class="profile-task-list pb-30">

                                    </div>
                                    <div class="profile-task-list close-tasks">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for=""><span class="text-danger"
                                                            value={{ $userAuthenticate->nombre }}>*</span>Nombres:
                                                    </label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for=""><span class="text-danger">*</span>Apellidos:
                                                    </label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for=""><span class="text-danger">*</span>Número de
                                                        teléfono: </label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for=""><span class="text-danger">*</span>Número de
                                                        referencia: </label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for=""><span class="text-danger">*</span>Dirección:
                                                    </label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for=""><span class="text-danger">*</span>Dirección:
                                                    </label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for=""><span class="text-danger">*</span>Fecha de
                                                        nacimiento: </label>
                                                    <input type="date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <button class="btn btn-success col-12">Actualizar datos</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade customscroll" id="task-add" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Tasks Add</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close" data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="Close Modal">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body pd-0">
                                                    <div class="task-list-form">
                                                        <ul>
                                                            <li>
                                                                <form>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-4">Task Type</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-4">Task Message</label>
                                                                        <div class="col-md-8">
                                                                            <textarea class="form-control"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-4">Assigned to</label>
                                                                        <div class="col-md-8">
                                                                            <select class="selectpicker form-control"
                                                                                data-style="btn-outline-primary"
                                                                                title="Not Chosen" multiple=""
                                                                                data-selected-text-format="count"
                                                                                data-count-selected-text= "{0} people selected">
                                                                                <option>Ferdinand M.</option>
                                                                                <option>Don H. Rabon</option>
                                                                                <option>Ann P. Harris</option>
                                                                                <option>Katie D. Verdin</option>
                                                                                <option>Christopher S. Fulghum</option>
                                                                                <option>Matthew C. Porter</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-0 form-group row">
                                                                        <label class="col-md-4">Due Date</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text"
                                                                                class="form-control date-picker">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;" class="remove-task"
                                                                    data-toggle="tooltip" data-placement="bottom"
                                                                    title=""
                                                                    data-original-title="Remove Task"><i
                                                                        class="ion-minus-circled"></i></a>
                                                                <form>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-4">Task Type</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-4">Task Message</label>
                                                                        <div class="col-md-8">
                                                                            <textarea class="form-control"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-4">Assigned to</label>
                                                                        <div class="col-md-8">
                                                                            <select class="selectpicker form-control"
                                                                                data-style="btn-outline-primary"
                                                                                title="Not Chosen" multiple=""
                                                                                data-selected-text-format="count"
                                                                                data-count-selected-text= "{0} people selected">
                                                                                <option>Ferdinand M.</option>
                                                                                <option>Don H. Rabon</option>
                                                                                <option>Ann P. Harris</option>
                                                                                <option>Katie D. Verdin</option>
                                                                                <option>Christopher S. Fulghum</option>
                                                                                <option>Matthew C. Porter</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-0 form-group row">
                                                                        <label class="col-md-4">Due Date</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text"
                                                                                class="form-control date-picker">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="add-more-task">
                                                        <a href="#" data-toggle="tooltip"
                                                            data-placement="bottom" title=""
                                                            data-original-title="Add Task"><i
                                                                class="ion-plus-circled"></i> Add More Task</a>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary">Add</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @push('JS')

                            <head>
                                <script src="{{ asset('vendors/scripts/core.js') }}"></script>
                                <script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
                                <script src="{{ asset('vendors/scripts/process.js') }}"></script>
                                <script src="{{ asset('vendors/scripts/layout-settings.js') }}"></script>
                            </head>
                        @endpush
                    @endsection
