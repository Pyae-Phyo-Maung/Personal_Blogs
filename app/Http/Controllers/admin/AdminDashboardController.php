<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\{Skill,Project,StudentCount,Post};
use  App\User;
class AdminDashboardController extends Controller
{
   
    public function index(){
        $userCount= User::all()->count();
        $postCount=Post::all()->count();
        $projectCount=Project::all()->count();
        $skills=Skill::all();
        $studentCount=StudentCount::find(1);
      
        return view('admin-panel.dashboard',compact('userCount','postCount','projectCount','studentCount','skills'));
    }
}
