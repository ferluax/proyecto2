<!-- Mostrara la lista de articulos -->

<!-- implementacion de la plantilla -->
<x-plantilla>

<!-- Utilizar mensaje para saber si un registro se creo bien o se elimino algo -->
<div class="alert alert-success" role="alert">
@if(Session::has('mensaje'))
{{ Session::get('mensaje') }}
@endif
</div>


<!-- Crear enlace para poder ir a crear nuevo articulo -->
<!-- <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
<a href="{{ url('Articulos/create') }}" class="btn btn-primary">Registrar nuevo articulo</a> -->
</br>
</br>

<table class="table table-light">
    <!-- cabecera de la tabla -->
    <thead class="thead-light">
        <tr>
            <th>USUARIO</th>
            <th>ID ARTICULO</th>
            <th>IMAGEN</th>
            <th>MODELO</th>
            <th>MARCA</th>
            <th>COLOR</th>
            <th>TALLA</th>
            <th>PRECIO</th>
            <!-- Para editar o modificar el registro -->
            <th>ACCIONES</th>
        </tr>
    </thead>

    <!-- cuerpo de la tabla -->
    <tbody>
        <!-- para sacar los datos de la base de datos -->
        @foreach($articulos as $articulos)
        <tr>
            <td>{{$articulos->user->name}}</td>
            <td>{{$articulos->id}}</td>

            <!-- Mostrar imagen de storage -->
            <td>
                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$articulos->fotoArticulo }}" width="100" alt="">
            </td>


            <td>{{$articulos->modelo}}</td>
            <td>{{$articulos->marca}}</td>
            <td>{{$articulos->color}}</td>
            <td>{{$articulos->talla}}</td>
            <td>${{$articulos->precio}}</td>
            <td>
            <a href="{{url ('/Articulos/'.$articulos->id.'/edit') }}" class="btn btn-warning">Editar</a>    
             | 
                <!-- formulario para eliminar un registro -->
                <form action="{{ url('/Articulos/'.$articulos->id ) }}" method="post" class="d-inline" >
                    @csrf
                    {{ method_field('delete') }}
                    <input class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" type="submit" onclick="return confirm('??Estas seguro?')" value="Eliminar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</x-plantilla>