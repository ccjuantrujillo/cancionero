<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\ColeccionService;
use App\Http\Controllers\Controller;

class ColeccionController extends Controller
{
    protected $coleccionService;

    public function __construct(ColeccionService $service)
    {
        $this->coleccionService = $service;
    }

    public function index()
    {
        $coleccions = $this->coleccionService->getAll();
        return view('admin.coleccion.index', compact('coleccions'));
    }

    public function create()
    {
        return view('admin.coleccion.create');
    }    

    public function store(Request $request)
    {
        $validated = $request->validate([
            'descripcion' => 'nullable',
            'orden' => 'required|numeric',
        ]);

        $this->coleccionService->create($validated);

        return redirect()->route('products.index')
                ->with('success', 'Producto creado');
   
    }

    public function show($id)
    {
        $coleccion = $this->coleccionService->getById($id);
        return view('admin.coleccion.show', compact('coleccion'));
    }    

    public function edit($id)
    {
        $coleccion = $this->coleccionService->getById($id);
        return view('admin.coleccion.edit', compact('coleccion'));
    }    

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string',
            'description' => 'nullable',            
            'price' => 'sometimes|numeric',
        ]);

        $this->coleccionService->update($id, $validated);

        return redirect()->route('admin.coleccion.index')->with('success', 'Cancionero actualizado');
    }

    public function destroy($id)
    {
        $this->coleccionService->delete($id);
        return redirect()->route('admin.coleccion.index')->with('success', 'Cancionero eliminado');
    }

}
