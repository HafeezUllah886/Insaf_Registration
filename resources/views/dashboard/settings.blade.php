@php
    $page_title = "Settings";
    $page_dir = "Settings";
    $active = "settings";
    $menu = "open";
@endphp

@extends('layout.main')
@section('content')
    <!-- CONTENT AREA -->
<div class="row layout-top-spacing">

 
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h5>{{ __('lang.BasicSettings') }}</h5>
                </div>
                <form action="{{ url('settings/save/basics') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="proName">{{ __('lang.ProjectName') }}</label>
                        <input type="text" name="proName" id="proName" class="form-control" value="{{ @$settings->proName }}" placeholder="{{ __('lang.EnterBusinessName') }}">
                        @error('proName')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="phone">{{ __('lang.PhoneNumber') }}</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ @$settings->phone }}" placeholder="{{ __('lang.EnterPhoneNumber') }}">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="mobile">{{ __('lang.MobileNumber') }}</label>
                        <input type="text" name="mobile" id="mobile" class="form-control" value="{{ @$settings->mobile}}" placeholder="{{ __('lang.EnterMobileNumber') }}">
                        @error('mobile')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="addr_line_one">{{ __('lang.AddrOne') }}</label>
                        <input type="text" name="addr_line_one" id="addr_line_one" class="form-control" value="{{ @$settings->addr_line_one }}" placeholder="{{ __('lang.EnterAddrOne') }}">
                        @error('addr_line_one')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="addr_line_two">{{ __('lang.AddrTwo') }}</label>
                        <input type="text" name="addr_line_two" id="addr_line_two" class="form-control" value="{{ @$settings->addr_line_two }}" placeholder="{{ __('lang.EnterAddrTwo') }}">
                        @error('addr_line_two')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="addr_line_three">{{ __('lang.AddrThree') }}</label>
                        <input type="text" name="addr_line_three" id="addr_line_three" class="form-control" value="{{ @$settings->addr_line_three }}" placeholder="{{ __('lang.EnterAddrThree') }}">
                        @error('addr_line_three')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success align-self-end mt-3">{{ __('lang.Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  
<div class="col-12 mt-3">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h5>{{ __('lang.ProfileSettings') }}</h5>
            </div>
            <form action="{{ url('settings/save/userName') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="userName">{{ __('lang.UserName') }}</label>
                    <input type="text" name="userName" id="userName" value="{{ auth()->user()->username }}" class="form-control" placeholder="Enter Your User Name">
                    @error('userName')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="userName">{{ __('lang.Email') }}</label>
                    <input type="email" name="email" id="email" value="{{ auth()->user()->email }}" class="form-control" placeholder="Enter Your Email Address">
                    @error('userName')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-warning align-self-end mt-3">{{ __('lang.Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-12 mt-3">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h5>{{ __('lang.ChangePassword') }}</h5>
            </div>
            <form action="{{ url('settings/save/password') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="password">{{ __('lang.CurrentPassword') }}</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('lang.CurrentPasswordPlace') }}">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="newPassword">{{ __('lang.NewPassword') }}</label>
                    <input type="password" name="newPassword" id="newPassword" class="form-control" placeholder="{{ __('lang.NewPasswordPlace') }}">
                    @error('newPassword')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="confirmPassword">{{ __('lang.ConfirmPassword') }}</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="{{ __('lang.ConfirmPasswordPlace') }}">
                    @error('confirmPassword')
                    <span class="text-danger">{{ $message }}<span>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-secondary align-self-end mt-3">{{ __('lang.Update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

   

</div>
<!-- CONTENT AREA -->
@endsection

