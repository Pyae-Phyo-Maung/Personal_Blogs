<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Skill;
use PDF;
class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills=Skill::paginate(5);
        return view('admin-panel.skill.index')->with('skills',$skills);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel.skill.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Skill::create([
            "name"=>$request->skill_name,
            "percent"=>$request->skill_percent,
        ]); 
        return redirect('admin/skills')->with('successMsg','You have successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill=Skill::find($id);
        return view('admin-panel.skill.edit',compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $skill=Skill::find($id);
        $skill->update([
            "name"=>$request->skill_name,
            "percent"=>$request->skill_percent,
        ]);
        return redirect('admin/skills')->with('successMsg','You have successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill=Skill::find($id);
        $skill->delete();
        return redirect('admin/skills')->with('successMsg','You have successfully deleted!');
    }

    public function createPdf(){
       
         // retreive all records from db
      $data = Skill::all();
      
      $pdf = PDF::loadView('admin-panel/skill/skill', ['data' => $data]);

      // download PDF file with download method
     return $pdf->download('skill.pdf');
    }
}
