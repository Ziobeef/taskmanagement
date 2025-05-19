<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Classes::all();
        $data = [
            'datas' => $classes,
        ];
        return  view("Class", $data);
    }
    public function create(Request $request){
         $classes = new Classes();
        $classes->name = $request->name;
        $classes->save();

        Alert::success('Success', 'Classes has been created');
        return back();
    }
    
}
