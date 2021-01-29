@extends('layouts.app')
@section('content')
    <h1>Atualizar Tarefa</h1>
    <form action="{{route('tarefas.update', ['tarefa' => $tarefa->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{$tarefa->nome}}">
            @error('nome')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
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
            <textarea type="text" name="descricao" class="form-control @error('descricao') is-invalid @enderror" value="{{$tarefa->descricao}}"></textarea>
            @error('descricao')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Atualizar Tarefa</button>
        </div>
    </form>
@endsection
