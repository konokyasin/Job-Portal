@extends('layouts.main')

@section('content')

    <div class="album text-muted">
        <div class="container">
            <div class="row" id="app">
                <div class="title" style="margin-top: 150px;">
                    <h2>{{ $job->title }}</h2>
                </div>
                <img src="{{ asset('cover/hero-job-image.jpg') }}" class="w-100">
                <div class="col-lg-8 mt-5 mb-5">
                    <div class="mt-2 mb-2">
                        @include('others.message')
                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <!-- icon-book mr-3-->
                        <h3 class="h5 text-black mb-3"><i class="fa fa-book" style="color: blue;">&nbsp;</i>Description <a href="#" data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-envelope-square" style="font-size: 34px;float:right;color:green;"></i></a></h3>
                        <p> {{ $job->description }}</p>

                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <!--icon-align-left mr-3-->
                        <h3 class="h5 text-black mb-3"><i class="fa fa-user" style="color: blue;">&nbsp;</i>Roles and Responsibilities</h3>
                        <p>{{ $job->roles }}</p>

                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3"><i class="fa fa-users" style="color: blue;">&nbsp;</i>Number of vacancy</h3>
                        <p>{{ $job->number_of_vacancy }}</p>

                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3"><i class="fa fa-clock-o" style="color: blue;">&nbsp;</i>Experience</h3>
                        <p>{{ $job->experience }} Year</p>

                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3"><i class="fa fa-venus-mars" style="color: blue;">&nbsp;</i>Gender</h3>
                        <p>{{ $job->gender }} </p>

                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3"><i class="fa fa-dollar" style="color: blue;">&nbsp;</i>Salary</h3>
                        <p>${{ $job->salary }}</p>
                    </div>
                </div>

                <div class="col-md-4 p-4 site-section bg-light mt-5 mb-5">
                    <h3 class="h5 text-black mb-3 text-center">Short Info</h3>

                    <p>Company Name: {{ $job->company->cname }}</p>
                    <p>Address: {{ $job->address }}</p>
                    <p>Employment Status: {{ $job->type }}</p>
                    <p>Position: {{ $job->position }}</p>
                    <p>Date: {{ $job->created_at->diffForHumans() }}</p>
                    <p>Last date to apply: {{ date('F d, Y', strtotime($job->last_date)) }}</p>

                    <p><a href="{{route('company.index', [$job->company->id, $job->company->slug])}}" class="btn btn-warning w-100 text-white py-2 px-4">Visit Company Page</a></p>
                    <p>
                        @if(Auth::check() && Auth::user()->user_type=='seeker')
                            @if(!$job->checkApplication())
                                <apply-component :jobid={{ $job->id }}></apply-component>
                            @endif
                            <favourite-component :jobid={{ $job->id }} :favorited={{$job->checkSaved()?'true':'false'}}></favourite-component>
                        @endif
                    </p>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Send this job to your friend!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('mail') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="job_id" value="{{ $job->id }}">
                                    <input type="hidden" name="job_slug" value="{{ $job->slug }}">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="your_name">Your Name <span class="text-danger">*</span></label>
                                            <input type="text" name="your_name" class="form-control" required >
                                        </div>
                                        <div class="form-group">
                                            <label for="your_email">Your Email <span class="text-danger">*</span></label>
                                            <input type="email" name="your_email" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="friend_name">Friend Name <span class="text-danger">*</span></label>
                                            <input type="text" name="friend_name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="friend_email">Friend Email <span class="text-danger">*</span></label>
                                            <input type="text" name="friend_email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Mail this job</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
                @foreach($jobRecommendations as $jobRecommendation)
                    <div class="card mb-4 mr-2" style="width: 16rem;">
                        <div class="card-body">
                            <p class="badge badge-success">{{$jobRecommendation->type}}</p>
                            <h5 class="card-title">{{$jobRecommendation->position}}</h5>
                            <p class="card-text">{{Str::limit($jobRecommendation->description,90)}}
                            <center> <a href="{{route('jobs.show',[$jobRecommendation->id,$jobRecommendation->slug])}}" class="btn btn-success">Apply</a></center>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>

@endsection
