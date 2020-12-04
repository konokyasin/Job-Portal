@extends('layouts.main')

@section('content')
    <br><br><br><br><br><br>
  <div class="album text-muted">
      <div class="container">
          <h2>Companies</h2>
          <div class="row">
                  @foreach($companies as $company)
                      <div class="col-md-3">
                          <div class="card" style="width: 16rem; margin-bottom: 10px;">
                              @if(empty($company->logo))
                                  <img src="{{ asset('avatar/man.jpg') }}" class="card-img-top" alt="..." width="100">
                              @else
                                  <img src="{{ asset('uploads/logo') }}/{{ $company->logo }}" class="card-img-top" alt="image" width="100" >
                              @endif
                              <div class="card-body">
                                  <h5 class="card-title">{{ $company->cname }}</h5>
                                  <p class="card-text">{{ Str::limit($company->description, 40) }}</p>
                                 <center><a href="{{ route('company.index', [$company->id, $company->slug]) }}" class="btn btn-outline-primary">Visit Company</a></center>
                              </div>
                          </div>
                      </div>
                  @endforeach
          </div>
          {{ $companies->links() }}
      </div>
  </div>

@endsection
