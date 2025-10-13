<form action="{{ route('productos.store') }}" method="POST">
    @csrf
    <div>
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" required>
    </div>
    <div>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" required>
    </div>
    <div>
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" required>
    </div>
    <div>
        <label for="categorias">Categorías:</label>
        <select id="categorias" name="categorias" required>
            <option value="">Seleccione una categoría</option>
            <option value="electronica">Electrónica</option>
            <option value="ropa">Ropa</option>
            <option value="hogar">Hogar</option>
            <option value="otros">Otros</option>
        </select>
    </div>
    <button type="submit">Guardar</button>
</form>