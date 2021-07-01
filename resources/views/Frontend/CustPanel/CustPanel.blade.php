<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Panel</title>
</head>
<body>
<a style="color: green" href="{{url('')}}">User Home Page</a><br>
@if(@Auth::user()->id !=NULL)
    <a style="color: green" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><strong>SignOut</strong></a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
@else
    <a style="color: green" href="{{route('custSignIn')}}"><strong>Signin</strong></a><br>
@endif
<a style="color: green" href="{{route('AboutUs')}}"><strong>AboutUs</strong></a><br>
<a style="color: green" href="{{route('ContactUs')}}"><strong>ContactUs</strong></a>
<h1 style="color: red">Frontend Customer Panel</h1>
<p>User: {{Auth::user()->name}}</p>
</body>
</html>
