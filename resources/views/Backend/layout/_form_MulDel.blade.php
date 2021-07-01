<h3>
    @if(@$editData)
        Update MulDel
    @else
        Add MulDel
    @endif
</h3>

<div class="form-group">
    <label class="col-md-6">Name</label>
    <div class="col-md-6">
        <input type="text" name="name" value="{{@$editData->name}}" class="form-control form-control-line @error('name') is-invalid @enderror" placeholder="User Name">
    </div>
    @error('name')
    <div class="pl-1 text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label class="col-md-6">Phone</label>
    <div class="col-md-6">
        <input type="text" name="phone" value="{{@$editData->phone}}" class="form-control form-control-line @error('phone') is-invalid @enderror" placeholder="phone">
    </div>
    @error('phone')
    <div class="pl-1 text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label class="col-md-6">Address</label>
    <div class="col-md-6">
        <input type="text" name="address" value="{{@$editData->address}}" class="form-control form-control-line @error('address') is-invalid @enderror" placeholder="address">
    </div>
    @error('address')
    <div class="pl-1 text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label class="col-md-6">Image</label>
    <div class="col-md-6">
        <img src="{{(@$editData->image)?url('public/AllImages/MulDelImages/'.@$editData->image):url('public/AllImages/MulDelImages/noimage.jpg')}}"  width="30%">
        <input type="file" name="image" value="{{@$editData->image}}" class="form-control form-control-line @error('image') is-invalid @enderror" placeholder="image">
    </div>
    @error('image')
    <div class="pl-1 text-danger">{{ $message }}</div>
    @enderror
</div>