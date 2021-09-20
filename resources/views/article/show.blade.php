@extends('layouts.app')

@section("title") Article Detail @endsection

@section('head')
<style>
    .description{
        white-space: pre-line;
        padding: 5px;
    }    
</style>    
@endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Articles</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $article->title }}</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="mb-0 text-primary mb-2">
                            {{ $article->title }}
                        </h4>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('article.edit',$article->id) }}" class="btn btn-sm btn-link">
                                <i class="feather-edit-3"></i>
                            </a>
                            <form action="{{ route('article.destroy',[$article->id,"page"=>$page]) }}" class="d-inline-block" method="post">
                                @csrf
                                @method("delete")
                                <button class="btn btn-sm btn-link text-danger" onclick="return confirm('Are you sure to delete {{ $article->title }} ')">
                                    <i class="feather-trash"></i>
                                </button>
                            </form>
                            <a href="{{ route('article.index') }}">
                                <i class="feather-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    <div class="font-weight-bold d-flex justify-content-between text-success">
                        <small>
                            <i class="feather-user"></i>
                            {{ $article->user->name }}
                        </small>
                        <small>
                            <i class="feather-layers"></i>
                            {{ $article->category->title }}
                        </small>
                        <small>
                            <i class="feather-clock"></i>
                            {{ $article->created_at->diffForHumans() }}
                        </small>
                    </div>
                    <p class="text-black-50 description">
                        {{ $article->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
