@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('products.update') }}" method="post">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h3> Edição de Produto </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="name" class="form-label"> Nome:</label>
                                <input type="text" class="form-control" name="name" required value="{{ $product->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-dark">Voltar</a>
                        <button class="btn btn-sm btn-success">
                            Salvar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
