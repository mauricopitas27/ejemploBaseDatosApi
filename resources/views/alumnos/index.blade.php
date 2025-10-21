
<div class="container">
    <h1>Listado de Matrículas</h1>

    @if(isset($alumno) && $alumnos->isEmpty())
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
                @foreach($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->id }}</td>
                    <td>{{ $alumno->nombre}}</td>
                    <td>{{ $alumno->apellidos}}</td>
                    <td>{{ $alumno->email}}</td>
                    <td>{{ $alumno->matricula->carrera }}</td>
                    <td>{{ $alumno->matricula->matricula }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if(isset($alumno) && method_exists($alumnos, 'links'))
            <div class="d-flex justify-content-center">
                {{ $alumnos->links() }}
            </div>
        @endif
    @endif
</div>
