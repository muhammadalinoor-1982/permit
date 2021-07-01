<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function view()
    {
        $data['title'] = 'View Page';
        $data['users'] = User::orderBy('id','desc')->get();
        $data['serial'] = 1;
        return  view('Backend.Users.Users',$data);
    }
    public function create()
    {
        $data['title']='New User';
        return view('Backend.Users.Add_And_Edit',$data);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email|unique:users,email',
        ]);

        $data = new User();
        /*$data->creator = auth()->user()->name;*/
        $data->name    = $request->name;
        $data->email        = $request->email;
        $data->password         = bcrypt($request->password);
        $data->role    = $request->role;
        $data->status    = $request->status;
        $data->save();
        session()->flash('message','User Created successfully');
        return redirect()->route('users.view');
    }
    public function edit($id)
    {
        $data['title'] = 'Edit User';
        $data['editData'] = User::findOrFail($id);
        return  view('Backend.Users.Add_And_Edit',$data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>"required|email|unique:users,email,$id",
        ]);
        $data = User::find($id);
        /*$data->updater = auth()->user()->name;*/
        $data->name    = $request->name;
        $data->email        = $request->email;
        $data->password         = bcrypt($request->password);
        $data->role    = $request->role;
        $data->status    = $request->status;
        $data->save();
        session()->flash('message','User has been updated successfully');
        return redirect()->route('users.view');
    }
    public function delete($id)
    {
        $luxury = User::findOrFail($id);
        $luxury->delete();
        session()->flash('message','User Deleted successfully');
        return redirect()->route('users.view');
    }
}
