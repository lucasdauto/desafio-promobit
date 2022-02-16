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
                            <div class="col">
                                <label for="name" class="form-label"> Nome:</label>
                                <input type="text" class="form-control" name="name" required value="{{ $product->name }}">
                            </div>
                            <div class="col">
                                <label for="tags" class="form-label">Tags: </label>
                                <select class="select2-multiple form-control" name="tags[]" multiple="multiple">
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}" {{ in_array($tag->id, $tagsProduct) ? "selected" : "" }}>{{$tag->name}}</option>
                                    @endforeach
                                </select>
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

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Select2 Multiple
            $('.select2-multiple').select2({
                placeholder: "Selecione as tags para o produto",
                allowClear: true
            });

        });
    </script>
@endpush
