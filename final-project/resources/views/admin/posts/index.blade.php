@extends("layouts.admin")
@section("title", "Manage Posts")
@section("content")
<div class="container-fluid">
    <h1 class="h1">Manage Posts</h1>
    <div class="card">
        <div class="card-header">
            <h6>Posts</h6>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create Post</a>

            @if (session('success'))
                <p><b>{{session('success')}}</b></p>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Published</th>
                        <th>Actions</th>
                    </tr>
                    @forelse ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>
                                @if ($post->image)
                                    <img src="{{asset('storage/' . $post->image)}}" alt="" width="100" height="100" />
                                @else
                                    No image
                                @endif
                            </td>
                            <td><strong>{{$post->title}}</strong></td>
                            <td><code>{{$post->slug}}</code></td>
                            <td>
                                @if ($post->published_at)
                                    <span>{{$post->published_at}}</span>
                                @else
                                    <span class="text-danger">Not Published</span>
                                @endif
                            </td>
                            <td>
{{--                                <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-info">View</a>--}}
                                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this post?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td>Posts not found.</td></tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
