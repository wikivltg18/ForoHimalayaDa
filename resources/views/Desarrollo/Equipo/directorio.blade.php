@extends('Desarrollo.layout_desarrollo')

@section('template-blank-development')
    @push('CSS')
        <link rel="stylesheet" type="text/css" href="{{ url('src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">

        <style>
            .general-container {
                background-color: transparent !important;
                padding: 0px !important;
            }

            .btn-secondary {
                background-color: #15baee !important;
                border-color: #15baee !important;
            }

            .btn-secondary:hover {
                background-color: #15baee !important;
            }

            .color-header-table {
                background-color: #004EA4 !important;
                color: #fff !important;
            }

            .dw {
                color: white !important;
            }

            .table-plus::before,
            .table-plus::after {
                color: #ffff !important;
                font-size: medium !important;
            }

            .data-table-usuario thead tr th:first-child {
                border-top-left-radius: 10px;
                border-bottom-left-radius: 10px;
            }

            .data-table-usuario thead tr th:last-child {
                border-top-right-radius: 10px !important;
                border-bottom-right-radius: 10px !important;
            }

            label {
                color: white;
            }

            .contact-directory-box .contact-name,
            .contact-directory-box .contact-skill {
                padding-bottom: 25px;
            }
        </style>
    @endpush
<div class="container">
    <h2 class="text-white">Directorio de Usuarios</h2>

    {{-- Filtro por área --}}
    <form method="GET" action="{{ route($nameRoute) }}">
        <div class="form-group">
            <label for="areasFilter">Filtrar por Área:</label>
            <select name="areasFilter" id="areasFilter" class="form-control" onchange="this.form.submit()">
                <option value="">Todas las áreas</option>
                @foreach ($areas as $area)
                    <option value="{{ $area->id }}" {{ request('areasFilter') == $area->id ? 'selected' : '' }}>
                        {{ $area->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    {{-- Buscador AJAX --}}
    <input type="text" id="search" class="my-3 form-control" placeholder="Buscar por nombre o email">

    <div id="usuarios-list">
        @foreach ($usuarios as $usuario)
            <div class="mb-2 card">
                <div class="card-body">
                    <h5>{{ $usuario->nombre }}</h5>
                    <p>{{ $usuario->email }}</p>
                    <small>Área: {{ $usuario->areas->nombre ?? 'No asignada' }}</small>
                </div>
            </div>
        @endforeach

        {{-- Paginación --}}
        <div class="mt-3">
            {{ $usuarios->links() }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.getElementById('search').addEventListener('input', function() {
    let query = this.value;

    fetch(`{{ route($nameRoute) }}?search=${query}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('usuarios-list').innerHTML = data.html;
    });
});
</script>
@endsection