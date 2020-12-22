<div class="site-section block-15">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                <h2>Recent Blog</h2>
            </div>
        </div>


        <div class="nonloop-block-15 owl-carousel">


           @foreach($posts as $post)

                    <div class="media-with-text">
                        <div class="img-border-sm mb-4">
                            <a href="" class="image-play">
                                <img src="{{ asset('storage/'.$post->image) }}" alt="no image" class="img-fluid">
                            </a>
                        </div>
                        <h2 class="heading mb-0 h5"><a href="#">{{ $post->title }}</a></h2>
                        <span class="mb-3 d-block post-date">{{ date('F d, Y', strtotime($post->created_at)) }} &bullet; By <a href="#">Admin</a></span>
                        <p>{{ Str::limit ($post->description,200) }}</p>

                        <a href="{{ route('post.show', [$post->id, $post->slug]) }}" class="btn btn-sm btn-primary">Read More</a>
                    </div>
            @endforeach

        </div>

        <div class="row">

        </div>
    </div>
</div>
