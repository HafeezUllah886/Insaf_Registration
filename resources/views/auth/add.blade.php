@php
    $page_title = "Add User";
    $page_dir = "AddUser";
    $active = "dashboard";
    $menu = "open";
@endphp

@extends('layout.main')
@section('content')
    <!-- CONTENT AREA -->
<div class="row layout-top-spacing">
    <div class="col-12 d-flex justify-content-end mb-3">
        <a href="{{url('/users')}}" class="btn btn-dark">{{ __('lang.GoBack') }}</a>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"><h5>Add User</h5> </div>
                <form method="post" action="{{ url('/user/create') }}" class="mt-3" >
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mt-3">
                                <label for="title">User Name</label>
                                <input type="text" name="name" placeholder="Enter user name" value="{{ old('name') }}" class="form-control" id="">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mt-3">
                                <label for="email">Email</label>
                                <input type="email" placeholder="Enter email address" value="{{ old('email') }}" name="email" class="form-control" >
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mt-3">
                                <label for="password">Password</label>
                                <input type="password" placeholder="Enter Password" value="" name="password" class="form-control" >
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mt-3">
                                <label for="role">Role</label>
                                <select name="role" class="form-select" id="role">
                                    <option value="Member">Member</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                        </div>

                    </div>
                   <div class="row mt-3">
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">{{ __('lang.Save') }}</button>
                    </div>
                   </div>
                </form>
            </div>
        </div>

    </div>

</div>
<!-- CONTENT AREA -->
@endsection



