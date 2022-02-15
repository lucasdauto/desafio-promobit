@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Lista de Tags</div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-sm table-bordered">
                                <thead>
                                <td>Código</td>
                                <td>Nome</td>
                                <td>Ação</td>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->name }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary">Editar</button>
                                            <button class="btn btn-sm btn-danger">Apagar</button>
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
