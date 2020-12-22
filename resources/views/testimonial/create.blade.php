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
                    <div class="card-header">Create Testimonial</div>
                    <div class="card-body">
                        <form action="{{ route('testimonial.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="description">Content</label>
                                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="profession">Profession</label>
                                <input type="text" name="profession" class="form-control" value="{{ old('profession') }}">
                            </div>

                            <div class="form-group">
                                <label for="video_id"> Vimeo Video Id</label>
                                <input type="number" name="video_id" class="form-control" value="{{ old('video_id') }}">
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
