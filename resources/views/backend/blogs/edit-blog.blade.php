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
          <li class="breadcrumb-item active">Edit Blog</li>
        </ol>

        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <!-- end row -->


  <div class="row">
    <div class="col-lg-12">
      <div class="card-box">
        <h4 class="m-t-0 m-b-10 header-title text-center">Blog Post Edit</h4>
        <hr>

        <form class="form-horizontal" role="form" action="{{ route('blog.update', $blog->id) }}" method="POST"
          enctype="multipart/form-data">

          @csrf
          @method('PUT')
          {{-- Blog Title --}}
          <div class="form-group row">
            <label for="blog_title" class="col-2 col-form-label">Blog Title</label>
            <div class="col-10">
              <input type="text" class="form-control" id="blog_title" name="blog_title" value="{{ $blog->blog_title }}">
            </div>
          </div>

          {{-- Blog Title Slug --}}
          <div class="form-group row">
            <label for="slug" class="col-2 col-form-label">slug</label>
            <div class="col-10">
              <input type="text" class="form-control" id="slug" name="slug" value="{{ $blog->slug }}">
            </div>
          </div>

          {{-- Blog Category Selected Here --}}
          <div class="form-group row">
            <label for="cateogryName" class="col-2 col-form-label">Select Category</label>
            <div class="col-10">
              <select class="form-control select2" name="category_id" id="cateogryName">
                <option>Select Category</option>
                @foreach ($categories as $item)
                <option value="{{ $item->id }}" @if ($item->id == $blog->category_id)
                  selected
                  @endif>
                  {{ $item->category_name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          {{-- Thumbnail Image Upload Here --}}
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
                  <img class="img-thumbnail" src="{{ asset($blog->thumbnail_image) }}" id="image_id" width="100"
                    height="100" />
                </div>
              </div>
            </div>

            {{-- Feature Image Uploaded Here --}}
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
                  <img class="img-thumbnail" src="{{ asset($blog->feature_image) }}" id="image_id2" width="100"
                    height="100" />
                </div>
              </div>
            </div>
          </div>

          {{-- Blog Details Add Here --}}
          <div class="form-group row">
            <label for="my-editor" class="col-2 col-form-label">Blog Details</label>
            <div class="col-10">
              <textarea class="from-control" name="blog_details" id="my-editor">{{ $blog->blog_details }}</textarea>
            </div>
          </div>

          {{-- Blog Tag Add Here and Edit Here --}}
          @php
          $totaltags = $tags->count();
          @endphp
          {{-- Jodi Blog Add korar somoy Tag use na kora hoy tahole akhane se tag add korbe --}}
          @if ($totaltags > 0)
          <div class="form-group row">
            <label for="keyword" class="col-2 col-form-label">Keywords</label>
            @foreach ($tags as $item)
            <div class="col-2">
              <div class="m-b-0">
                <input type="text" value="{{ $item->tag_name }}" name="tags[]">
                <input type="hidden" name="tag_id[]" value="{{ $item->id }}">
              </div>
            </div>
            @endforeach
          </div>
          {{-- Jodi Already Tag use kora hoichy tahole akhane Edit kora jabe. --}}
          @elseif ($totaltags < 1) <div class="form-group row">
            <label for="keyword" class="col-2 col-form-label">Keywords</label>
            <div class="col-10">
              <div class="m-b-0">
                <select multiple data-role="tagsinput" name="blogtags[]"></select>
              </div>
            </div>
      </div>
      @endif

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
    $('#blog_title').keyup(function () {
        $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g, "-"));
    });

</script>
@endsection