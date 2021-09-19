@extends('layouts.app')

@section("title") Category Manager @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Category</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-layers"></i>
                        Category Edit
                    @if(session('status'))
                        <span class="text-success font-weight-bold ml-3">{{ session('status') }}</span>                   
                    @endif
                    </h4>
                    <hr>
                    <form action="{{ route('category.update',$category->id) }}" method="POST">
                        @csrf
                        @method("put")
                        <div class="form-inline">
                            <input type="text" name="title" value="{{ old('title',$category->title) }}" class="form-control mr-2 @error('title') is-invalid @enderror" placeholder="Category" required>
                            <button class="btn btn-primary">Update</button>
                        </div>
                        @error('title')
                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                        @enderror
                    </form>
                    <br>
                    @include('category.list')
                </div>
            </div>
        </div>
    </div>
@endsection
