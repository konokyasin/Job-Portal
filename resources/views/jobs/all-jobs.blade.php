@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div id="app" class="col-md-12" style="margin-top: 150px; margin-bottom: 30px;"> <search-component></search-component></div>
{{--            <form action="{{ route('all.jobs') }}" method="get" style="margin-top: 150px;">--}}
{{--                <div class="form-inline mb-4">--}}
{{--                    <div class="form-group">--}}
{{--                        <label>Keyword: </label>--}}
{{--                        <input type="text" name="title" class="form-control">&nbsp;--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label>Employment type: </label>--}}
{{--                        <select class="form-control" name="type">--}}
{{--                            <option value="">-select-</option>--}}
{{--                            <option value="full-time">full-time</option>--}}
{{--                            <option value="part-time">part-time</option>--}}
{{--                            <option value="casual">casual</option>--}}
{{--                        </select>&nbsp;--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label>Category: </label>--}}
{{--                        <select name="category_id" class="form-control">--}}
{{--                            <option value="">-select-</option>--}}
{{--                            @foreach(App\Category::all() as $cat)--}}
{{--                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>&nbsp;--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label>Address: </label>--}}
{{--                        <input type="text" name="address" class="form-control">&nbsp;--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group d-flex justify-content-center">--}}
{{--                    <button type="submit" class="btn btn-outline-success">Search</button>--}}
{{--                </div>--}}
{{--            </form>--}}
            <div class="col-md-12">
                <div class="rounded border jobs-wrap">
                    @if(count($jobs)>0)
                        @foreach($jobs as $job)
                            <a href="{{ route('jobs.show', [$job->id, $job->slug]) }}" class="job-item d-block d-md-flex align-items-center  border-bottom">
                                <div class="company-logo blank-logo text-center text-md-left pl-3">
                                    @if(empty($job->company->logo))
                                        <img src="{{ asset('avatar/man.jpg') }}" alt="Image" class="img-fluid mx-auto">
                                    @else
                                        <img src="{{ asset('uploads/logo') }}/{{ $job->company->logo }}" alt="Image" class="img-fluid mx-auto">
                                    @endif
                                </div>
                                <div class="job-details h-100">
                                    <div class="p-3 align-self-center">
                                        <h3>{{ $job->position }}</h3>
                                        <div class="d-block d-lg-flex">
                                            <div class="mr-3"><span class="icon-suitcase mr-1"></span> {{ $job->company->cname }}</div>
                                            <div class="mr-3"><span class="icon-room mr-1"></span> {{ Str::limit($job->address,20) }}</div>
                                            <div><span class="icon-money mr-1"></span> {{ $job->salary }}</div>
                                            <div>&nbsp;&nbsp;&nbsp;<span class="fa fa-clock-o"></span> {{ $job->created_at->diffForHumans() }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="job-category align-self-center">
                                    @if($job->type == "full-time")
                                        <div class="p-3">
                                            <span class="text-info p-2 rounded border border-info">{{ $job->type }}</span>
                                        </div>
                                    @elseif($job->type == "part-time")
                                        <div class="p-3">
                                            <span class="text-danger p-2 rounded border border-danger">{{ $job->type }}</span>
                                        </div>
                                    @else
                                        <div class="p-3">
                                            <span class="text-warning p-2 rounded border border-warning">{{ $job->type }}</span>
                                        </div>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    @else
                        <p>No jobs found!</p>
                    @endif
                </div>
                <div class="mt-4"> {{$jobs->appends(Illuminate\Support\Facades\Request::except('page'))->links()}}</div>
            </div>
{{--            <table class="table">--}}
{{--                <thead>--}}
{{--                <th></th>--}}
{{--                <th></th>--}}
{{--                <th></th>--}}
{{--                <th></th>--}}
{{--                <th></th>--}}
{{--                </thead>--}}

{{--                <tbody>--}}
{{--                @if(count($jobs)>0)--}}
{{--                    @foreach($jobs as $job)--}}
{{--                        <tr>--}}
{{--                            <td><img src="{{ asset('avatar/man.jpg') }}" width="60"></td>--}}
{{--                            <td>Position: {{ $job->position }}--}}
{{--                                <br>--}}
{{--                                <i class="fa fa-clock-o text-primary" aria-hidden="true"></i> {{ $job->type }}--}}
{{--                            </td>--}}
{{--                            <td><i class="fa fa-map-marker text-primary" aria-hidden="true"></i> Address: {{ $job->address }}</td>--}}
{{--                            <td><i class="fa fa-globe text-primary" aria-hidden="true"></i> Date: {{ $job->created_at->diffForHumans() }}</td>--}}
{{--                            <td><a href="{{ route('jobs.show', [$job->id, $job->slug]) }}"><button class="btn btn-success btn-sm">Apply</button></a></td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                @else--}}
{{--                    <td>No jobs found</td>--}}
{{--                @endif--}}
{{--                </tbody>--}}
{{--            </table>--}}
        </div>
    </div>
@endsection
