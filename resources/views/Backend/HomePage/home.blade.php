<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Backend Home</title>
</head>
<body>
<strong>User: {{ Auth::user()->name }}</strong><br>
<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
<a style="color: green" href="{{route('home')}}">Admin Home Page</a><br>
<a style="color: green" href="{{route('users.view')}}"><strong>All Users</strong></a><br>
<a style="color: green" href="{{route('MulDel.view')}}"><strong>All MulDel</strong></a><br>
<h1 style="color: red">Admin Side Main Page</h1>
</body>
</html>