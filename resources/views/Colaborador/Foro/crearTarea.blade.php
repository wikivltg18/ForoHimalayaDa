@extends('Administrador.layout_colaborador')


@section('template-blank-development')

<div class="container-fluid">
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="sh-tarea"><span class="text-danger">*</span> Nombre del proyecto</label>
                            <select name="proyecto_id" id="search" class="custom-select2 form-control" style="width: 100%;"></select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="recurrente"><span class="text-danger">*</span> ¿La tarea es recurrente?</label>
                            <select name="recurrente" id="recurrente" class="form-control">
                                <option value="">Seleccione la recurrencia...</option>
                                <option value="1">La tarea es recurrente</option>
                                <option value="0">La tarea no es recurrente</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 recurrencia-campos" style="display: none;">
                        <div class="form-group">
                            <label for="fecha_inicio"><span class="text-danger">*</span> Fecha inicio recurrencia</label>
                            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio">
                            <small class="text-muted">Fecha inicio de la tarea recurrente</small>
                        </div>
                    </div>
                    <div class="col-md-6 recurrencia-campos" style="display: none;">
                        <div class="form-group">
                            <label for="fecha_fin"><span class="text-danger">*</span> Fecha fin recurrencia</label>
                            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin">
                            <small class="text-muted">Fecha final de la tarea recurrente</small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="prioridad"><span class="text-danger">*</span> Prioridad</label>
                            <select name="prioridad" id="prioridad" class="form-control"></select>
                            <small class="text-muted">Tipo de prioridad de la tarea.</small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="area"><span class="text-danger">*</span> Seleccione el área para esta tarea</label>
                            <select name="area" id="area" class="form-control"></select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fase"><span class="text-danger">*</span> Fase del proyecto</label>
                            <select name="fase" id="fase" class="form-control"></select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="fase"><span class="text-danger">*</span> Fase del proyecto</label>
                        <select name="fase" id="fase" class="form-control"></select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fase"><span class="text-danger">*</span> Fecha Ideal entrega cliente</label>
                            <input type="date" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fase"><span class="text-danger">*</span> Nombre de la Solicitud </label>
                            <input type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fase"><span class="text-danger">*</span> Descripción</label>
                            <textarea class="textarea_editor form-control border-radius-0" placeholder="Enter text ..."></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Aquí puedes agregar más contenido en el futuro si es necesario -->
            </div>
        </div>
    </form>
</div>

@push('JS')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const selectRecurrente = document.getElementById("recurrente");
        const camposRecurrencia = document.querySelectorAll(".recurrencia-campos");

        selectRecurrente.addEventListener("change", function () {
            if (this.value === "1") {
                camposRecurrencia.forEach(el => el.style.display = "block"); // Mostrar
            } else {
                camposRecurrencia.forEach(el => el.style.display = "none"); // Ocultar
            }
        });

        if (!selectRecurrente.value || selectRecurrente.value === "0") {
            camposRecurrencia.forEach(el => el.style.display = "none");
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#search').select2({
            language: {
                noResults: function() {
                    return "No se encontraron resultados";
                },
                searching: function() {
                    return "Buscando...";
                },
                inputTooShort: function() {
                    return "Escribe al menos 1 caracter...";
                }
            },
            placeholder: "Ingrese el nombre del proyecto o el número de OT",
            minimumInputLength: 1, // Busca solo si hay al menos 2 caracteres
            ajax: {
                url: "{{ route('homework.search') }}", // Ruta en Laravel
                dataType: 'json',
                data: function(params) {
                    return { q: params.term }; // Enviar la consulta
                },
                processResults: function(data) {
                    return {
                        results: data.map(function(item) {
                            return {
                                id: item.id,
                                text: `#${item.referencia} - ${item.nombre}`
                            };
                        })
                    };
                }
            }
        });

        // Mantener el diseño del select original
        $('.custom-select2').css({
            'border': '1px solid #ced4da',
            'border-radius': '5px',
            'padding': '0.375rem 0.75rem',
            'background-color': '#fff',
            'font-size': '14px'
        });

        // Capturar selección sin modificar el estilo
        $('#search').on('select2:select', function(e) {
            var data = e.params.data;
            console.log("Proyecto seleccionado:", data);
        });
    });


</script>
@endpush



@endsection
