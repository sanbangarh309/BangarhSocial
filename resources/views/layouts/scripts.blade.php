<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="{{ San_Helpers::san_asset('/js/bootstrap.min.js') }}"></script>
<!-- <script src="{{ asset('/js/sweetalert.js') }}"></script> -->
<!-- Skype Script -->
<script src="https://swc.cdn.skype.com/sdk/v1/sdk.min.js"></script>
<!-- End Skype Script -->

<script src="{{ San_Helpers::san_asset('/js/custom.js') }}"></script>
<script src="{{ San_Helpers::san_asset('/js/js_widget_desktop.js') }}"></script>
<!-- Load Facebook SDK for JavaScript -->
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
