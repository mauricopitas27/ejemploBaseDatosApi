@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white" id="app" @click="trackClick" @mousemove="trackMouseMove">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-blue-600 to-purple-600 text-white py-20">
        <div class="max-w-6xl mx-auto px-4 flex items-center justify-between">
            <div class="w-1/2">
                <h1 class="text-5xl font-bold mb-4">Moda Premium para Ti</h1>
                <p class="text-xl mb-6">Descubre nuestra colección exclusiva de ropa de alta calidad</p>
                <button class="bg-white text-blue-600 px-8 py-3 rounded-lg font-bold hover:bg-gray-100" data-elemento="btn-comprar-hero">
                    Comprar Ahora
                </button>
            </div>
            <div class="w-1/2">
                <img src="https://via.placeholder.com/400x300?text=Ropa+Premium" alt="Colección" class="rounded-lg">
            </div>
        </div>
    </section>

    <!-- Servicios -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12">Nuestros Servicios</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-lg text-center" data-elemento="servicio-envio">
                    <img src="https://via.placeholder.com/100?text=Envio" alt="Envío" class="mx-auto mb-4">
                    <h3 class="text-2xl font-bold mb-2">Envío Gratis</h3>
                    <p class="text-gray-600">Envío gratuito en compras mayores a $50</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg text-center" data-elemento="servicio-calidad">
                    <img src="https://via.placeholder.com/100?text=Calidad" alt="Calidad" class="mx-auto mb-4">
                    <h3 class="text-2xl font-bold mb-2">Garantía de Calidad</h3>
                    <p class="text-gray-600">100% algodón y materiales premium</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg text-center" data-elemento="servicio-soporte">
                    <img src="https://via.placeholder.com/100?text=Soporte" alt="Soporte" class="mx-auto mb-4">
                    <h3 class="text-2xl font-bold mb-2">Soporte 24/7</h3>
                    <p class="text-gray-600">Atención al cliente disponible siempre</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Productos Destacados -->
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12">Productos Destacados</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @php
                    $productos = [
                        ['nombre' => 'Camiseta Clásica', 'precio' => 29.99, 'imagen' => 'https://via.placeholder.com/250x300?text=Camiseta'],
                        ['nombre' => 'Pantalón Denim', 'precio' => 49.99, 'imagen' => 'https://via.placeholder.com/250x300?text=Pantalon'],
                        ['nombre' => 'Chaqueta Elegante', 'precio' => 89.99, 'imagen' => 'https://via.placeholder.com/250x300?text=Chaqueta'],
                        ['nombre' => 'Vestido Casual', 'precio' => 59.99, 'imagen' => 'https://via.placeholder.com/250x300?text=Vestido'],
                    ];
                @endphp
                @foreach($productos as $producto)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition" data-elemento="producto-{{ $loop->index }}">
                    <img src="{{ $producto['imagen'] }}" alt="{{ $producto['nombre'] }}" class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-bold mb-2">{{ $producto['nombre'] }}</h3>
                        <p class="text-2xl font-bold text-blue-600 mb-4">${{ $producto['precio'] }}</p>
                        <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700" data-elemento="btn-carrito-{{ $loop->index }}">
                            Agregar al Carrito
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contacto -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-4">¿Preguntas?</h2>
            <p class="text-xl text-gray-600 mb-8">Contáctanos en info@moda.com o llama al 1-800-MODA</p>
            <button class="bg-blue-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-700" data-elemento="btn-mensaje">
                Enviar Mensaje
            </button>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
const { createApp } = Vue;

createApp({
    data() {
        return {
            lastMouseMove: 0,
            mouseThrottle: 5000 // Rastrear cada 5 segundos
        }
    },
    mounted() {
        this.trackPageEntry();
    },
    methods: {
        async trackPageEntry() {
            await this.sendTracking({
                tipo_movimiento: 1,
                elementos_involucrados: 'landing_page'
            });
        },
        trackClick(event) {
            const elemento = event.target.closest('[data-elemento]');
            if (elemento) {
                this.sendTracking({
                    tipo_movimiento: 2,
                    elementos_involucrados: elemento.getAttribute('data-elemento')
                });
            }
        },
        trackMouseMove(event) {
            const now = Date.now();
            if (now - this.lastMouseMove > this.mouseThrottle) {
                this.lastMouseMove = now;
                const elemento = document.elementFromPoint(event.clientX, event.clientY);
                const dataElement = elemento?.closest('[data-elemento]');
                
                this.sendTracking({
                    tipo_movimiento: 3,
                    elementos_involucrados: dataElement?.getAttribute('data-elemento') || 'general'
                });
            }
        },
        async sendTracking(data) {
            try {
                await axios.post('/api/track-user', {
                    ip_usuario: await this.getClientIP(),
                    tipo_movimiento: data.tipo_movimiento,
                    origen: window.location.href,
                    elementos_involucrados: data.elementos_involucrados,
                    fecha_hora: new Date().toISOString()
                });
            } catch (error) {
                console.error('Error al rastrear:', error);
            }
        },
        async getClientIP() {
            try {
                const response = await axios.get('https://api.ipify.org?format=json');
                return response.data.ip;
            } catch {
                return 'unknown';
            }
        }
    }
}).mount('#app');
</script>

@endsection