@include('backend.body.header')
@include('backend.body.sidemenu')

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
  <!-- Start content -->
  <div class="content">
    @yield('content')
  </div> <!-- content -->
  @include('backend.body.footer')

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->
@yield('footer_js')
<!-- jQuery  -->
<script src="{{ asset('backend-assets/') }}/js/jquery.min.js"></script>
<script src="{{ asset('backend-assets/') }}/js/tether.min.js"></script>
<!-- Tether for Bootstrap -->
<script src="{{ asset('backend-assets/') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('backend-assets/') }}/js/metisMenu.min.js"></script>
<script src="{{ asset('backend-assets/') }}/js/waves.js"></script>
<script src="{{ asset('backend-assets/') }}/js/jquery.slimscroll.js"></script>

<script src="{{ asset('backend-assets') }}/plugins/switchery/switchery.min.js"></script>
<script src="{{ asset('backend-assets') }}/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
<script src="{{ asset('backend-assets') }}/plugins/select2/js/select2.min.js" type="text/javascript"></script>

<!-- Counter js  -->
<script src="{{ asset('backend-assets/') }}/plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="{{ asset('backend-assets/') }}/plugins/counterup/jquery.counterup.min.js"></script>

<!--C3 Chart-->
<script type="text/javascript" src="{{ asset('backend-assets/') }}/plugins/d3/d3.min.js"></script>
<script type="text/javascript" src="{{ asset('backend-assets/') }}/plugins/c3/c3.min.js"></script>

<!--Echart Chart-->
<script src="{{ asset('backend-assets/') }}/plugins/echart/echarts-all.js"></script>

<!-- Dashboard init -->
<script src="{{ asset('backend-assets/') }}/pages/jquery.dashboard.js"></script>

<!-- App js -->
<script src="{{ asset('backend-assets/') }}/js/jquery.core.js"></script>
<script src="{{ asset('backend-assets/') }}/js/jquery.app.js"></script>

</body>

</html>