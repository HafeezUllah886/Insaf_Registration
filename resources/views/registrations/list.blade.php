@php
    $page_title = "$type - Registrations";
    $page_dir = $type;
    $active = $type;
    $menu = "open";
@endphp
@push('extra_css')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/src/table/datatable/datatables.css')}}"> --}}
 <!-- DataTables CSS -->
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>

 <!-- DataTables Buttons CSS -->
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css"/>

<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/light/table/datatable/dt-global_style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/dark/table/datatable/dt-global_style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/src/plugins/src/glightbox/glightbox.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/src/assets/css/light/components/modal.css') }}">
<link rel="stylesheet" href="{{ asset('assets/src/assets/css/dark/components/modal.css') }}">
@endpush

@extends('layout.main')
@section('content')
    <!-- CONTENT AREA -->
<div class="row layout-top-spacing">

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex justify-content-between">
                    <h5>{{ $type }} - Registrations</h5>
                    <div class="card-actions">
                        <a href="{{ url('/dashboard') }}" class="btn btn-dark d-none d-sm-inline-block">
                            <i class="fas fa-plus"></i> Dashboard
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="example" class="table table-bordered table-striped table-hover" style="width:100%">
                        <thead>
                            <th>#</th>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>F/Name</th>
                            <th>CNIC</th>
                            <th>Reg Date</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($registrations as $reg)
                                <tr>
                                    <td> {{ $reg->id }}</td>
                                    <td> <img src="{{ asset($reg->photo) }}" style="width:70px;height:100px;" alt=""></td>
                                    <td> {{ $reg->name }}</td>
                                    <td> {{ $reg->fname }}</td>
                                    <td> {{ $reg->cnic }}</td>
                                    <td> {{ date('d M Y', strtotime($reg->date)) }}</td>
                                    <td>
                                            @if($reg->status == 'Pending')
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#accept_{{ $reg->id }}" class="btn btn-success btn-sm">Approve</a><br>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#reject_{{ $reg->id }}" class="btn btn-danger btn-sm">Reject</a><br>

                                            @elseif($reg->status == "Rejected")
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#accept_{{ $reg->id }}" class="btn btn-success btn-sm">Approve</a><br>
                                            @elseif($reg->status == "Approved")

                                            <a href="#" data-bs-toggle="modal" data-bs-target="#reject_{{ $reg->id }}" class="btn btn-danger btn-sm">Reject</a><br>
                                            @endif

                                        <a href="{{ url('/registration/view/') }}/{{ $reg->id }}" class="btn btn-info btn-sm">View</a>

                                    </td>
                                </tr>
                                <div class="modal fade" id="accept_{{ $reg->id }}" tabindex="-1" aria-labelledby="payModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md"> <!-- Add "modal-dialog-white" class -->
                                        <div class="modal-content" > <!-- Add "modal-content-white" class -->
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="payModalLabel" >Accept Appication </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" action="{{ url('/registraion/status') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $reg->id }}">
                                                    <input type="hidden" name="status" value="Approved">
                                                    <div class="form-group">
                                                        <label for="notes">Notes</label>
                                                       <textarea name="notes" id="notes" class="form-control" cols="30" rows="10"></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <input class="btn btn-primary" type="submit" value="Save">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="reject_{{ $reg->id }}" tabindex="-1" aria-labelledby="payModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md"> <!-- Add "modal-dialog-white" class -->
                                        <div class="modal-content" > <!-- Add "modal-content-white" class -->
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="payModalLabel" >Accept Appication </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" action="{{ url('/registraion/status') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $reg->id }}">
                                                    <input type="hidden" name="status" value="Rejected">
                                                    <div class="form-group">
                                                        <label for="notes">Notes</label>
                                                       <textarea name="notes" id="notes" class="form-control" cols="30" rows="10"></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <input class="btn btn-primary" type="submit" value="Save">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- CONTENT AREA -->
@endsection

@push('extra_js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JavaScript -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- DataTables Buttons JavaScript -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('/assets/src/plugins/src/glightbox/glightbox.min.js')}}"></script>
<script src="{{ asset('/assets/src/plugins/src/glightbox/custom-glightbox.min.js')}}"></script>
<!-- END PAGE LEVEL SCRIPTS -->
    <script>
       $(document).ready(function() {
    // Initialize DataTable
    var table = $('#example').DataTable({
        dom: 'Bfrtip', // Include Buttons for export and print
        buttons: [
            {
                extend: 'copy',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [0, 2, 3, 4, 5] // Include all columns except the 7th one
                }
            }
        ],
        columnDefs: [
            {
                targets: [6], // Index of the column you want to hide
                visible: true
            }
        ],
        sorting : false
    });
});

    </script>
@endpush
