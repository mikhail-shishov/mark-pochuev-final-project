@extends("layouts.admin")
@section("title", "Edit")
@section("content")
    <div class="container-fluid">
        <h1 class="h1">Edit</h1>

        <div class="card">
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label for="image">Image</label>
                @if($post->image)
                    <img src="{{asset('storage/' . $post->image)}}" alt="" width="100" height="100">
                @endif
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

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

                <button type="submit" class="btn btn-primary mt-3">Edit post</button>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary mt-3">Back</a>

            </form>
        </div>
    </div>
@endsection
