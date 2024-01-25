<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Application Tracking</title>
    <link rel="icon" type="image/x-icon" href="https://designreset.com/cork/html/src/assets/img/favicon.ico"/>


    <link href="{{ asset('assets/layouts/css/light/loader.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/layouts/css/dark/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/layouts/loader.js')}}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <link href="{{asset('assets/src/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/layouts/css/light/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/layouts/css/dark/plugins.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/src/assets/css/dark/authentication/auth-boxed.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/src/assets/css/light/authentication/auth-boxed.css')}}" rel="stylesheet" type="text/css" />


    <link rel="stylesheet" href="{{ asset('assets/src/plugins/src/notification/snackbar/snackbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/src/plugins/css/dark/notification/snackbar/custom-snackbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/src/plugins/css/light/notification/snackbar/custom-snackbar.css') }}">

    <link rel="stylesheet" href="{{asset('assets/src/assets/css/dark/components/modal.css')}}">
    <link rel="stylesheet" href="{{asset('assets/src/assets/css/light/components/modal.css')}}">
    <!-- END GLOBAL MANDATORY STYLES -->

</head>
<body class="form">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <div class="auth-container d-flex">

        <div class="container mx-auto align-self-center">

            <div class="row">

                <div class="col-12 d-flex flex-column align-self-center mx-auto">
                    <div class="card mt-3 mb-3">
                        <div class="card-body">

                            <div class="row d-flex ">
                                <div class="col-md-12 mb-3">

                                    <h2>Insaf Lawyers Forum Balochistan (ILF)</h2>
                                    <p>Application form for (ILF) Membership</p>
                                    <i class="text-danger">Only Balochistan bar members are allowed</i>

                                </div>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <div class="col-sm-6 col-md-4">
                                    <a href="{{url('/registration/create')}}" class="btn btn-block btn-success w-100">Apply for Membership</a>
                                    <div class="card">
                                        <div class="card-header"><h5>Application Tracking</h5></div>
                                        <div class="card-body">
                                            <form id="form" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="CNIC">Enter CNIC (Without dashes)</label>
                                                    <input type="text" class="form-control" name="cnic" required id="cnic" maxlength="13">
                                                </div>
                                                <button type="submit" class="btn btn-block btn-primary mt-2 w-100">Search</button>
                                        </form>
                                        <div class="text-center mt-3">

                                            <a href="https://www.insaflawyersforum.pk" class="btn btn-info">Go To Site</a>
                                         </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12"  id="result"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © <span class="dynamic-year">{{date('Y')}}</span> <a target="_blank" href="#">Diamond Software House</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
        </div>

    </div>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Password Verification</h5>

        </div>
        <form action="{{url("/registeration/edit/")}}" method="post">
        <div class="modal-body">
            @csrf
            <input type="hidden" name="id" id="form-id">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" required class="form-control">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Continue</button>
        </div>
        </form>
      </div>
    </div>
  </div>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/src/plugins/src/jquery-ui/jquery.min.js') }}"></script>
    <script src="{{asset('assets/src/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/src/plugins/src/notification/snackbar/snackbar.min.js') }}"></script>


    <!-- END GLOBAL MANDATORY SCRIPTS -->

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
<script>
    $("#form").submit(function (e){
        e.preventDefault();
        var cnic = $("#cnic").val();
        $.ajax({
            url: "{{url('/registeration/track/search/')}}/"+cnic,
            method: "get",
            success: function(response){
                $("#result").html(response);
            }
        });
    });

    function confirmPassowrd(id)
    {
        $("#form-id").val(id);
        $("#exampleModal").modal('show');
    }
</script>
</body>
</html>
