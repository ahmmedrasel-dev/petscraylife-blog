@extends('backend.backend-master');
@section('category_active')
active
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="page-title-box">
        <h4 class="page-title float-left">Category</h4>

        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item"><a href="#">Petscrazylife</a></li>
          <li class="breadcrumb-item"><a href="#">Category</a></li>
          <li class="breadcrumb-item active">Create Category</li>
        </ol>

        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <!-- end row -->


  <div class="row">

    <div class="col-lg-4">
      <div class="card-box">
        <h4 class="m-t-0 m-b-30 header-title" Create Category</h4>

          <form role="form" action="" method="POST">
            @csrf
            <div class="form-group">
              <label for="category_name">Category Name</label>
              <input name="category_name" type="text" class="form-control @error('category_name') is-invalid @enderror"
                id="category_name" placeholder="Category Name">
            </div>
            {{-- Dispy Error Message. --}}
            @error('category_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-purple waves-effect waves-light">Save</button>

            {{-- Dispy Success Message. --}}
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
              <strong>{{ session('success') }}</strong>
            </div>
            @endif
          </form>
      </div>
    </div>

    <div class="col-lg-8">
      <div class="card-box">
        <h4 class="m-t-0 header-title">All Category</h4>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>sl</th>
              <th>Category Name</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th style="text-align: center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $key => $item)
            <tr>
              <th scope="row">{{ $key + 1 }}</th>
              <td>{{ Str::ucfirst($item->category_name) }} ({{ $item->blogpost->count() }})</td>
              <td>{{ $item->created_at->diffForHumans() }}</td>
              <td>{{ $item->updated_at->diffForHumans() }}</td>
              <td style="width: 150px; text-align: center">
                @if ($item->id == 1)
                <button disabled="disabled">Not Allow</button>
                @else
                <form action="{{ route('category.destroy', $item->id) }}" method="post">
                  <a href="{{ route('category.edit', $item->id) }}" class="btn btn-outline-info">Edit</a>
                  @csrf
                  @method('delete')
                  <button class="btn btn-outline-danger rounded-5">Delete</button>
                </form>
                @endif

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