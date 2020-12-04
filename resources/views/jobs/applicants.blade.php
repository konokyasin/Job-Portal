@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @foreach($applicants as $applicant)
                    <div class="card">

                        <div class="card-header"><a href="{{ route('jobs.show', [$applicant->id, $applicant->slug]) }}">{{ $applicant->title }}</a></div>

                        <div class="card-body">
                            @foreach($applicant->users as $user)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>Name:</b> {{ $user->name }}</td>
                                            <td><b>Email:</b> {{ $user->email }}</td>
                                            <td><b>Sex:</b> {{ $user->profile->gender }}</td>
                                            <td><b>Address:</b> {{ $user->profile->address }}</td>
                                            <td><b>Bio:</b> {{ $user->profile->bio }}</td>
                                            <td><b>Experience:</b> {{ $user->profile->experience }}</td>
                                            <td><a href="{{ Storage::url($user->profile->resume) }}">Resume</a></td>
                                            <td><a href="{{ Storage::url($user->profile->cover_letter) }}">Cover Letter</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endforeach
                        </div>
                    </div><br>
                @endforeach
            </div>
        </div>
    </div>
@endsection
