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
          <li class="breadcrumb-item active">Trashed Data</li>
        </ol>

        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <!-- end row -->

  <div class="row">
    <div class="col-lg-12">
      <div class="card-box">
        <h4 class="m-t-0 header-title">All Trashed Blogs</h4>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Sl</th>
              <th>Blog Title</th>
              <th>Category</th>
              <th>Thubmanil</th>
              <th>Created</th>
              <th width="200" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($blogsTrash as $key => $item)
            <tr>
              <th scope="row">{{ $key + 1 }}</th>
              <td>{{ Str::words($item->blog_title, 10) }}</td>

              <td>{{ $item->category->category_name }}</td>
              <td><img src="{{ asset($item->thumbnail_image) }}" alt="{{ $item->blog_title }}" width="80px"></td>

              <td>{{ $item->created_at->diffForHumans() }}</td>

              <td style="text-align: center">
                <a href="{{ route('blogRestore', $item->id) }}" class="btn btn-info">Restore</a>
                <a href="{{ route('blogDelete', $item->id) }}" class="btn btn-danger">Delete</a>
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