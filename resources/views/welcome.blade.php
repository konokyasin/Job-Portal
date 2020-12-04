<!DOCTYPE html>
<html lang="en">
<head>
    <title>Job Finder</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('partials.head')

</head>
<body>

@include('partials.nav')

    <div style="height: 113px;"></div>

    <div class="site-blocks-cover overlay" style="background-image: url('external/images/hero_1.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12" data-aos="fade">
                    <h1>Find Job</h1>
                    <form action="{{ route('all.jobs') }}">
                        <div class="row mb-3">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <input type="text" name="search" class="mr-3 form-control border-0 px-4" placeholder="job title, keywords or company name " required>
                                    </div>
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <div class="input-wrap">
                                            <span class="icon icon-room"></span>
                                            <input type="text" name="address" class="form-control form-control-block search-input  border-0 px-4"  placeholder="city, province or region" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <input type="submit" class="btn btn-search btn-primary btn-block" value="Search">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@include('partials.category')

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="mb-5 h3">Recent Jobs</h2>
                    <div class="rounded border jobs-wrap">
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
                    </div>

                    <div class="col-md-12 text-center mt-5">
                        <a href="{{ route('all.jobs') }}" class="btn btn-primary rounded py-3 px-5"><span class="icon-plus-circle"></span> Show More Jobs</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

@include('partials.testimonial')


    <div class="site-blocks-cover overlay inner-page" style="background-image: url('external/images/hero_1.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6 text-center" data-aos="fade">
                    <h1 class="h3 mb-0">Your Dream Job</h1>
                    <p class="h3 text-white mb-5">Is Waiting For You</p>
                    <p><a href="/register" class="btn btn-outline-warning py-3 px-4">Job Seeker</a> <a href="{{ route('employer.register') }}" class="btn btn-warning py-3 px-4">Employer</a></p>

                </div>
            </div>
        </div>
    </div>



    <div class="site-section site-block-feature bg-light">
        <div class="container">

            <div class="text-center mb-5 section-heading">
                <h2>Why Choose Us</h2>
            </div>

            <div class="d-block d-md-flex border-bottom">
                <div class="text-center p-4 item border-right" data-aos="fade">
                    <span class="flaticon-worker display-3 mb-3 d-block text-primary"></span>
                    <h2 class="h4">More Jobs Every Day</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
                    <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
                </div>
                <div class="text-center p-4 item" data-aos="fade">
                    <span class="flaticon-wrench display-3 mb-3 d-block text-primary"></span>
                    <h2 class="h4">Creative Jobs</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
                    <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
                </div>
            </div>
            <div class="d-block d-md-flex">
                <div class="text-center p-4 item border-right" data-aos="fade">
                    <span class="flaticon-stethoscope display-3 mb-3 d-block text-primary"></span>
                    <h2 class="h4">Healthcare</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
                    <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
                </div>
                <div class="text-center p-4 item" data-aos="fade">
                    <span class="flaticon-calculator display-3 mb-3 d-block text-primary"></span>
                    <h2 class="h4">Finance &amp; Accounting</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
                    <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
                </div>
            </div>
        </div>
    </div>


@include('partials.blog')

@include('partials.footer')

</body>
</html>
