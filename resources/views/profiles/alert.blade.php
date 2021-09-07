@extends('layouts.app')
@section('content')

    <div class="container">

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Well Done!</strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif ($message = Session::get('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif ($message = Session::get('danger'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


        <div>
            <h2 class="text-center">Selectionner les categories ou vos souhaitez recevoir des
                notifications à propos des emplois disponibles</h2>
        </div>
        <form action="{{ route('alerts.store') }}" method="post">
            @csrf
            <div class="row p-3" style="background: rgb(236, 229, 187); border-radius:10px ">
                @foreach ($categories as $category)
                    <div class="col-md-3 col-sm-12">
                        <li class="mb-2 mx-2">
                            <input type="checkbox" name="category_id[]" value="{{ $category->id }}"
                                id="">
                            <span style="font-size: 17px; color:goldenrod">{{ $category->name }}</span>
                        </li>
                    </div>
                @endforeach
                @error("category_id")
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="mt-5 d-block">
                    <button class="btn btn-primary">Recevoir des alerts pour cette categorie</button>
                </div>
            </div>
        </form>
    </div>

@endsection
