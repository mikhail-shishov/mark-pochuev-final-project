@extends("layouts.admin")
@section("title", "Edit")
@section("content")
    <div class="container-fluid">
        <h1 class="h1">Edit</h1>

        <div class="card">
            <form action="{{ route('admin.pages.update', $page) }}" method="page" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $page->title) }}" required>
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

                <label for="content">Content</label>
                <textarea type="text" name="content" id="content" class="form-control @error('content') is-invalid @enderror" required>{{old('content', $page->content)}}</textarea>
                @error('content')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

                <button type="submit" class="btn btn-primary mt-3">Edit page</button>
                <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary mt-3">Back</a>

            </form>
        </div>
    </div>
@endsection
