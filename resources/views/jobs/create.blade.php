@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('others.message')
               <div class="card">
                   <div class="card-header bg-dark text-white">Create a Job</div>
                   <div class="card-body">
                      <form action="{{ route('job.store') }}" method="post">
                          @csrf
                          <div class="form-group">
                              <label for="title">Title:</label>
                              <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                              @if($errors->has('title'))
                                  <div class="error text-danger mb-2">{{ $errors->first('title') }}</div>
                              @endif
                          </div>
                          <div class="form-group">
                              <label for="description">Description:</label>
                              <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                              @if($errors->has('description'))
                                  <div class="error text-danger mb-2">{{ $errors->first('description') }}</div>
                              @endif
                          </div>
                          <div class="form-group">
                              <label for="role">Role:</label>
                              <textarea name="roles" class="form-control">{{ old('roles') }}</textarea>
                              @if($errors->has('roles'))
                                  <div class="error text-danger mb-2">{{ $errors->first('roles') }}</div>
                              @endif
                          </div>
                          <div class="form-group">
                              <label for="category">Category:</label>
                              <select name="category" class="form-control">
                                  @foreach(App\Category::all() as $cat)
                                      <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="position">Position:</label>
                              <input type="text" name="position" class="form-control" value="{{ old('position') }}">
                              @if($errors->has('position'))
                                  <div class="error text-danger mb-2">{{ $errors->first('position') }}</div>
                              @endif
                          </div>
                          <div class="form-group">
                              <label for="address">Address:</label>
                              <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                              @if($errors->has('address'))
                                  <div class="error text-danger mb-2">{{ $errors->first('address') }}</div>
                              @endif
                          </div>
                          <div class="form-group">
                              <label for="number_of_vacancy">No. of vacancy:</label>
                              <input type="number" name="number_of_vacancy" class="form-control" value="{{ old('number_of_vacancy') }}">
                              @if($errors->has('number_of_vacancy'))
                                  <div class="error text-danger mb-2">{{ $errors->first('number_of_vacancy') }}</div>
                              @endif
                          </div>
                          <div class="form-group">
                              <label for="experience">Year of experience:</label>
                              <input type="number" name="experience" class="form-control" value="{{ old('experience') }}">
                              @if($errors->has('experience'))
                                  <div class="error text-danger mb-2">{{ $errors->first('experience') }}</div>
                              @endif
                          </div>
                          <div class="form-group">
                              <label for="gender">Sex:</label>
                              <select class="form-control" name="gender">
                                  <option value="male">male</option>
                                  <option value="female">female</option>
                                  <option value="both">both</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="salary">Salary/year:</label>
                              <select class="form-control" name="salary">
                                  <option value="Negotiable">Negotiable</option>
                                  <option value="5000-10000">5000-10000</option>
                                  <option value="10000-30000">10000-30000</option>
                                  <option value="30000-60000">30000-60000</option>
                                  <option value="60000-100000">60000-100000</option>
                                  <option value="100000+">100000+</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="type">Type:</label>
                              <select class="form-control" name="type">
                                  <option value="full-time">full-time</option>
                                  <option value="part-time">part-time</option>
                                  <option value="casual">casual</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="status">Status:</label>
                              <select class="form-control" name="status">
                                  <option value="1">live</option>
                                  <option value="0">draft</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="last_date">Last Date:</label>
                              <input type="text" id="datepicker" name="last_date" class="form-control" value="{{ old('last_date') }}">
                              @if($errors->has('last_date'))
                                  <div class="error text-danger mb-2">{{ $errors->first('last_date') }}</div>
                              @endif
                          </div>
                          <div class="form-group">
                              <button type="submit" class="btn btn-dark">Submit</button>
                          </div>
                      </form>
                   </div>
               </div>
            </div>
        </div>
    </div>
@endsection
