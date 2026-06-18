@extends("layouts.admin")
@section("title", "Dashboard")
@section("content")
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="h6">Recent posts</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-container">
                    <table class="table">
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Published</th>
                            <th>Actions</th>
                        </tr>
                        @forelse ($posts as $post)
                            <tr>
                                <td>
                                    @if ($post->image)
                                        <img src="{{asset('storage/' . $post->image)}}" alt="" width="100" height="100" />
                                    @else
                                        No image
                                    @endif
                                </td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->published_at ? $post->published_at->format('d M Y') : "Not published"}}</td>
                                <td>
                                    <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                            </tr>
                        @empty
                            No posts
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
@endsection
