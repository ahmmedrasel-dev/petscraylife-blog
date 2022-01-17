@extends('backend.backend-master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="page-title-box">
        <h4 class="page-title float-left">Blog</h4>

        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item"><a href="#">Petscrazylife</a></li>
          <li class="breadcrumb-item"><a href="#">Blog</a></li>
          <li class="breadcrumb-item active">All blogs</li>
        </ol>

        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <!-- end row -->

  <div class="row">
    <div class="col-lg-12">
      <div class="card-box">
        <h4 class="m-t-0 header-title">All Blogs</h4>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Sl</th>
              <th>Blog Title</th>
              <th>Category</th>
              <th>Thubmanil</th>
              <th>Created</th>
              <th>Featured</th>
              <th>Status</th>
              <th width="200" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($blogs as $key => $item)
            <tr>
              <th scope="row">{{ $key + 1 }}</th>
              <td><a href="{{ route('singlePost', $item->slug) }}" target="_blank">{{ Str::words($item->blog_title, 10)
                  }}</a></td>

              <td>{{ $item->category->category_name }}</td>
              <td>
                <img src="{{ asset($item->thumbnail_image) }}" alt="{{ $item->blog_title }}" width="80px">
              </td>

              <td>{{ $item->created_at->diffForHumans() }}</td>

              {{-- <td>
                @if ($item->status = 1)
                <a href="{{ route('blogDeactive') }}" class="btn btn-success">Active</a>
                @else
                <a href="{{ route('blogActive') }}" class="btn btn-danger">Inactive</a>
                @endif
              </td> --}}
              <td>
                <div class="switchery-demo">
                  <input type="checkbox" @if ( $item->featurepost_status == 2 ) checked @endif data-plugin="switchery"
                  data-color="#039cfd"
                  data-size="small" data-feature_post="{{ $item->featurepost_status }}" value="{{ $item->id }}"
                  id="feature_post{{ $item->id
                  }}" class="feature_post{{ $item->id }}"/>
                </div>
              </td>

              <td>
                <div class="switchery-demo">
                  <input type="checkbox" @if ( $item->status == 1 ) checked @endif data-plugin="switchery"
                  data-color="#039cfd" data-size="small" data-status="{{ $item->status }}" value="{{ $item->id }}"
                  id="status{{ $item->id }}" class="status{{ $item->id }}"/>
                </div>
              </td>

              <td style="text-align: center">
                <form action="{{ route('blog.destroy', $item->id) }}" method="post">
                  @csrf
                  @method('delete')
                  <a href="{{ route('blog.edit', $item->id) }}" class="btn btn-info">Edit</a>
                  <button class="btn btn-danger" type="submit">Trash</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>

  </div>
  <!-- end row -->

</div> <!-- container -->
@endsection

@section('footer_js')
<script>
  @foreach( $blogs as $item )
    $('#status{{ $item->id }}').change(function(){
      let blog_id = $(this).val();
      let status_id = $(this).attr('data-status');
      // alert(status_id);
      $.ajax({
        type: 'GET',
        url: "{{ url('blog-status') }}/" + blog_id +'/' +status_id,
      });
    });

    $('#feature_post{{ $item->id }}').change(function(){
      let blog_id = $(this).val();
      let feature_post = $(this).attr('data-feature_post');
        // alert(status_id);
        $.ajax({
          type: 'GET',
          url: "{{ url('blog-feature') }}/" + blog_id +'/' +feature_post,
        });
    });
  @endforeach

</script>
@endsection