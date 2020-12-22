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
                    <div class="card-header">Create Post</div>
                    <div class="card-body">
                        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                            </div>

                            <div class="form-group">
                                <label for="description">Content</label>
                                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Live</option>
                                    <option value="0">Draft</option>
                                </select>
                            </div>

                            <div class="form-group">
                               <button type="submit" class="btn btn-success">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
