<!-- Formulario de edicion de articulos -->

<!-- implementacion de la plantilla -->
<x-plantilla>

        {{-- creacion del formulario --}}
    <form action="{{ url('/Articulos/'.$articulos->id) }}" method="post" enctype="multipart/form-data">
        
        {{-- para evitar error 419 --}}
        @csrf 
        {{ method_field('patch') }}

        <label for="modelo">Modelo</label><br>
        <input type="text" name="modelo" id="modelo" value="{{ $articulos->modelo}}">
        <br>

        <label for="marca">Marca</label><br>
        <input type="text" name="marca" id="marca" value="{{ $articulos->marca}}">
        <br>

        <label for="color">Color</label><br>
        <input type="text" name="color" id="color" value="{{ $articulos->color}}">
        <br>

        <label for="talla">Talla</label><br>
        <input type="text" name="talla" id="talla" value="{{ $articulos->talla}}">
        <br>

        <label for="precio">Precio</label><br>
        <input type="text" name="precio" id="precio" value="{{ $articulos->precio}}">
        <br>

        <label for="imagen">Imagen de Articulo</label><br>
        <img src="{{ asset('storage').'/'.$articulos->fotoArticulo }}" width="100" alt="">
        <input type="file" name="fotoArticulo" id="fotoArticulo" value="">
        <br><br>

        <!-- enlace a index -->
        <a href="{{ url('Articulos/') }}">Regresar</a><br><br>

        <input type="submit" value="Guardar Cambios">
        
    </form>
</x-plantilla>