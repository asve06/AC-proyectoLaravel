<form action="{{ route('pruebas.update', ['prueba' => $prueba->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $prueba->nombre }}" required>
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ $prueba->descripcion }}</textarea>
    </div>
    <button type="submit" class="btn mt-3 btn-primary">Actualizar</button>
</form>
