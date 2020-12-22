@extends('layouts.app')

@section('content')

   <div class="container">
       <div class="mt-2 mb-2">
           @include('others.message')
       </div>
       <a href="/dashboard" class="btn btn-secondary mb-4">Back to dashboard</a>
       <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">All Jobs</div>
                   <div class="card-body">
                       <table class="table table-striped table-bordered" id="datatable">
                           <thead>
                           <tr>
                               <th scope="col">Created Date</th>
                               <th scope="col">Position</th>
                               <th scope="col">Company</th>
                               <th scope="col">Status</th>
                               <th scope="col">Action</th>
                           </tr>
                           </thead>
                           <tbody>
                           @foreach($jobs as $job)
                               <tr>
                                   <td>{{ date('F d, Y', strtotime($job->created_at)) }}</td>
                                   <td>{{ $job->position }}</td>
                                   <td>{{ $job->company->cname }}</td>
                                   <td>@if($job->status == '0')
                                           <a href="{{ route('change.job.status', $job->id) }}" class="badge badge-primary">Draft</a>
                                       @else
                                           <a href="{{ route('change.job.status', $job->id) }}" class="badge badge-success">Live</a>
                                       @endif</td>
                                   <td><a href="{{ route('jobs.show', [$job->id, $job->slug]) }}" target="_blank" class="btn btn-sm text-white" style="background: #005C5F;">View</a></td>
                               </tr>
                           @endforeach
                           </tbody>
                       </table>
                   </div>
               </div>
           </div>
       </div>
   </div>

   {{--    datatables--}}
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
   <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

   <script>
       $('#datatable').DataTable();
   </script>

@endsection
