@extends('Backend.layout.master')
@section('content')
    <h1 style="color: green">SignUp</h1>
    <form method="post" action="{{route('custStore')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="col-md-6">Name</label>
            <div class="col-md-6">
                <input type="text" name="name"  class="form-control form-control-line {{--@error('name') is-invalid @enderror--}}" placeholder="Name">
                <font color="red">{{($errors->has('name'))?($errors->first('name')):""}}</font>
            </div>
            {{--@error('name')
            <div class="pl-1 text-danger">{{ $message }}</div>
            @enderror--}}
        </div>
        <div class="form-group">
            <label class="col-md-6">Email</label>
            <div class="col-md-6">
                <input type="email" name="email" class="form-control form-control-line {{--@error('email') is-invalid @enderror--}}" placeholder="Email">
                <font color="red">{{($errors->has('email'))?($errors->first('email')):""}}</font>
            </div>
           {{-- @error('email')
            <div class="pl-1 text-danger">{{ $message }}</div>
            @enderror--}}
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
            <label class="col-md-6">Password Reconfirmation</label>
            <div class="col-md-6">
                <input name="password_confirmation" type="password"  class="form-control form-control-line @error('password_confirmation') is-invalid @enderror">
            </div>
            @error('password_confirmation')
            <div class="pl-1 text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary ">SignUp</button>
            </div>
        </div>
    </form>
@endsection