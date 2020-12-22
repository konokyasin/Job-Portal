@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="mb-2 mt-2">
            @include('others.message')
            @include('others.errors')
        </div>
        <div class="row">
            <div class="col-md-4">
                @include('admin.left_menu')
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Post</div>
                    <div class="card-body">
                        <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                            </div>

                            <div class="form-group">
                                <label for="description">Content</label>
                                <textarea name="description" class="form-control">{{ $post->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                           <div class="form-group">
                               <img src="{{ asset('storage/'.$post->image) }}" class="w-100">
                           </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="0" {{ $post->status=='0' ? 'selected' : '' }}>Draft</option>
                                    <option value="1" {{ $post->status=='1' ? 'selected' : '' }}>Live</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
