@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <search-component></search-component>
            </div><br><br>
            <h1>Recent Jobs</h1>
            <table class="table">
                <thead>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>

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
        </div>
        <div>
            <a href="{{ route('all.jobs') }}"><button class="btn btn-lg btn-primary w-100">Browse all jobs</button></a>
        </div>
        <br><br>

        <div class="container">
            <h1>Featured Companies</h1>
            <div class="row">
                @foreach($companies as $company)
                    <div class="col-md-3">
                        <div class="card" style="width: 16rem; margin-bottom: 10px;">
                            <img src="{{ asset('avatar/man.jpg') }}" class="card-img-top" alt="..." style="width: 50%;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $company->cname }}</h5>
                                <p class="card-text">{{ Str::limit($company->description, 40) }}</p>
                                <a href="{{ route('company.index', [$company->id, $company->slug]) }}" class="btn btn-outline-primary">Visit Company</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
