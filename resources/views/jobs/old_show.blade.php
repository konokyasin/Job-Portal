@extends('layouts.app')

@section('content')
    <div class="container">
        @include('others.message')
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $job->title }}</div>

                    <div class="card-body">
                        <p><h3>Description</h3>{{ $job->description }}</p>
                        <p><h3>Duties</h3>{{ $job->roles }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Short Info</div>

                    <div class="card-body">
                        <p>Company: <a href="{{route('company.index', [$job->company->id, $job->company->slug])}}">
                                {{ $job->company->cname }}</a>
                        </p>
                        <p>Address: {{ $job->address }}</p>
                        <p>Employment Status: {{ $job->type }}</p>
                        <p>Position: {{ $job->position }}</p>
                        <p>Date: {{ $job->created_at->diffForHumans() }}</p>
                        <p>Last date to apply: {{ date('F d, Y', strtotime($job->last_date)) }}</p>
                    </div>
                </div>
                @if(Auth::check() && Auth::user()->user_type=='seeker')
                    @if(!$job->checkApplication())
{{--                        <form action="{{ route('apply', [$job->id]) }}" method="post">--}}
{{--                            @csrf--}}
{{--                            <button type="submit" class="btn btn-success mt-2 w-100">Apply</button>--}}
{{--                        </form>--}}
                        <apply-component :jobid={{ $job->id }}></apply-component>
                    @endif
                    <favourite-component :jobid={{ $job->id }} :favorited={{$job->checkSaved()?'true':'false'}}></favourite-component>
                @endif
            </div>
        </div>
    </div>
@endsection
