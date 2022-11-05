<!-- Formulario de creacion de articulo -->

<!-- implementacion de la plantilla -->
<x-plantilla>
   
    
    <!-- enlace a index -->
    <!-- <a href="{{ url('/dashboard') }}">Dashboard</a>
    <a href="{{ url('Articulos/') }}">Index</a> -->

    </br>
    </br>
    


    <!-- {{-- muestra de errores de validacion de campos --}} -->
    @if (count($errors)>0)
    <div class="alert alert-danger" role="alerts">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="form-group">
    <!-- {{-- creacion del formulario --}} -->
    <form action="{{ url('/Articulos') }}" method="post" enctype="multipart/form-data">
        
        <!-- {{-- para evitar error 419 --}} -->
        @csrf 
        <label for="modelo">Modelo</label><br>
        <input type="text" class="form-control" name="modelo" id="modelo" value="{{old('modelo')}}">
        <br>

        <label for="marca">Marca</label><br>
        <input type="text" class="form-control" name="marca" id="marca" value="{{old('marca')}}">
        <br>

        <label for="color">Color</label><br>
        <input type="text" class="form-control" name="color" id="color" value="{{old('color')}}">
        <br>

        <label for="talla">Talla</label><br>
        <input type="text" class="form-control" name="talla" id="talla" value="{{old('talla')}}">
        <br>

        <label for="precio">Precio</label><br>
        <input type="text" class="form-control" name="precio" id="precio" value="{{old('precio')}}">
        <br>

        <label for="imagen">Imagen de Articulo</label><br>
        <input type="file" class="form-control" name="fotoArticulo" id="fotoArticulo" value="{{old('fotoArticulo')}}">
        <br><br>

        <input type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" value="Enviar">
    </form>
    </div>
</x-plantilla>