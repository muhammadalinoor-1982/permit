<h3>
    @if(@$editData)
        Update User
    @else
        Add User
    @endif
</h3>

<div class="form-group">
    <label class="col-md-6">User Name</label>
    <div class="col-md-6">
        <input type="text" name="name" value="{{@$editData->name}}" class="form-control form-control-line @error('name') is-invalid @enderror" placeholder="User Name">
    </div>
    @error('name')
    <div class="pl-1 text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label class="col-md-6">Email</label>
    <div class="col-md-6">
        <input type="email" name="email" value="{{@$editData->email}}" class="form-control form-control-line @error('name') is-invalid @enderror" placeholder="User email">
    </div>
    @error('email')
    <div class="pl-1 text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label class="col-md-6">Password</label>
    <div class="col-md-6">
        <input name="password" type="password" value="{{@$editData->password}}" class="form-control form-control-line @error('password') is-invalid @enderror">
    </div>
    @error('password')
    <div class="pl-1 text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label class="col-md-6">Password Reconfirmation</label>
    <div class="col-md-6">
        <input name="password_confirmation" type="password" value="{{@$editData->password_confirmation}}" class="form-control form-control-line @error('password_confirmation') is-invalid @enderror">
    </div>
    @error('password_confirmation')
    <div class="pl-1 text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label class="col-md-6">Role</label>
    @php
        if(old("role")){
            $role = old('role');
        }elseif(isset($editData)){
            $role = $editData->role;
        }else{
            $role = null;
        }
    @endphp
    <div class="col-md-6">
        <input name="role" @if($role =='admin') checked @endif value="admin" type="radio" id="admin"> <label for="admin">Admin</label>
        <input name="role" @if($role =='supervisor') checked @endif value="supervisor" type="radio" id="supervisor"> <label for="supervisor">Supervisore</label>
        <input name="role" @if($role =='operator') checked @endif value="operator" type="radio" id="operator"> <label for="operator">Operator</label>
        <input name="role" @if($role =='customer') checked @endif value="customer" type="radio" id="customer"> <label for="customer">customer</label>
    </div>
    @error('role')
    <div class="pl-1 text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label class="col-md-6">Status</label>
    @php
        if(old("status")){
            $status = old('status');
        }elseif(isset($editData)){
            $status = $editData->status;
        }else{
            $status = null;
        }
    @endphp
    <div class="col-md-6">
        <input name="status" @if($status =='active') checked @endif value="active" type="radio" id="active"> <label for="active">Active</label>
        <input name="status" @if($status =='inactive') checked @endif value="inactive" type="radio" id="inactive"> <label for="inactive">Inactive</label>
    </div>
    @error('status')
    <div class="pl-1 text-danger">{{ $message }}</div>
    @enderror
</div>
