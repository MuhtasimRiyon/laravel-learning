<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatagoryController extends Controller
{
    public function AllCat(){
        return view('admin.catagory.index');
    }
}
