@extends('layouts.app')
@section('content')
    <h1>Criar Tarefa</h1>
    <form action="{{route('tarefas.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{old('nome')}}">
            @error('nome')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Usuario Alocado</label>
            <select name="usuario" class="form-control">
                @foreach($usuarios as $usuario)
                    <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Categoria</label>
            <select name="categoria" class="form-control">
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <textarea type="text" name="descricao" class="form-control @error('descricao') is-invalid @enderror" value="{{old('descricao')}}"></textarea>
            @error('descricao')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Cria Tarefa</button>
        </div>
    </form>
@endsection
