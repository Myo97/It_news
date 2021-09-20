@extends('layouts.app')

@section("title") Article @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Article</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-end mb-3">
                        <h4 class="mb-0">
                            <i class="feather-list"></i>
                            Articles
                        </h4>
                        @isset(request()->search)
                        <div class="text-black-50">
                            Search Result For : 
                            <span class="font-weight-bold">  "{{ request()->search }}"  </span>
                        </div>
                        @endisset
                        <div class="d-flex">
                            <a href="{{ route('article.create') }}" class="btn btn-outline-primary mr-3"><i class="feather-plus-circle"></i></a>
                            <a href="{{ route('article.index') }}" class="btn btn-outline-primary mr-3">ALL</a>

                            <form action="{{ route('article.index') }}" method="get">
                                <div class="form-inline">
                                    <input type="search" name="search" value="{{ request()->search }}" class="form-control mr-2 @error('search') is-invalid @enderror" placeholder="Search Article" required>
                                    <button class="btn btn-primary"><i class="feather-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if (session("status"))
                    <p class="alert alert-success">{{ session("status") }}</p>
                    @endif

                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Article</th>
                                <th>Category</th>
                                <th>Owner</th>
                                <th>Control</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>
                                    <span class="font-weight-bold">{{ Str::words($article->title, 5)}}</span>
                                    <br>
                                    <small class="text-black-50">{{ Str::words($article->description, 8)}}</small>
                                </td>
                                <td>{{ $article->category->title }}</td>
                                <td>{{ $article->user->name }}</td>
                                <td class="text-nowrap">
                                    <a href="{{ route('article.edit',$article->id) }}" class="btn btn-sm font-weight-bold btn-outline-primary">
                                        Edit
                                    </a>
                                    <a href="{{ route('article.show',[$article->id,'page'=>request()->page]) }}" class="btn btn-sm font-weight-bold btn-outline-info">
                                        <i class="feather-info"></i>
                                    </a>
                                    <form action="{{ route('article.destroy',[$article->id,"page"=>request()->page]) }}" class="d-inline-block" method="post">
                                        @csrf
                                        @method("delete")
                                        <button class="btn btn-sm font-weight-bold btn-outline-danger" onclick="return confirm('Are you sure to delete {{ $article->title }}')">Delete</button>
                                    </form>
                                </td>
                                <td class="text-nowrap">
                                    <small>
                                        <i class="feather-calendar"></i>
                                        {{ $article->created_at->format("d - m - y") }}
                                    </small>
                                    <br>
                                    <small>
                                        <i class="feather-clock"></i>
                                        {{ $article->created_at->format("h : m a") }}
                                    </small>                                    
                                </td>
                                <td class="text-nowrap">
                                    <small>
                                        {{ $article->updated_at->diffForHumans() }}
                                    </small>
                                </td>
                            </tr>      
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        <h4 class="font-weight-bold text-black-50">There is no Articles</h4>    
                                    </td>    
                                </tr>                 
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between align-items-end">
                        {{ $articles->appends(request()->all())->links() }}
                        <p class="font-weight-bold text-black-50">Total Articles : {{ $articles->total() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

