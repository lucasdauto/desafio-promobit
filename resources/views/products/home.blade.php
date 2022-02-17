@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between align-content-center">
                        <h5>Lista de Produtos</h5>
                        <a href="{{ route('products.create') }}" class="btn btn-sm btn-success">
                            Cadastrar
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-sm table-bordered">
                                <thead>
                                <td>Código</td>
                                <td>Nome</td>
                                <td>Tags</td>
                                <td width="20%"></td>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            @foreach($product->tags as $tag)
                                                <span class="badge rounded-pill bg-secondary">{{$tag->name}}</span>
                                            @endforeach
                                        </td>
                                        <td class="d-flex justify-content-around">
                                            <a href="{{ route('products.edit',['id'=>$product->id]) }}"
                                               class="btn btn-sm btn-primary">Editar</a>
                                            <form action="{{ route('products.delete',['id'=>$product->id]) }}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Apagar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
