<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                <h2 class="mb-5">Job Categories</h2>
            </div>
        </div>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-sm-6 col-md-4 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100" style="height: 200px;">
                    <a href="{{ route('category.index', [$category->id]) }}" class="h-100 feature-item">
                        <h2 class="mt-5">{{ $category->name }}</h2>
                        <span class="counting">{{ $category->jobs->count() }}</span>
                    </a>
                </div>
            @endforeach
        </div>

    </div>
</div>
