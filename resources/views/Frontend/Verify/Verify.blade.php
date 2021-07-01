@extends('Backend.layout.master')
@section('content')
    <h1 style="color: green">Email Verification</h1>
    <form method="post" action="{{route('verifyStore')}}" enctype="multipart/form-data">
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
            <label class="col-md-6">Verification Code</label>
            <div class="col-md-6">
                <input name="verification_code" type="text" class="form-control form-control-line @error('verification_code') is-invalid @enderror">
            </div>
            @error('verification_code')
            <div class="pl-1 text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary ">Verify</button>
            </div>
        </div>
    </form>
@endsection