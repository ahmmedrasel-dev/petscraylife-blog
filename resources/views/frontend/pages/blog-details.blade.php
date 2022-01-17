@extends('frontend.frontend-master')
@section('content')
<!-- Blog Feture Image -->

<section id="feature_img">
  <div class="container p-0">
    <img class="w-100 img-fluid" src="{{ asset($post->feature_image) }}" alt="Feature Image">
  </div>
</section>

<!-- Post Detials  -->

<section id="blog">
  <div class="container p-0">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="blog-details">
          <h1>{{ $post->blog_title }}</h1>
          <p class="date"><i class="far fa-calendar-alt"></i>{{ $post->created_at->format('D M Y') }}</p>
          <div class="socail_shere">
            {!! $shareButtons !!}
            {{-- <ul>
              <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter"></i></i></a></li>
              <li><a href="#"><i class="fab fa-instagram"></i></i></a></li>
              <li><a href="#"><i class="fab fa-youtube"></i></a></li>
            </ul> --}}
          </div>
          <hr>
          <p>
            {!! $post->blog_details !!}
          </p>
        </div>

        <!-- Reply Comment Section -->

        <div class="contact-form article-comment">

          @forelse ($comments as $comment)
          <div class="user-commentbox">
            <div class="user-aveter">
              <div class="img">
                <img class="w-100" src="{{ asset('backend-assets/upload_images/default_img/user.jpeg') }}" alt="">
              </div>
            </div>
            <div class="user-comment">
              <p class="user-name">{{ $comment->provider_name }}</p>
              <p class="date"><i class="far fa-calendar-alt"></i>{{ $comment->created_at->format('M d, Y') }}</p>
              <p class="comment">{{ $comment->comments }}</p>
            </div>
          </div>
          <hr>
          @empty
          <h3>There is no comments.</h3>
          <hr>
          @endforelse
          <h3>Leave a Reply: </h3>
          <form id="contact-form" action="{{ route('blogCommentPost') }}" method="POST" class="mt-3">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-2">
                  <input name="name" id="name" placeholder="Name *" class="form-control" type="text">
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6">
                <div class="form-group mb-2">
                  <input name="email" id="email" placeholder="Email *" class="form-control" type="email">
                </div>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-12 mt-3">
                <div class="form-group">
                  <textarea name="comments" id="message" placeholder="Your message *" rows="4"
                    class="form-control"></textarea>
                </div>

                @error('comments')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-12 mt-3">
                <div class="send">
                  <button class="btn btn-color"><span>Submit</span> <i class="arrow"></i></button>
                </div>
              </div>
            </div>
          </form>
        </div>

      </div>
      <div class="col-md-12 col-lg-4 mb-md-5">
        <div class="blog-sidebar">
          <div class="most-recent">
            <div class="sidebar-title">
              <h3>Most Recent Post</h3>
            </div>
            @foreach ( $recentposts as $item )
            <div class="sitebar-post">
              <div class="post-thubmnail">
                <img class="w-100" src="{{ asset($item->thumbnail_image) }}" alt="{{ $item->blog_title }}">
              </div>
              <div class="blogpost-title">
                <p class="post-date"><i class="far fa-calendar-alt"></i>{{ $item->created_at->format('D m Y') }}</p>
                <h4><a href="{{ route('singlePost', $item->slug) }}">{{ $item->blog_title }}</a></h4>
              </div>
            </div>
            @endforeach
          </div>

          <div class="post-category">
            <div class="sidebar-title">
              <h3>All Categories</h3>
            </div>

            <div class="categories">
              <ul>
                @foreach ( $categories as $citem )
                <li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>{{ $citem->category_name }} ({{
                    $citem->blogpost->count() }})</a></li>
                @endforeach
              </ul>
            </div>
          </div>

          <div class="most-popular">
            <div class="sidebar-title">
              <h3>Most Popular Post</h3>
            </div>
            @foreach ( $popularPost as $ppitem )
            <div class="sitebar-post">
              <div class="post-thubmnail">
                <img class="w-100" src="{{ asset($ppitem->thumbnail_image) }}" alt="{{ $ppitem->blog_title }}">
              </div>
              <div class="blogpost-title">
                <p class="post-date"><i class="far fa-calendar-alt"></i>{{ $ppitem->created_at->format('D M Y') }}</p>
                <h4><a href="{{ route('singlePost', $ppitem->slug ) }}">{{ $ppitem->blog_title }}</a></h4>
              </div>
            </div>
            @endforeach
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection