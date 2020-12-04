@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @if(empty(Auth::user()->profile->avatar))
                    <img src="{{ asset('avatar/man.jpg') }}" alt="image" width="100" style="width: 100%;">
                @else
                    <img src="{{ asset('uploads/avatar') }}/{{ Auth::user()->profile->avatar }}" alt="image" width="100" style="width: 100%;">
                @endif
                <div class="card mt-4">
                    <div class="card-header">Update Profile Picture</div>
                    <div class="card-body">
                        <form action="{{ route('avatar') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if($errors->has('avatar'))
                                <div class="error text-danger mb-2">{{ $errors->first('avatar') }}</div>
                            @endif
                            <div class="form-group">
                                <input type="file" class="form-control-file" name="avatar">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="mt-2">@include('others.message')</div>
                <div class="card">
                    <div class="card-header">Update Your Profile</div>
                    <div class="card-body">

                        <form action="{{ route('profile.create') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" name="address" value="{{ Auth::user()->profile->address }}">
                                @if($errors->has('address'))
                                    <div class="error text-danger">{{ $errors->first('address') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Mobile Number:</label>
                                <input type="number" class="form-control" name="phone_number" value="{{ Auth::user()->profile->phone_number }}">
                                @if($errors->has('phone_number'))
                                    <div class="error text-danger">{{ $errors->first('phone_number') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="experience">Experience:</label>
                                <textarea class="form-control" name="experience">{{ Auth::user()->profile->experience }}</textarea>
                                @if($errors->has('experience'))
                                    <div class="error text-danger">{{ $errors->first('experience') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="bio">Bio:</label>
                                <textarea class="form-control" name="bio">{{ Auth::user()->profile->bio }}</textarea>
                                @if($errors->has('bio'))
                                    <div class="error text-danger">{{ $errors->first('bio') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Your Information</div>
                    <div class="card-body">
                        <p><b>Name:</b> {{ Auth::user()->name }}</p>
                        <p><b>Email:</b> {{ Auth::user()->email }}</p>
                        <p><b>Address:</b> {{ Auth::user()->profile->address }}</p>
                        <p><b>Mobile Number:</b> {{ Auth::user()->profile->phone_number }}</p>
                        <p><b>Gender:</b> {{ Auth::user()->profile->gender }}</p>
                        <p><b>Experience:</b> {{ Auth::user()->profile->experience }}</p>
                        <p><b>Bio:</b> {{ Auth::user()->profile->bio }}</p>
                        <p><b>Member on:</b> {{ date('F d Y', strtotime(Auth::user()->created_at)) }}</p>
                        @if(!empty(Auth::user()->profile->cover_letter))
                            <p><a href="{{ Storage::url(Auth::user()->profile->cover_letter) }}">Cover Letter</a></p>
                        @else
                            <p>Please Upload Cover letter!!</p>
                        @endif

                        @if(!empty(Auth::user()->profile->resume))
                            <p><a href="{{ Storage::url(Auth::user()->profile->resume) }}">Resume</a></p>
                        @else
                            <p>Please Upload Resume!!</p>
                        @endif
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">Update Cover Letter</div>
                    <div class="card-body">
                       <form action="{{ route('cover.letter') }}" method="post" enctype="multipart/form-data">
                           @csrf
                           @if($errors->has('cover_letter'))
                               <div class="error text-danger mb-2">{{ $errors->first('cover_letter') }}</div>
                           @endif
                           <div class="form-group">
                               <input type="file" class="form-control-file" name="cover_letter">
                           </div>
                           <div class="form-group">
                               <button type="submit" class="btn btn-success float-right">Update</button>
                           </div>
                       </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">Update Resume</div>
                    <div class="card-body">
                        <form action="{{ route('resume') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if($errors->has('resume'))
                                <div class="error text-danger mb-2">{{ $errors->first('resume') }}</div>
                            @endif
                           <div class="form-group">
                               <input type="file" class="form-control-file" name="resume">
                           </div>
                           <div class="form-group">
                               <button type="submit" class="btn btn-success float-right">Update</button>
                           </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
