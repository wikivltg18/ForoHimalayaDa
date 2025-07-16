@extends('Administrador.layout_admin')

@section('template-blank-development')
    @push('CSS')
        <link rel="stylesheet" type="text/css" href="{{ url('src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
        <style>
            .button-search {
                background-color: #15BAEE;
                border-color: #15BAEE;
                color: #fff;
                margin-top: 2.0rem;
            }

            .vertical-line {
                width: 1px;
                /* Grosor de la línea */
                height: 100px;
                /* Altura de la línea */
                background-color: #ccc;
                /* Color de la línea */
                margin: 0 20px;
            }

            .button-search {
                background-color: #15BAEE;
                border-color: #15BAEE;
                color: #fff;
                margin-top: 2.0rem;
            }

            .vertical-line {
                width: 1px;
                height: 100px;
                background-color: #ccc;
                margin: 0 20px;
            }

            /* Estilos para agrandar y cambiar el color de las flechas en la tabla con clase .data-table */
            .data-table thead .sorting:before,
            .data-table thead .sorting:after,
            .data-table thead .sorting_asc:before,
            .data-table thead .sorting_asc:after,
            .data-table thead .sorting_desc:before,
            .data-table thead .sorting_desc:after {
                font-size: 18px !important;
                /* Tamaño de las flechas */
                color: white !important;
                /* Color de las flechas */
                opacity: 1;
                /* Asegura que las flechas sean visibles */
            }

            .input-buttom {
                margin-top: 2.0rem;
            }

            .button-weight {
                padding
            }

            /* Clase personalizada para padding horizontal de 7 */

        </style>
    @endpush


    <div class="p-2 pb-20">
        <div class="container-fluid">
            <div class="row">
                <div class="pb-3 col-md-4">
                    <label for="filter-mes">Estados</label>
                    <input type="search" name="" id="" class="form-control" placeholder="Cambiar estado">
                </div>

                <div class="vertical-line"></div>
                <div class="pb-3 col-md-4">
                    {{-- Espacio en blanco para conservar el espacio --}}
                </div>
                <div class="vertical-line"></div>

                <div class="pb-3 col-md-3">
                    <a href="" class="btn btn-success input-buttom col-12">Crear tarea</a>
                </div>


                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-2">
                            <label for="filter-mes">Mes</label>
                            <select id="filter-mes" class="form-control">
                                <option value="">Selecciomne</option>
                                <option value="01">Enero</option>
                                <option value="02">Febrero</option>
                                <option value="03">Marzo</option>
                                <option value="04">Abril</option>
                                <option value="05">Mayo</option>
                                <option value="06">Junio</option>
                                <option value="07">Julio</option>
                                <option value="08">Agosto</option>
                                <option value="09">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                                <!-- Agrega los demás meses -->
                            </select>
                        </div>
                        <div class="col-md-1">
                            <label for="">Año</label>
                            <select name="" id=""class="form-control">
                                <option value="">Seleccion..</option>
                                <option value="">2020</option>
                                <option value="">2023</option>
                                <option value="">2024</option>
                                <option value="">2025</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <a href="" class="btn btn-primary button-search"
                                style="background-color:#15BAEE; border-color: #15BAEE">Buscar</a>
                        </div>
                        <div class="vertical-line"></div>
                        <div class="col-md-4">
                            <label for="">Buscar: </label>
                            <input type="search" class="form-control">
                        </div>
                        <div class="vertical-line"></div>
                        <div class="col-md-3 input-buttom">
                            <div class="row">
                                <spam class="px-2 mt-2">Mostrar</spam>
                                <select name="" id="" class="form-control col-3">
                                    <option value="">10</option>
                                    <option value="1">25</option>
                                    <option value="2">50</option>
                                    <option value="3">100</option>
                                </select>
                                <span class="px-2 mt-2">registros</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <table class="table data-table stripe hover nowrap">
        <thead class="text-center" style="color:white; background-color: #002E60">
            <tr>
                <th class="table-plus datatable-nosort">OT</th>
                <th>Cliente</th>
                <th>Requerimiento</th>
                <th>Prioridad</th>
                <th>Fecha de solicitud</th>
                <th>Fecha de entrega cuentas</th>
                <th>Fecha de entrega al cliente</th>
                <th>Estado</th>
                <th>Encargado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($perfomans as $perfoman)
            <tr class="text-center">
                <td class="table-plus">{{ $perfoman->ots->referencia }}</td>
                <td>{{$perfoman->ots->clientes->nombre }}</td>
                <td>{{ $perfoman->ots->nombre }}</td>
                <td>Alto</td>
                <td>{{ $perfoman->created_at }}</td>
                <td>{{ $perfoman->fecha_entrega_cuentas }}</td>
                <td>{{ $perfoman->fecha_entrega_cliente }}</td>
                <td>
                    @switch($perfoman->estados->id)
                    @case(1)
                    <span class="badge badge-success"> {{ $perfoman->estados->nombre }}</span>
                    @break
                    @case(2)
                    <span class="badge badge-primary"> {{ $perfoman->estados->nombre }}</span>
                    @break
                    @case(3)
                    <span class="badge badge-info"> {{ $perfoman->estados->nombre }}</span>
                    @break
                    @case(4)
                    <span class="badge badge-warning"> {{ $perfoman->estados->nombre }}</span>
                    @break
                    @case(5)
                    <span class="badge badge-warning"> {{ $perfoman->estados->nombre }}</span>
                    @break
                    @case(6)
                    <span class="badge badge-info"> {{ $perfoman->estados->nombre }}</span>
                    @break
                    @case(7)
                    <span class="badge badge-warning"> {{ $perfoman->estados->nombre }}</span>
                    @break
                    @default
                        <span class="badge badge-info">No se ha encontrado ningun estado</span>
                    @endswitch
                </td> -
                <td>{{ $perfoman->users->nombre ?? 'No se encontro el usuario relacionado'}}</td>
                <td>
                    <a class="btn btn-primary" href=""><i class="icon-copy fa fa-eye"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    @push('JS')
        <script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
        <script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
        <script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
        <script src="vendors/scripts/datatable-setting.js"></script>
        </body>
    @endpush
@endsection
