
<div class="container">
    <h1>Listado de Matrículas</h1>

    @if(isset($matriculas) && $matriculas->isEmpty())
        <div class="alert alert-info">No hay registros de matrículas.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Alumno ID</th>
                     <th>Nombre</th>
                     <th>Apellidos</th>
                    <th>E-mail</th>
                    <th>Carrera</th>
                    <th>Matrícula</th>
                </tr>
            </thead>
            <tbody>
                @foreach($matriculas as $matricula)
                <tr>
                    <td>{{ $matricula->alumno_id }}</td>
                    <td>{{ $matricula->alumno->nombre}}</td>
                    <td>{{ $matricula->alumno->apellidos}}</td>
                    <td>{{ $matricula->alumno->email}}</td>
                    <td>{{ $matricula->carrera }}</td>
                    <td>{{ $matricula->matricula }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if(isset($matriculas) && method_exists($matriculas, 'links'))
            <div class="d-flex justify-content-center">
                {{ $matriculas->links() }}
            </div>
        @endif
    @endif
</div>
