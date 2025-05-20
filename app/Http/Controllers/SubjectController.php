<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubjectController extends Controller
{
   public function index()
    {
        $subject = Subject::all();
        $data = [
            'datas' => $subject,
        ];
        return  view("Subject", $data);
    }
    public function create(Request $request)
    {
        $subject = new Subject();
        $subject->name = $request->name;
        $subject->save();

        Alert::success('anjay', 'data lu udah di buat');
        return back();
    }
    public function delete($id)
    {
        $subject = Subject::where("id", $id)->first();
        $subject->delete();
        Alert::success('Anjay', 'Data udah di apus');
        return back();
    }
    public function update(Request $request,$id)
    {
        $subject = Subject::find($id);
        $subject->name = $request->name;
        $subject->save();
        Alert::success('Anjay', 'Data udah di edit cuy');
      
        return back();
    }
}
