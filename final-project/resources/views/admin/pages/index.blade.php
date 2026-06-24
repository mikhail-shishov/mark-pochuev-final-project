@extends("layouts.admin")
@section("title", "Manage pages")
@section("content")
<div class="container-fluid">
    <h1 class="h1">Manage pages</h1>
    <div class="card">
        <div class="card-header">
            <h6>Pages</h6>

            @if (session('success'))
                <p><b>{{session('success')}}</b></p>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Actions</th>
                    </tr>
                    @forelse ($pages as $page)
                        <tr>
                            <td>{{$page->id}}</td>
                            <td><strong>{{$page->title}}</strong></td>
                            <td><code>{{$page->slug}}</code></td>
                            <td>
{{--                                <a href="{{ route('admin.pages.show', $page->id) }}" class="btn btn-info">View</a>--}}
                                <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td>pages not found.</td></tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
