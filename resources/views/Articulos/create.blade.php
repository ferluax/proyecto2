<!-- Formulario de creacion de articulo -->

<!-- implementacion de la plantilla -->
<x-plantilla>
   
    
    <!-- enlace a index -->
    <a href="{{ url('/dashboard') }}">Dashboard</a>
    <a href="{{ url('Articulos/') }}">Index</a>
    


    <!-- {{-- muestra de errores de validacion de campos --}} -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- {{-- creacion del formulario --}} -->
    <form action="{{ url('/Articulos') }}" method="post" enctype="multipart/form-data">
        
        <!-- {{-- para evitar error 419 --}} -->
        @csrf 
        <label for="modelo">Modelo</label><br>
        <input type="text" name="modelo" id="modelo" value="{{old('modelo')}}">
        <br>

        <label for="marca">Marca</label><br>
        <input type="text" name="marca" id="marca" value="{{old('marca')}}">
        <br>

        <label for="color">Color</label><br>
        <input type="text" name="color" id="color" value="{{old('color')}}">
        <br>

        <label for="talla">Talla</label><br>
        <input type="text" name="talla" id="talla" value="{{old('talla')}}">
        <br>

        <label for="precio">Precio</label><br>
        <input type="text" name="precio" id="precio" value="{{old('precio')}}">
        <br>

        <label for="imagen">Imagen de Articulo</label><br>
        <input type="file" name="fotoArticulo" id="fotoArticulo" value="{{old('fotoArticulo')}}">
        <br><br>

        <input type="submit" value="Enviar">
    </form>
</x-plantilla>