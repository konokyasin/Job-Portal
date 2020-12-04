@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(Auth::user()->user_type == 'seeker')
                <h2 style="font-size: 20px;" class="mb-4 mt-4 badge badge-warning w-100">You logged in as a Job Seeker!!</h2>
                @foreach($jobs as $job)
                    <div class="card mb-4">
                        <div class="card-header">{{ $job->title }}</div>
                        <p style="width: 200px; font-size: 12px;" class="badge badge-primary">{{ $job->position }}</p>
                        <div class="card-body">
                            {{ $job->description }}
                        </div>
                        <div class="card-footer">
                            <span><a href="{{ route('jobs.show', [$job->id, $job->slug]) }}">Read More</a></span>
                            <span class="float-right">Last date: {{ $job->last_date }}</span>
                        </div>
                    </div>
                @endforeach
            @else
                <h2 style="font-size: 20px;" class="mb-4 mt-4 badge badge-success w-100">You logged in as an Employer!!</h2>
            @endif
        </div>
    </div>
</div>
@endsection
