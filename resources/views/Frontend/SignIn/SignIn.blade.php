@extends('Backend.layout.master')
@section('content')
    <h1 style="color: green">SignIn</h1>
    <form method="post" action="{{ route('login') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="col-md-6">Email</label>
            <div class="col-md-6">
                <input type="email" name="email" class="form-control form-control-line @error('email') is-invalid @enderror" placeholder="Email">
            </div>
            @error('email')
            <div class="pl-1 text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-md-6">Password</label>
            <div class="col-md-6">
                <input name="password" type="password" class="form-control form-control-line @error('password') is-invalid @enderror">
            </div>
            @error('password')
            <div class="pl-1 text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary ">SignIn</button>
                <a class="btn btn-warning " href="{{route('custSignUp')}}">SignUp</a>
            </div>
            <div class="col-sm-6">
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            </div>
        </div>
    </form>
@endsection