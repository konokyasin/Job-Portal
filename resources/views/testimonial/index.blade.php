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
                        <th scope="col">Content</th>
                        <th scope="col">Name</th>
                        <th scope="col">Profession</th>
                        <th scope="col">Vimeo Video Id</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($testimonials as $test)
                        <tr>

                            <td>{{ Str::limit ($test->description,100) }}</td>
                            <td>{{ $test->name }}</td>
                            <td>{{  $test->profession }}</td>
                            <td>{{  $test->video_id }}</td>
                            <td> <div class="btn-group">
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2{{ $test->id }}">
                                        Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal2{{ $test->id }}" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel2">Delete Testimonial</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Do you want to delete this?
                                                </div>
                                                <form action="{{ route('testimonial.destroy', $test->id) }}" method="post">
                                                    @csrf
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id" value="{{ $test->id }}">
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
