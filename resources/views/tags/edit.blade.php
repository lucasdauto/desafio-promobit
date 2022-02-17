@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('tags.update', ['id' =>$tag->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h3> Cadastro de tag </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="name" class="form-label"> Nome:</label>
                                <input type="text" class="form-control" name="name" required value="{{ $tag->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('tags.index') }}" class="btn btn-sm btn-outline-dark">Voltar</a>
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
    <script type="text/javascript">
    @if(session()->exists('message'))
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'success'
            })
        });
    @endif
    </script>
@endpush
