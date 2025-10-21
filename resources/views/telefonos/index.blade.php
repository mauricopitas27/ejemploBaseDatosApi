
<div class="container">
    <h1>Listado de Matrículas</h1>

    @if(isset($telefonos) && $telefonos->isEmpty())
        <div class="alert alert-info">No hay registros de matrículas.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Alumno ID</th>
                     <th>Nombre</th>
                     <th>Apellidos</th>
                    <th>E-mail</th>
                    <th>tipo</th>
                    <th>telefono</th>
                </tr>
            </thead>
            <tbody>
                @foreach($telefonos as $telefono)
                <tr>
                    <td>{{ $telefono->alumno_id }}</td>
                    <td>{{ $telefono->alumno}}</td>
                    <td>{{ $telefono->alumno}}</td>
                    <td>{{ $telefono->alumno}}</td>
                    <td>{{ $telefono->tipo}}</td>
                    <td>{{ $telefono->numero }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if(isset($telefonos) && method_exists($telefonos, 'links'))
            <div class="d-flex justify-content-center">
                {{ $telefonos->links() }}
            </div>
        @endif
    @endif
</div>
