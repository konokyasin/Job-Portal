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
                <table class="table table-striped table-bordered" id="datatable">
                    <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td><img src="{{ asset('storage/'.$post->image) }}" width="80"></td>
                            <td>{{ $post->title }}</td>
                            <td>{{ Str::limit ($post->description,50) }}</td>
                            <td>
                                @if($post->status == '0')
                                    <p class="badge badge-primary">Draft</p>
                                @else
                                    <p  class="badge badge-success">Live</p>
                                @endif
                            </td>
                            <td>{{ date('F d, Y', strtotime($post->created_at)) }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('post.restore', $post->id) }}"><button type="button" class="btn btn-success mr-2">Restore</button></a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal1{{ $post->id }}">
                                        Delete
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal1{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Delete Post</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Do you want to delete this post Permanently?
                                                </div>
                                                <form action="{{ route('post.delete.permanently', $post->id) }}" method="get">
                                                    @csrf
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id" value="{{ $post->id }}">
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{--    datatables--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <script>
        $('#datatable').DataTable();
    </script>

@endsection
