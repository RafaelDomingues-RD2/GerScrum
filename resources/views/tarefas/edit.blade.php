@extends('layouts.app')
@section('content')
    <h1>Atualizar Tarefa</h1>
    <form action="{{route('tarefas.update', ['tarefa' => $tarefa->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="{{$tarefa->nome}}">
        </div>
        <div class="form-group">
           <label>Usuario</label>
            <select name="usuario" class="form-control">
                <option value="{{$tarefa->user->id}}">{{$tarefa->user->name}}</option>
                @foreach($usuarios as $usuario)
                    <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Categoria</label>
            <select name="categoria" class="form-control">
                <option value="{{$tarefa->categoria->id}}">{{$tarefa->categoria->name}}</option>
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="from-group">
            <label>Descrição</label>
            <input type="text" name="descricao" class="form-control" value="{{$tarefa->descricao}}">
        </div>
        <div>
            <button type="submit" class="btn btn-lg btn-success">Atualizar Tarefa</button>
        </div>
    </form>
@endsection
