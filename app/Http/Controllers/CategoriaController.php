<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller{

    private $categoria;

    public function __construct (Categoria $categoria){
        $this->categoria = $categoria;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $categorias = $this->categoria->paginate(10);

        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $data = $request->all();

        $categoria = \App\Models\Categoria::create($data);

        flash('Categoria cadastrada com Sucesso')->success();
        return redirect()->route('categorias.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($categoria){
        $categoria = $this->categoria->findOrFail($categoria);

        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoria){
        $data = $request->all();

        $categoria = $this->categoria->find($categoria);
        $categoria->update($data);

        flash('Categoria Atualizada com Sucesso')->success();
        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoria){
        $categoria = $this->categoria->find($categoria);
        $categoria->delete();

        flash('Categoria removida com Sucesso!')->success();
        return redirect()->route('categorias.index');
    }
}
