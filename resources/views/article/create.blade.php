@extends('layouts.app')

@section("title") Create Article @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Articles</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create Article</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-plus-circle"></i>
                        Add Article
                    </h4>
                    <form action="{{ route('article.store') }}" id="createArticle" method="post">
                    @csrf
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <label for="">Select Category</label>
                        <select name="category" form="createArticle" class="custom-select custom-select-lg @error('category') is-invalid @enderror" id="">
                            <option value="#" selected >Select Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category') == $category->id ? "selected" : "" }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <label for="">Article Title</label>
                        <input name="title" type="text" form="createArticle" value="{{ old('title') }}" class="form-control form-control-lg @error('title') is-invalid @enderror">
                        @error('title')
                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <label for="">Description</label>
                        <textarea name="description" form="createArticle" type="text" rows="10" class="form-control form-control-lg @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <button form="createArticle" class="btn btn-primary btn-lg w-100">Create Article</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
