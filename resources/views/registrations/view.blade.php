@php
    $page_title = "Registrations";
    $page_dir = "View";
    $active = "View";
    $menu = "open";
@endphp
@push('extra_css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/src/table/datatable/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/light/table/datatable/dt-global_style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/dark/table/datatable/dt-global_style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/src/plugins/src/glightbox/glightbox.min.css')}}">

@endpush

@extends('layout.main')
@section('content')
    <!-- CONTENT AREA -->
<div class="row layout-top-spacing">

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 text-end">
                        @if($reg->status == 'Pending')
                            <p class="position-absolute top-0 end-0 badge bg-warning">{{ $reg->status }}</p>
                        @endif
                        @if($reg->status == 'Approved')
                            <p class="position-absolute top-0 end-0 badge bg-success">{{ $reg->status }}</p>
                        @endif
                        @if($reg->status == 'Rejected')
                            <p class="position-absolute top-0 end-0 badge bg-danger">{{ $reg->status }}</p>
                        @endif
                    </div>
                    <div class="col-md-3" style="margin-bottom:100px;">
                        <img src="{{ asset($reg->photo) }}" style="width:100%;max-height:400px;" alt="">
                        <h3 class="mt-3">{{ $reg->name }}</h3>
                        <p class="btn btn-default" data-bs-toggle="modal" data-bs-target="#cnic">View CNIC</p>
                        <p class="btn btn-default" data-bs-toggle="modal" data-bs-target="#bCard">View Bar Council Card</p>
                        <p class="btn btn-default"  data-bs-toggle="modal" data-bs-target="#licenses">View Licenses</p>
                    </div>
                    <div class="col-md-9 table-responsive">
                        <table class="table" width="100%">
                            <tr>
                                <td width="30%">Registration Id</td>
                                <td>{{ $reg->id }}</td>
                            </tr>
                            <tr>
                                <td>Father Name</td>
                                <td>{{ $reg->fname }}</td>
                            </tr>
                            <tr>
                                <td>CNIC Number</td>
                                <td>{{ $reg->cnic }}</td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>{{ $reg->gender }}</td>
                            </tr>
                            <tr>
                                <td>Date of Birth</td>
                                <td>{{ date("d M Y", strtotime($reg->dob)) }}</td>
                            </tr>
                            <tr>
                                <td>District</td>
                                <td>{{ $reg->dist }}</td>
                            </tr>
                            <tr>
                                <td>Date of LC</td>
                                <td>{{ date("d M Y", strtotime($reg->lc)) }}</td>
                            </tr>
                            <tr>
                                <td>Date of HC</td>
                                <td>{{ date("d M Y", strtotime($reg->hc)) }}</td>
                            </tr>
                            <tr>
                                <td>Date of SC</td>
                                <td>{{ date("d M Y", strtotime($reg->sc)) }}</td>
                            </tr>
                            <tr>
                                <td>Since Member of ILM</td>
                                <td>{{ date("d M Y", strtotime($reg->since)) }}</td>
                            </tr>
                            <tr>
                                <td>Bar Registration Number</td>
                                <td>{{ $reg->barReg }}</td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td>{{ $reg->phone }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $reg->email }}</td>
                            </tr>
                            <tr>
                                <td>Office Address</td>
                                <td>{{ $reg->addr }}</td>
                            </tr>
                        </table>
                        <div class="d-flex justify-content-end">
                            <a href="{{ url('/dashboard') }}" class="btn btn-dark" style="margin-left: 5px">Dashboard</a>
                            <a href="{{ url('/registration/delete/') }}/{{ $reg->id }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this registration');" style="margin-left: 5px">Delete</a>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="finalize" tabindex="-1" aria-labelledby="payModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md"> <!-- Add "modal-dialog-white" class -->
            <div class="modal-content" style="background-color: white; color: #000000"> <!-- Add "modal-content-white" class -->
                <div class="modal-header">
                    <h5 class="modal-title" id="payModalLabel" style="color: black; font-weight: bold">Finalize Application</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 class="text-center">Are you sure?</h2>
                    <h5 class="text-center">Once your application status is finalized, you won't have the ability to make any changes</h5>
                    <h6 class="text-center">Application Status: <span class="badge {{$reg->status == "Approved" ? "badge-success" : "badge-danger"}} ">{{$reg->status}}</span></h6>
                    <form class="form-horizontal" action="{{ url('/app/finalize') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $reg->id }}">
                        <div class="form-group">
                            <label for="notes">Notes</label>
                           <textarea name="notes" id="notes" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input class="btn btn-primary" type="submit" value="Proceed">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="suspen" tabindex="-1" aria-labelledby="payModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md"> <!-- Add "modal-dialog-white" class -->
            <div class="modal-content" style="background-color: white; color: #000000"> <!-- Add "modal-content-white" class -->
                <div class="modal-header">
                    <h5 class="modal-title" id="payModalLabel" style="color: black; font-weight: bold">Suspend Application</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 class="text-center">Are you sure?</h2>
                    <h6 class="text-center">Application Status: <span class="badge {{$reg->status == "Approved" ? "badge-success" : "badge-danger"}} ">{{$reg->status}}</span></h6>
                    <form class="form-horizontal" action="{{ url('/app/suspend') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $reg->id }}">
                        <div class="form-group">
                            <label for="notes">Notes</label>
                           <textarea name="notes" id="notes" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input class="btn btn-primary" type="submit" value="Proceed">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="cnic" tabindex="-1" aria-labelledby="addPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md"> <!-- Add "modal-dialog-white" class -->
        <div class="modal-content" style="background-color: white; color: #000000"> <!-- Add "modal-content-white" class -->
            <div class="modal-header">
                <h5 class="modal-title" id="addPaymentModalLabel" style="color: black; font-weight: bold">CNIC View</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset($reg->cnicF) }}" class="w-100" alt="">
                <img src="{{ asset($reg->cnicB) }}" class="w-100" alt="">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="bCard" tabindex="-1" aria-labelledby="addPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md"> <!-- Add "modal-dialog-white" class -->
        <div class="modal-content" style="background-color: white; color: #000000"> <!-- Add "modal-content-white" class -->
            <div class="modal-header">
                <h5 class="modal-title" id="addPaymentModalLabel" style="color: black; font-weight: bold">Bar Council Card View</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset($reg->bCard) }}" class="w-100" alt="">
                <img src="{{ asset($reg->bCardB) }}" class="w-100" alt="">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="licenses" tabindex="-1" aria-labelledby="addPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Add "modal-dialog-white" class -->
        <div class="modal-content" style="background-color: white; color: #000000"> <!-- Add "modal-content-white" class -->
            <div class="modal-header">
                <h5 class="modal-title" id="addPaymentModalLabel" style="color: black; font-weight: bold">Licenses View</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <embed src="{{ asset($reg->licenses) }}" class="w-100" style="min-height: 100vh"  type="text/pdf">
            </div>
        </div>
    </div>
</div>
<!-- CONTENT AREA -->

@endsection

@push('extra_js')
<script src="{{ asset('assets/src/plugins/src/jquery-ui/jquery.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/table/datatable/datatables.js') }}"></script>
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('/assets/src/plugins/src/glightbox/glightbox.min.js')}}"></script>
<script src="{{ asset('/assets/src/plugins/src/glightbox/custom-glightbox.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.all.min.js"></script>
<script>

     $(document).ready(function() {
      $('#delete').on('click', function(event) {
        // Display a confirmation dialog
        var confirmed = confirm('Are you sure you want to delete member?');

        // Check if the user clicked 'OK'
        if (confirmed) {

        } else {
          // User clicked 'Cancel', prevent the default link behavior
          event.preventDefault();
          alert('Action canceled');
        }
      });
    });
</script>

