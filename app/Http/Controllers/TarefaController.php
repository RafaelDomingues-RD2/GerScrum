<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
use App\Http\Requests\TarefaRequest;

class TarefaController extends Controller{

    private $tarefa;

    public function __construct(Tarefa $tarefa){
        $this->tarefa = $tarefa;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $tarefas = $this->tarefa->paginate(10);

        return view('tarefas.index', compact('tarefas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $usuarios = \App\Models\User::all();
        $categorias = \App\Models\Categoria::all();

        return view('tarefas.create', compact('usuarios', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TarefaRequest $request){
        $tarefa = \App\Models\Tarefa::create([
            'name' => $request->name,
            'user_id' => $request->usuario,
            'categoria_id' => $request->categoria,
            'descricao' => $request->descricao
        ]);

        flash('Tarefa cadastrada com Sucesso')->success();
        return redirect()->route('tarefas.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit($tarefa){
        $tarefa = $this->tarefa->findOrFail($tarefa);
        $usuarios = \App\Models\User::all();
        $categorias = \App\Models\Categoria::all();


        return view('tarefas.edit', compact('tarefa', 'usuarios', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(TarefaRequest $request, $id){
        $this->tarefa->where(['id' => $id])->update([
            'name' => $request->name,
            'user_id' => $request->usuario,
            'categoria_id' => $request->categoria,
            'descricao' => $request->descricao
        ]);

        flash('Tarefa atualizada com Sucesso')->success();
        return redirect()->route('tarefas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tarefa){
        $tarefa = $this->tarefa->find($tarefa);
        $tarefa->delete();

        flash('Tarefa removida com Sucesso')->success();
        return redirect()->route('tarefas.index');

    }
}
