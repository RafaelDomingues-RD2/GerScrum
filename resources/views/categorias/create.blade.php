@extends('layouts.app')
@section('content')
    <h1>Criar Categoria</h1>
    <form action="{{route('categorias.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="descricao" class="form-control">
        </div>
        <div>
            <button type="submit" class="btn btn-lg btn-success">Criar Categoria</button>
        </div>
    </form>
@endsection
