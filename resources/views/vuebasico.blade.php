<!DOCTYPE html>
<html>
<head>
    <title>Vue.js Basic Sum</title>
    <!-- Vue.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>;
</head>
<body>
    <div id="app">
        <input type="text" v-model="nombre" placeholder="Escribe tu nombre">
        <br>    
        <input type="number" v-model="numero1" placeholder="Primer número">
        <br>
        <input type="number" v-model="numero2" placeholder="Segundo número">
        <br>
        <button @click="sumar">Sumar</button>
        <br>
        <label>Hola @{{ nombre }}</label>
        <label>Resultado: @{{ resultado }}</label>

    </div>

    <script>
        new Vue({
            el: '#app',
            data: {
                numero1: 0,
                numero2: 0,
                resultado: 0,
                nombre: ''
            },
            methods: {
                sumar() {
                    this.resultado = parseFloat(this.numero1) + parseFloat(this.numero2);
                }
            }
        });
    </script>
</body>
</html>