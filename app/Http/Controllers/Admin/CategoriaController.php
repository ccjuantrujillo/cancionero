<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        //dd(Session::all());
		$compania_id = session('compania');
		
        $categorias = Categoria::where('COMPP_Codigo',$compania_id)
                        ->orderBy('CATEGC_Orden','asc')->get();
        
        return view('admin.categoria.index')
                ->with('categorias',$categorias);
    }

    public function create(){
        return view('admin.categoria.create');
    }

    public function store(Request $request)
    {
		
		$compania_id = session('compania');
        $request->validate([
            'nombre' => 'required'
        ]);
        $categoria = new Categoria;
        $categoria->CATEGC_Descripcion      = $request->nombre;
        $categoria->CATEGC_Orden            = $request->orden;
        $categoria->CATEGC_DescripcionCorta = $request->nombre_corto;
        $categoria->COMPP_Codigo            = $compania_id;
        $categoria->save();

        return redirect()->route('categoria.index');
    }

    public function edit($id){
        $categoria = Categoria::findOrFail($id);
        return view("admin.categoria.edit", ['categoria' => $categoria]);
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->CATEGC_Descripcion = $request->nombre;
        $categoria->CATEGC_Orden            = $request->orden;
        $categoria->CATEGC_DescripcionCorta = $request->nombre_corto;
        $categoria->save();
        
        return redirect()->route('categoria.index');
    }

    public function destroy($id)
    {
        Categoria::destroy($id);
        return redirect()->route('categoria.index');
    }
}
