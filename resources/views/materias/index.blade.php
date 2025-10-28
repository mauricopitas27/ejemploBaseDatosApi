
<div class="container">
    <h1>Listado de Matrículas</h1>

    @if(isset($materia) && $materias->isEmpty())
        <div class="alert alert-info">No hay registros de matrículas.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>materia</th>
                     <th>Nombre</th>
                     <th>carrera</th>
                    <th>creditos</th>
                    <th>inscritos</th>
                </tr>
            </thead>
            <tbody>
                @forelse($materias as $materia)
                <tr>
                    <td>{{ $materia->id }}</td>
                    <td>{{ $materia->nombre}}</td>
                    <td>{{ $materia->carrera}}</td>
                    <td>{{ $materia->creditos}}</td>
                    <td>{{ $materia->inscritos}}</td>
                    <td>
                        @forelse($materia->alumno as $alumno)
                             {{ $alumno->nombre}} : {{ $alumno->apellido }}
                        @empty
                            No hay materias registradas.
                        @endforelse</td>
                @empty
                    No hay teléfonos registrados.
                </tr>
                @endforelse
            </tbody>
            </tr>
        </table>

        @if(isset($alumno) && method_exists($alumnos, 'links'))
            <div class="d-flex justify-content-center">
                {{ $alumnos->links() }}
            </div>
        @endif
    @endif
</div>
