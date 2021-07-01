@extends('Backend.layout.master')
@section('content')
    <form method="post" action="{{(@$editData)?route('MulDel.update',$editData->id):route('MulDel.store')}}" enctype="multipart/form-data">
            @csrf
            @include('Backend.layout._form_MulDel')
        <div class="form-group">
            <div class="col-sm-6">
            <button class="btn btn-primary ">{{(@$editData)?"Update":"Submit"}}</button>
            </div>
        </div>
    </form>
@endsection