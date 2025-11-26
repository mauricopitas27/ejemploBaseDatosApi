<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Listado de alumnos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div id="app" class="container py-4">
    <h1 class="mb-4">Listado de alumnos</h1>

    <div class="mb-3">
        <button class="btn btn-primary" @click="fetchAlumnos" :disabled="loading">
            @{{ loading ? 'Actualizando...' : 'Actualizar lista' }}
        </button>
    </div>

    <div v-if="error" class="alert alert-danger">
        Error: @{{ error }}
    </div>

    <table class="table table-striped" v-if="alumnos.length">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Edad</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="alumno in alumnos" :key="alumno.id">
                <td>@{{ alumno.id }}</td>
                <td>@{{ alumno.nombre }}</td>
                <td>@{{ alumno.apellido }}</td>
                <td>@{{ alumno.email }}</td>
                <td>@{{ alumno.edad }}</td>
            </tr>
        </tbody>
    </table>

    <div v-else class="text-muted">
        No hay alumnos cargados. Presiona "Actualizar lista" para obtenerlos.
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
new Vue({
    el: '#app',
    data: {
        alumnos: [],
        loading: false,
        error: null
    },
    methods: {
        fetchAlumnos() {
            this.loading = true;
            this.error = null;
            // Ajusta la URL según tu endpoint real
            axios.get('/api/alumnos')
                .then(response => {
                    // Si tu API devuelve { data: [...] } manejamos ambos casos
                    const payload = response.data;
                    this.alumnos = payload.data ? payload.data : payload;
                })
                .catch(err => {
                    this.error = err.response && err.response.data && err.response.data.message
                        ? err.response.data.message
                        : err.message || 'Error al cargar los alumnos';
                })
                .finally(() => {
                    this.loading = false;
                });
        }
    }
});
</script>
</body>
</html>