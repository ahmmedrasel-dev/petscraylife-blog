@extends('frontend.frontend-master')
@section('home_active')
active
@endsection
@section('content')

<section id="banner">
  <div class="container p-0">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="slider">
          @foreach ( $featureBlog as $item )
          <div class="slider-item">
            <img class="w-100 img-fluid" src="{{ asset($item->feature_image) }}" alt="{{ $item->blog_title }}">
            <a href="{{ route('singlePost', $item->slug ) }}">
              <p class="slider-title">{{ $item->blog_title }}</p>
            </a>
            <div class="overlay"></div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="col-lg-4">
        <div class="all-post">
          <div class="post-title">
            <h3>Our Latest Post</h3>
          </div>
          <div class="post-content">
            @foreach ( $blogs as $key => $ltitem )
            <a href="{{ route('singlePost', $ltitem->slug ) }}">
              <p><span>{{ $key + 1 }}.</span>{{ Str::words($ltitem->blog_title, 5) }}</p>
            </a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="blogpost">
  <div class="container p-0">
    <div class="row">
      @foreach ( $blogs as $item )
      <div class="col-md-6 col-lg-4">
        <div class="blog-post">
          <div class="card h-100">
            <img src="{{ asset($item->thumbnail_image) }}" class="card-img-top" alt="{{ $item->blog_title }}">
            <div class="card-body">
              <h5 class="card-title">{{ $item->blog_title }}</h5>
              <p class="date">{{ $item->created_at->format('M d Y') }}</p>
              <p class="card-text summary">{!! Str::words($item->blog_details, 30) !!}</p>

              <div class="d-grid mx-auto mt-3">
                <a href="{{ route('singlePost', $item->slug ) }}" class="btn btn-color">Read More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <!-- Pagination Star Here -->

  <div class="row">
    <div class="col-md-12">
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item @if ( $blogs->onFirstPage()) disabled @endif">
            <a class="page-link" href="{{ $blogs->previousPageUrl() }}" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          @for ($i = 1; $i <= $blogs->lastPage(); $i ++)
            <li class="page-item {{ $blogs->currentPage() == $i ? 'active' : '' }}"><a class="page-link"
                href="{{ $blogs->url($i) }}">{{ $i }}</a></li>
            @endfor

            @if ($blogs->hasMorePages())
            <li class="page-item">
              <a class="page-link" href="{{ $blogs->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
            @else
            <li class="page-item disabled">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
            @endif

        </ul>
      </nav>
    </div>
  </div>
</section>
@endsection