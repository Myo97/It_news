<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Owner</th>
            <th>Control</th>
            <th>Created_at</th>
            <th>Updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach (\App\Category::with('user')->get() as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->title }}</td>
            <td>{{ $category->user->name }}</td>
            <td class="text">
                <a href="{{ route('category.edit',$category->id) }}" class="btn btn-sm btn-outline-primary">
                    Edit
                </a>
                <form action="{{ route('category.destroy',$category->id) }}" class="d-inline-block" method="post">
                    @csrf
                    @method("delete")
                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure to delete {{ $category->title }} category ')">Delete</button>
                </form>
            </td>
            <td>
                <small>
                    <i class="feather-calendar"></i>
                    {{ $category->created_at->format("d - m - y") }}
                </small>
                <br>
                <small>
                    <i class="feather-clock"></i>
                    {{ $category->created_at->format("h : m a") }}
                </small>                                    
            </td>
            <td>
                <small>
                    <i class="feather-calendar"></i>
                    {{ $category->updated_at->format("d - m - y") }}
                </small>
                <br>
                <small>
                    <i class="feather-clock"></i>
                    {{ $category->updated_at->format("h : m a") }}
                </small>  
            </td>
        </tr>                                
        @endforeach
    </tbody>
</table>