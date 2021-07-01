@extends('Backend.layout.master')
@section('content')
    <a href="{{route('users.create')}}" class="btn btn-sm btn-primary">Add New</a>
    <a href="{{route('home')}}" class="btn btn-sm btn-info">Home</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>SL#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $serial++ }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->status }}</td>
                <td>
                        <a class="btn btn-sm btn-success" href="{{ route('users.edit',$user->id) }}">Edit</a>
                        <form  action="{{ route('users.delete',$user->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-warning" onclick="return confirm('Are you confirm to delete this user')">Delete</button>
                        </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection