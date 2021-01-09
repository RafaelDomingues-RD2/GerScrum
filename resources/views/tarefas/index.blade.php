@extends('layouts.app')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Usuario Alocado</th>
                <th>Categoria</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tarefas as $tarefa)
                <tr>
                    <td>{{$tarefa->id}}</td>
                    <td>{{$tarefa->nome}}</td>
                    <td>{{$tarefa->user_id}}</td>
                    <td>{{$tarefa->categoria_id}}</td>
                    <td>{{$tarefa->descricao}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('tarefas.edit', ['tarefa' => $tarefa->id])}}" class="btn btn-sm btn-primary">EDITAR</a>
                            <form action="{{route('tarefas.destroy',['tarefa' => $tarefa->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sn btn-danger">REMOVER</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('tarefas.create')}}" class="btn btn-sm btn-success">Criar Tarefa</a>
    {{$tarefas->links()}}
@endsection
