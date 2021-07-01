<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\MulDel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MulDelController extends Controller
{
    public function view()
    {
        $data['title'] = 'Multi Delete';
        $data['mul_dels'] = MulDel::orderBy('id','desc')->get();
        $data['serial'] = 1;
        return  view('Backend.MulDel.MulDel',$data);
    }
    public function create()
    {
        $data['title']='Add MulDel';
        return view('Backend.MulDel.Add_And_Edit',$data);
    }
    public function store(Request $request)
    {
        $data = new MulDel();
        $data->name    = $request->name;
        $data->phone        = $request->phone;
        $data->address    = $request->address;
        if ($request->file('image')) {
            $file = $request->file('image');
            $file_name = date('d.m.Y') . '_' . time() . '_' . rand(0000, 9999) . '_' . 'STFL_' . $file->getClientOriginalName();
            $file->move(public_path('AllImages/MulDelImages/'), $file_name);
            $data['image'] = $file_name;
        }
        $data->save();
        session()->flash('message','MulDel Created successfully');
        return redirect()->route('MulDel.view');
    }
    public function edit($id)
    {
        $data['title'] = 'Edit MulDel';
        $data['editData'] = MulDel::findOrFail($id);
        return  view('Backend.MulDel.Add_And_Edit',$data);
    }
    public function update(Request $request, $id)
    {
        $data = MulDel::find($id);
        $data->name    = $request->name;
        $data->phone        = $request->phone;
        $data->address    = $request->address;
        $data->image    = $request->image;
        $data->save();
        session()->flash('message','MulDel has been updated successfully');
        return redirect()->route('MulDel.view');
    }
    public function delete($id)
    {
        $del = MulDel::findOrFail($id);
        $del->delete();
        session()->flash('message','MulDel Deleted successfully');
        return redirect()->route('MulDel.view');
    }
    /*public function multipleusersdelete(Request $request)
    {
        $data['id'] = $request->id;
        $data['Image'] = $request->image;
        if(file_exists('public/AllImages/MulDelImages/'.$data->image) AND !empty($data->image)){
            unlink('public/AllImages/MulDelImages/'.$data->image);
        }
        foreach ($data as $del)
        {
            MulDel::where(['id','image'], $del)->delete();
        }
        session()->flash('message','Selected Data has been Deleted successfully');
        return redirect()->route('MulDel.view');
    }*/
    public function multipleusersdelete(Request $request)
    {
        $id = $request->id;
        foreach ($id as $del)
        {
            MulDel::where('id', $del)->delete();
        }
        session()->flash('message','Selected Data has been Deleted successfully');
        return redirect()->route('MulDel.view');
    }
}
