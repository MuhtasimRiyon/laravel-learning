<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Catagory;
use Auth;

class CatagoryController extends Controller
{
    public function AllCat(){
        $cat = Catagory::paginate(3);
        $trashCat = Catagory::onlyTrashed()->latest()->paginate(3);
        return view('admin.catagory.index',compact('cat','trashCat'));
    }

    public function AddCat(Request $request){
        $validated = $request->validate(
            ['catagory_name' => 'required|unique:catagories|max:255',],
            [
                'catagory_name.required' => '*Please input Category Name',
                'catagory_name.unique' => '*Please insert unique Category Name',
            ]
        );

        catagory::insert([
            'catagory_name'  => $request->catagory_name,
            'user_id'        => Auth::user()->id,
            'created_at'     => Carbon::now()
        ]);

        return Redirect()->back()->with('success','Category inserted successfully');
    }

    public function edit($id){
        $cata = Catagory::find($id);
        return view('admin.catagory.edit',compact('cata'));
    }

    public function update(Request $request,$id){
        $update = Catagory::find($id)->update([
            'catagory_name' => $request->catagory_name,
            'user_id' => Auth::user()->id
        ]);
        return Redirect()->route('all.cat')->with('success','Category updated successfully');
    }

    public function softDelete($id){
        $delete= Catagory::find($id)->delete();
        return Redirect()->back()->with('success','Soft delete successfull');
    }

    Public function restore($id){
        $delete= Catagory::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Restore successfull');
    }

    Public function permanentDelete($id){
        $delete= Catagory::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Category Permanently Deleted');
    }

}
