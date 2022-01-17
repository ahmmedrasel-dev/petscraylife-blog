@extends('frontend.frontend-master')
@section('contact_active')
active
@endsection
@section('content')
<div class="container p-0 my-5">
  <div class="row mb-3">

    <div class="col-sm-6 m-auto">
      <h3 class="title">Send us a Message</h3>
      <p class="text-muted sub-title">The clean and well commented code allows easy customization of the
        theme.It's <br> designed for describing your app, agency or business.</p>
    </div>
  </div>
  <!-- end row -->

  <div class="row">
    <div class="col-sm-6 m-auto">
      <form role="form" name="ajax-form" action="#" method="post" class="contact-form" data-parsley-validate=""
        novalidate="">

        <div class="form-group mb-2">
          <input class="form-control" id="name2" name="name" placeholder="Your name" type="text" value="" required="">
        </div>
        <!-- /Form-name -->

        <div class="form-group mb-2">
          <input class="form-control" id="email2" name="email" type="email" placeholder="Your email" value=""
            required="">
        </div>
        <!-- /Form-email -->

        <div class="form-group mb-2">
          <textarea class="form-control" id="message2" name="message" rows="5" placeholder="Message"
            required=""></textarea>
        </div>
        <!-- /Form Msg -->

        <div class="row">
          <div class="col-xs-12">
            <div class="">
              <button type="submit" class="btn btn-primary waves-effect waves-light" id="send">Submit</button>
            </div>
          </div> <!-- /col -->
        </div> <!-- /row -->

      </form> <!-- /form -->
    </div> <!-- end col -->
  </div>

</div> <!-- container -->
@endsection