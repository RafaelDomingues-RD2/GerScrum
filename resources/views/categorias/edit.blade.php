@extends('layouts.app')
@section('content')
    <h1>Atualizar Categoria</h1>
    <form action="{{route('categorias.update', ['categoria' => $categoria->id])}}" method="post">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="name" class="form-control" value="{{$categoria->name}}">
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="descricao" class="form-control" value="{{$categoria->descricao}}">
        </div>
        <div>
            <button type="submit" class="btn btn-lg btn-success">Atualizar Produto</button>
        </div>
    </form>
@endsection
