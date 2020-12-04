@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <h2 style="margin-top: 150px;">{{ $categoryName->name }}</h2>
            <table class="table">
                <tbody>
                    @foreach($jobs as $job)
                        <tr>
                            <td><img src="{{ asset('avatar/man.jpg') }}" width="60"></td>
                            <td>Position: {{ $job->position }}
                                <br>
                                <i class="fa fa-clock-o text-primary" aria-hidden="true"></i> {{ $job->type }}
                            </td>
                            <td><i class="fa fa-map-marker text-primary" aria-hidden="true"></i> Address: {{ $job->address }}</td>
                            <td><i class="fa fa-globe text-primary" aria-hidden="true"></i> Date: {{ $job->created_at->diffForHumans() }}</td>
                            <td><a href="{{ route('jobs.show', [$job->id, $job->slug]) }}"><button class="btn btn-success btn-sm">Apply</button></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$jobs->appends(Illuminate\Support\Facades\Request::except('page'))->links()}}
        </div>
    </div>
@endsection
