@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @if(empty(Auth::user()->company->logo))
                    <img src="{{ asset('avatar/man.jpg') }}" alt="image" width="100" style="width: 100%;">
                @else
                    <img src="{{ asset('uploads/logo') }}/{{ Auth::user()->company->logo }}" alt="image" width="100" style="width: 100%;">
                @endif
                <div class="card mt-4">
                    <div class="card-header">Update Company Logo</div>
                    <div class="card-body">
                        <form action="{{ route('company.logo') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if($errors->has('company_logo'))
                                <div class="error text-danger mb-2">{{ $errors->first('company_logo') }}</div>
                            @endif
                            <div class="form-group">
                                <input type="file" class="form-control-file" name="company_logo">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark float-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="mt-2">@include('others.message')</div>
                <div class="card">
                    <div class="card-header">Update Company Profile</div>
                    <div class="card-body">

                        <form action="{{ route('company.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" name="address" value="{{ Auth::user()->company->address }}">
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="text" class="form-control" name="phone" value="{{ Auth::user()->company->phone }}">
                            </div>

                            <div class="form-group">
                                <label for="website">Website:</label>
                                <input type="text" class="form-control" name="website" value="{{ Auth::user()->company->website }}">
                            </div>

                            <div class="form-group">
                                <label for="slogan">Slogan:</label>
                                <input type="text" class="form-control" name="slogan" value="{{ Auth::user()->company->slogan }}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" name="description">{{ Auth::user()->company->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-dark">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">About Your Company</div>
                    <div class="card-body">
                        <p><b>Company Name:</b> {{ Auth::user()->company->cname }}</p>
                        <p><b>Company Address:</b> {{ Auth::user()->company->address }}</p>
                        <p><b>Company Phone:</b> {{ Auth::user()->company->phone }}</p>
                        <p><b>Company Website:</b> <a href="#">{{ Auth::user()->company->website }}</a> </p>
                        <p><b>Company Slogan:</b> {{ Auth::user()->company->slogan }}</p>
                        <p><b>Company Description:</b> {{ Auth::user()->company->description }}</p>
                        <p><b>Company Page:</b> <a href="company/{{ Auth::user()->company->slug }}">View</a></p>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">Update Cover photo</div>
                    <div class="card-body">
                        <form action="{{ route('cover.photo') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if($errors->has('cover_photo'))
                                <div class="error text-danger mb-2">{{ $errors->first('cover_photo') }}</div>
                            @endif
                            <div class="form-group">
                                <input type="file" class="form-control-file" name="cover_photo">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark float-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
