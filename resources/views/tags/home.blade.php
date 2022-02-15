@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between align-content-center">
                        <h5>Lista de Tags</h5>
                        <a href="{{ route('tags.create') }}" class="btn btn-sm btn-success">
                            Cadastrar
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-sm table-bordered">
                                <thead>
                                <td>Código</td>
                                <td>Nome</td>
                                <td width="20%">Ação</td>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->name }}</td>
                                        <td class="d-flex justify-content-around">
                                            <a href="{{ route('tags.edit',['id'=>$tag->id]) }}" class="btn btn-sm btn-primary">Editar</a>
                                            <form action="{{ route('tags.delete',['id'=>$tag->id]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Apagar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $tags->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
