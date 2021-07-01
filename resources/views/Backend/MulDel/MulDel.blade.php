@extends('Backend.layout.master')
@section('content')
    <form method="post" action="{{route('MulDel.deleteAll')}}" enctype="multipart/form-data">
    <a href="{{route('MulDel.create')}}" class="btn btn-sm btn-primary">Add New</a>
    <a href="{{route('home')}}" class="btn btn-sm btn-info">Home</a>
    <input class="btn btn-sm btn-success" type="submit" name="submit" value="Delete All Users"/>
        @csrf
    <table class="table table-bordered">
        <thead>
        <tr>
            <th><input type="checkbox" id="checkAll">Select All</th>
            <th>SL#</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($mul_dels as $del)
            <tr>
                <td><input name='id[]' type="checkbox" id="checkItem" value="{{ $del->id }}"></td>
                <td>{{ $serial++ }}</td>
                <td>{{ $del->name }}</td>
                <td>{{ $del->phone }}</td>
                <td>{{ $del->address }}</td>
                <td><img src="{{(!empty($del->image))?url('public/AllImages/MulDelImages/'.$del->image):url('public/AllImages/MulDelImages/noimage.jpg')}}" width="30%" ></td>
                <td>
                    <a class="btn btn-sm btn-success" href="{{ route('MulDel.edit',$del->id) }}">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </form>
@endsection



