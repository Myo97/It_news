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
                    <h4 class="mb-0">
                        <i class="feather-list"></i>
                        Articles
                    </h4>
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
                            @foreach ($articles as $article)
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
                                    <a href="{{ route('article.edit',$article->id) }}" class="btn btn-sm btn-outline-primary">
                                        Edit
                                    </a>
                                    <form action="{{ route('article.destroy',$article->id) }}" class="d-inline-block" method="post">
                                        @csrf
                                        @method("delete")
                                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure to delete {{ $article->title }} category ')">Delete</button>
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
                                        <i class="feather-calendar"></i>
                                        {{ $article->updated_at->format("d - m - y") }}
                                    </small>
                                    <br>
                                    <small>
                                        <i class="feather-clock"></i>
                                        {{ $article->updated_at->format("h : m a") }}
                                    </small>  
                                </td>
                            </tr>                                
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
