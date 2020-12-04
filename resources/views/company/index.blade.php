@extends('layouts.main')

@section('content')

    <div class="album text-muted">
        <div class="container">
            <div class="row" id="app">
                <div class="col-md-12">
                    <div class="title" style="margin-top: 150px;">
                    </div>
                    <div class="company-profile">
                        @if(empty($company->cover_photo))
                            <img src="{{ asset('cover/tumblr-image-sizes-banner.png') }}" class="w-100" alt="no image">
                        @else
                            <img src="{{ asset('uploads/coverphoto') }}/{{ $company->cover_photo }}" class="w-100" alt="no image">
                        @endif
                        <div class="company-desc">
                            @if(empty($company->logo))
                                <img src="{{ asset('avatar/man.jpg') }}" alt="image" width="100">
                            @else
                                <img src="{{ asset('uploads/logo') }}/{{ $company->logo }}" alt="image" width="100" >
                            @endif
                            <p>{{ $company->description }}</p>
                            <h1>{{ $company->cname }}</h1>
                            <p><span class="text-primary">slogan:</span>{{ $company->slogan }}, <span class="text-primary">address:</span>{{ $company->address }}, <span class="text-primary">phone:</span>{{ $company->phone }}, <span class="text-primary">website:</span> {{ $company->website }}</p>
                        </div>
                    </div>
                    <table class="table">
                        <tbody>
                        @foreach($company->jobs as $job)
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
                </div>
            </div>
        </div>
    </div>

@endsection

