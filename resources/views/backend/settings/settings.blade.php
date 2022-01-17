@extends('backend.backend-master');
@section('setting_active')
active
@endsection
@section('custom_css')
<style>
  body {
    background: #f5f5f5;
  }

  .nav-link {
    display: inline-block;
  }

  .ui-w-80 {
    width: 80px !important;
    height: auto;
  }

  .btn-default {
    border-color: rgba(24, 28, 33, 0.1);
    background: rgba(0, 0, 0, 0);
    color: #4E5155;
  }

  label.btn {
    margin-bottom: 0;
  }

  .btn-outline-primary {
    border-color: #26B4FF;
    background: transparent;
    color: #26B4FF;
  }

  .btn {
    cursor: pointer;
  }

  .text-light {
    color: #babbbc !important;
  }

  .btn-facebook {
    border-color: rgba(0, 0, 0, 0);
    background: #3B5998;
    color: #fff;
  }

  .btn-instagram {
    border-color: rgba(0, 0, 0, 0);
    background: #000;
    color: #fff;
  }

  .card {
    background-clip: padding-box;
    box-shadow: 0 1px 4px rgba(24, 28, 33, 0.012);
  }

  .row-bordered {
    overflow: hidden;
  }

  .account-settings-fileinput {
    position: absolute;
    visibility: hidden;
    width: 1px;
    height: 1px;
    opacity: 0;
  }

  .account-settings-links .list-group-item.active {
    font-weight: bold !important;
  }

  html:not(.dark-style) .account-settings-links .list-group-item.active {
    background: transparent !important;
  }

  .account-settings-multiselect~.select2-container {
    width: 100% !important;
  }

  .light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
  }

  .light-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
  }

  .material-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
  }

  .material-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
  }

  .dark-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(255, 255, 255, 0.03) !important;
  }

  .dark-style .account-settings-links .list-group-item.active {
    color: #fff !important;
  }

  .light-style .account-settings-links .list-group-item.active {
    color: #4E5155 !important;
  }

  .light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
  }
</style>
@endsection

@section('content')
<div class="container-fluid light-style">

  <h4 class="font-weight-bold mb-4">
    Account settings
  </h4>
  <form action="{{ route('settingsPost') }}" method="post" enctype="multipart/form-data">

    @csrf
    <div class="card">
      <div class="row">
        <div class="col-md-3 pt-0">
          <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">Upload
              Website Logo</a>

            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Website Info</a>

            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social-links">Social
              links</a>
            <a class="list-group-item list-group-item-action" data-toggle="list"
              href="#account-connections">Connections</a>
          </div>
        </div>

        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane fade" id="account-info">
              <div class="card-body pb-1">
                <div class="form-group">
                  <label class="form-label">Website Title</label>
                  <input type="text" name="site_title" class="form-control">
                </div>

                <div class="form-group">
                  <label class="form-label">Meta Description</label>
                  <textarea class="form-control" name="meta_description"></textarea>
                </div>

                <div class="form-group">
                  <label class="form-label">Copyright Text</label>
                  <textarea class="form-control" name="copyright"></textarea>
                </div>
              </div>
            </div>

            <div class="tab-pane fade active show" id="account-general">
              <div class="card-body media align-items-center">
                <img id="image_id"
                  src="{{ asset($logo->main_logo) ?? asset('backend-assets/upload_images/default_img/default_image.jpg') }}"
                  alt="" class="d-block ui-w-80">
                <div class="media-body ml-4">
                  <label class="btn btn-outline-primary">
                    Upload Main logo
                    <input type="file" name="main_logo" class="account-settings-fileinput"
                      onchange="document.getElementById('image_id').src = window.URL.createObjectURL(this.files[0])">
                  </label>
                </div>
              </div>
              <hr>

              <div class="card-body media align-items-center">
                <img id="image_id2"
                  src="{{ asset($logo->footer_logo) ?? asset('backend-assets/upload_images/default_img/default_image.jpg') }}"
                  alt="" class="d-block ui-w-80">
                <div class="media-body ml-4">
                  <label class="btn btn-outline-primary">
                    Upload Footer logo
                    <input type="file" name="footer_logo" class="account-settings-fileinput"
                      onchange="document.getElementById('image_id2').src = window.URL.createObjectURL(this.files[0])">
                  </label>
                </div>
              </div>
            </div>


            <div class="tab-pane fade" id="account-social-links">
              <div class="card-body pb-5">
                <div class="form-group">
                  <label class="form-label">Twitter</label>
                  <input type="text" class="form-control" value="https://twitter.com/user">
                </div>
                <div class="form-group">
                  <label class="form-label">Facebook</label>
                  <input type="text" class="form-control" value="https://www.facebook.com/user">
                </div>
                <div class="form-group">
                  <label class="form-label">LinkedIn</label>
                  <input type="text" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label class="form-label">Instagram</label>
                  <input type="text" class="form-control" value="https://www.instagram.com/user">
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="account-connections">
              <div class="card-body">
                <button type="button" class="btn btn-twitter">Connect to <strong>Twitter</strong></button>
              </div>
              <hr class="border-light m-0">
              <div class="card-body">
                <button type="button" class="btn btn-facebook">Connect to <strong>Facebook</strong></button>
              </div>
              <hr class="border-light m-0">
              <div class="card-body">
                <button type="button" class="btn btn-instagram">Connect to <strong>Instagram</strong></button>
              </div>
            </div>
          </div>

          <div class="text-right my-3">
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>

        </div>
      </div>

    </div>

  </form>

</div>
@endsection

@section('footer_js')
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

@endsection