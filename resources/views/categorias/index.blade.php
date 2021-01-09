@extends('layouts.app')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <td>{{$categoria->id}}</td>
                    <td>{{$categoria->name}}</td>
                    <td>{{$categoria->descricao}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('categorias.edit', ['categoria' => $categoria->id])}}" class="btn btn-sm btn-primary">EDITAR</a>
                            <form action="{{route('categorias.destroy', ['categoria' => $categoria->id])}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-sn btn-danger">REMOVER</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('categorias.create')}}" class="btn btn-sm btn-success">Criar Categoria</a>
    {{$categorias->links()}}
@endsection
