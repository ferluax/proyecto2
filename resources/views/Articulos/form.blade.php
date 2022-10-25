<!-- Formulario que tendra datos en comun con create y edit -->

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
        <input type="file" name="fotoArticulo" id="fotoArticulo" value="{{old('imagen')}}">
        <br><br>

        <input type="submit" value="Enviar">