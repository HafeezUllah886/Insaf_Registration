
</div>

</div>

<div class="footer-wrapper">
    <div class="footer-section f-section-1">
        <p class="">Copyright © <span class="dynamic-year">{{date('Y')}}</span> <a target="_blank" href="tel:+923310070041">{{-- Smart IT Solutions --}}All rights reserved.</a> </p>
    </div>
    <div class="footer-section f-section-2">
        <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
    </div>
</div>

</div>
<!--  END CONTENT AREA  -->
</div>
<!-- END MAIN CONTAINER -->


<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('assets/src/plugins/src/jquery-ui/jquery.min.js') }}"></script>
<script src="{{asset('assets/src/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/src/plugins/src/mousetrap/mousetrap.min.js')}}"></script>
<script src="{{asset('assets/src/plugins/src/waves/waves.min.js')}}"></script>
<script src="{{asset('assets/layouts/app.js')}}"></script>
<script src="{{ asset('assets/src/plugins/src/notification/snackbar/snackbar.min.js') }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
@stack('extra_js')
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

@if(Session::get('msg'))
<script>
    var msg = "{{Session::get('msg')}}";
    Snackbar.show({
    text: msg,
    duration: 3000,
    actionTextColor: '#fff',
   backgroundColor: '#00ab55'
});
</script>
@endif
@if(Session::get('error'))
<script>
    var msg = "{{Session::get('error')}}";
    Snackbar.show({
    text: msg,
    duration: 3000,
    actionTextColor: '#fff',
   backgroundColor: '#e7515a'
});
</script>
@endif
</body>

</html>
