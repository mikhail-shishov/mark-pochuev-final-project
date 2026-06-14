@extends("layouts.admin")
@section("title", "Create")
@section("content")
    <div class="container-fluid">
        <h1 class="h1">Create</h1>

        <div class="card">
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

                <label for="content">Content</label>
                <textarea type="text" name="content" id="content" class="form-control @error('content') is-invalid @enderror" required>{{old('content')}}</textarea>
                @error('content')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

                <button type="submit" class="btn btn-primary mt-3">Create post</button>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary mt-3">Back</a>

            </form>
        </div>
    </div>
@endsection
