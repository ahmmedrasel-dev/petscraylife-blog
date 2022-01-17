@extends('backend.backend-master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="page-title-box">
        <h4 class="page-title float-left">Blogs</h4>

        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item"><a href="#">Petscrazylife</a></li>
          <li class="breadcrumb-item"><a href="#">Blogs</a></li>
          <li class="breadcrumb-item active">Create Blog</li>
        </ol>

        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <!-- end row -->


  <div class="row">
    <div class="col-lg-12">
      <div class="card-box">
        <h4 class="m-t-0 m-b-10 header-title text-center">Blog Post Create</h4>
        <hr>

        <form class="form-horizontal" role="form" action="{{ route('blog.store') }}" method="POST"
          enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
            <label for="title" class="col-2 col-form-label">Blog Title</label>
            <div class="col-10">
              <input type="text" class="form-control" id="blog_title" name="blog_title"
                placeholder="Add your blog title.">
            </div>
          </div>

          <div class="form-group row">
            <label for="slug" class="col-2 col-form-label">slug</label>
            <div class="col-10">
              <input type="text" class="form-control" id="slug" name="slug" placeholder="Add slug">
            </div>
          </div>

          <div class="form-group row">
            <label for="cateogryName" class="col-2 col-form-label">Select Category</label>
            <div class="col-10">
              <select class="form-control select2" name="category_id" id="cateogryName">
                <option>Select Category</option>
                @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-2 col-form-label">Thumbnail Image Upload</label>
            <div class="col-4">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                <div>
                  <button type="button" class="btn btn-secondary btn-file">
                    <input type="file" class="btn-secondary" name="thumbnail" id="thumbnail"
                      onchange="document.getElementById('image_id').src = window.URL.createObjectURL(this.files[0])" />
                  </button>
                </div>
                <div class="mt-3">
                  <img class="img-thumbnail"
                    src="{{ asset('backend-assets/upload_images/default_img/default_image.jpg') }}" id="image_id"
                    width="200" height="200" />
                </div>
              </div>
            </div>

            <label class="col-2 col-form-label">Feature Image Upload</label>
            <div class="col-4">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                <div>
                  <button type="button" class="btn btn-secondary btn-file">
                    <input type="file" class="btn-secondary" id="feature_image" name="feature_image"
                      onchange="document.getElementById('image_id2').src = window.URL.createObjectURL(this.files[0])" />
                  </button>
                </div>
                <div class="mt-3">
                  <img class="img-thumbnail"
                    src="{{ asset('backend-assets/upload_images/default_img/default_image.jpg') }}" id="image_id2"
                    width="200" height="200" />
                </div>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label for="my-editor" class="col-2 col-form-label">Blog Details</label>
            <div class="col-10">
              <textarea class="from-control" name="blog_details" id="my-editor"></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="keyword" class="col-2 col-form-label">Keywords</label>
            <div class="col-10">
              <div class="m-b-0">
                <select multiple data-role="tagsinput" name="tags[]"></select>
              </div>
            </div>
          </div>

          <div class="form-group m-b-0 row">
            <div class="offset-2 col-10">
              <button type="submit" class="btn btn-info waves-effect waves-light">Post
                Save</button>
            </div>
          </div>

          {{-- Dispy Success Message. --}}
          @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <strong>{{ session('success') }}</strong>
          </div>
          @endif
        </form>
      </div>
    </div>
  </div>

</div> <!-- container -->
@endsection

@section('footer_js')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
  var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace('my-editor', options);

        // Add Slug Daynamicly
        $('#blog_title').keyup(function() {
            $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g, "-"));
        });
</script>
@endsection