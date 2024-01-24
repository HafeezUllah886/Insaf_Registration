<x-mail::message>
# Reset your forgoten password

Click the following link to reset your password

<a class="btn btn-warning" href="{{ url('/password/restore/') }}/{{ $email }}/{{ $token }}">Reset Password</a>
{{-- <x-mail::button :url="'{{ $email }}/{{ $token }}'">
Reset Password
</x-mail::button> --}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
