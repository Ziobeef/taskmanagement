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
    public function create(Request $request)
    {
        $classes = new Classes();
        $classes->name = $request->name;
        $classes->save();

        Alert::success('anjay', 'data lu udah di buat');
        return back();
    }
    public function delete($id)
    {
        $classes = Classes::where("id", $id)->first();
        $classes->delete();
        Alert::success('Anjay', 'Data udah di apus');
        return back();
    }
    public function update(Request $request,$id)
    {
        $classes = Classes::find($id);
        $classes->name = $request->name;
        $classes->save();
        Alert::success('Anjay', 'Data udah di edit cuy');
      
        return back();
    }
}
