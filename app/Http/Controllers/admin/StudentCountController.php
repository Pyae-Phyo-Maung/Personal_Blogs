<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\StudentCount;
class StudentCountController extends Controller
{
    public function index(){
        $student_counts=StudentCount::all();
        $student=StudentCount::find(1);
        return view('admin-panel.student-count.index',compact('student_counts','student'));
    }
    public function store(Request $request){
        StudentCount::create([
            "count"=>$request->count,
        ]);
        return back();
    }
    public function update(Request $request,$id){
        $student_count=StudentCount::find($id);
        $student_count->update([
            "count"=>$student_count->count+$request->count,
        ]);
        return back();
    }
}
