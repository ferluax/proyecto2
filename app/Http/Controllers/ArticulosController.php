<?php

namespace App\Http\Controllers;

use App\Models\Articulos;
use Illuminate\Http\Request;

// para actualizar imagenes 
use Illuminate\Support\Facades\Storage;
 
//para auth
use Illuminate\Support\Facades\Auth;

class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //consulta a la base de datos

        // esto muestra los primeros 5 registros
        // $datos['articulos']=Articulos::paginate(5);

        //esto muestra todos los registros
        //$datos['articulos']=Articulos::all();

        //esto muestra los registros que haya hecho el usuario logueado
        $datos['articulos']=Articulos::where('user_id', Auth::id())->get();
        
        return view('Articulos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Articulos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Hacer validacion de campos 
        $campos=[
            'Modelo'=>'required|string|max:100',
            'Marca'=>'required|string|max:100',
            'Color'=>'required|string|max:100',
            'Talla'=>'required|string|max:100',
            'Precio'=>'required|string|max:100',
            'Imagen'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Imagen.required'=>'La imagen es requerida'
        ];

        $this->validate($request, $campos, $mensaje);
        
        //
        $request->merge(['user_id' => Auth::id()]);
        //$datosArticulo = request()->all();
        $datosArticulo = request()->except('_token');

        //Para insertar la fotografia en formato jpg
        if($request->hasFile('fotoArticulo')){
            $datosArticulo['fotoArticulo']=$request->file('fotoArticulo')->store('uploads', 'public');
        }

        // Insertar a base de datos
        Articulos::insert($datosArticulo);

        //Se muestra en formato json lo que se esta guardando
        //return response()->json($datosArticulo);
        return redirect('Articulos/')->with('mensaje', 'Registro exitoso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function show(Articulos $articulos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Vamos a recuperar los datos
        $articulos = Articulos::findOrFail($id);

        return view('Articulos.edit', compact('articulos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articulos  $articulos 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Hacer validacion de campos 
        $campos=[
            'Modelo'=>'required|string|max:100',
            'Marca'=>'required|string|max:100',
            'Color'=>'required|string|max:100',
            'Talla'=>'required|string|max:100',
            'Precio'=>'required|string|max:100',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            
        ];

        if($request->hasFile('fotoArticulo')){
            $campos=['Imagen'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Imagen.required'=>'La imagen es requerida'];
        }

        $this->validate($request, $campos, $mensaje);
        //
        $datosArticulo = request()->except(['_token','_method']);
        
        if($request->hasFile('fotoArticulo')){

            //Vamos a recuperar los datos
            $articulos = Articulos::findOrFail($id);

            // aqui se eliminara la foto que esta actualmente para que tu puedas agregar la nueva
            Storage::delete(['public/'.$articulos->fotoArticulo]);

            $datosArticulo['fotoArticulo']=$request->file('fotoArticulo')->store('uploads', 'public');
        }

        //se actualizan los datos en la base de datos
        Articulos::where('id','=',$id)->update($datosArticulo);

        //Vamos a recuperar los datos
        $articulos = Articulos::findOrFail($id);

        return view('Articulos', compact('articulos'))->with('mensaje', 'Registro modificado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // recuperamos los datos para poder eliminar la imagen y registro
        $articulos = Articulos::findOrFail($id);

        //aqui se elimina la foto y el registro
        if(Storage::delete('public/'.$articulos->fotoArticulo)){
            Articulos::destroy($id);
        }

        return redirect('Articulos')->with('mensaje', 'Registro eliminado exitosamente!');
    }
}
