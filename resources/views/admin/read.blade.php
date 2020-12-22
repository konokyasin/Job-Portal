@extends('layouts.main')

@section('content')

    <div class="album text-muted">
        <div class="container">
            <div class="row">
                <div class="title" style="margin-top: 150px;">
                    <h2>{{ $post->title }}</h2>
                </div>
                <img src="{{ asset('storage/'.$post->image) }}" class="w-100">
                <div class="col-lg-12 mt-5 mb-5">

                    <div class="p-4 mb-8 bg-white">
                        <!-- icon-book mr-3-->
                        <h5 class="h5 text-black mb-3">Created by: Admin / {{ date('F d, Y', strtotime($post->created_at)) }} </h5>
                        <p>{{ $post->description }}</p>
                    </div>

                </div>

            </div>

        </div>

        {{--    add sharing option--}}
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f0205e9489d088c"></script>
@endsection
