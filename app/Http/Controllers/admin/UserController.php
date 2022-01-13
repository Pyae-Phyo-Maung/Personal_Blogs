<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function index(){
        $users=User::paginate(5);
        return view('admin-panel.user.index')->with('users',$users);
    }
    public function edit($id){
        $user=User::find($id);
        return view('admin-panel.user.edit',compact('user'));
    }
    public function update(Request $request,$id){
        $user=User::find($id);
        $user->update([
            "name"=>$request->username,
            "email"=>$request->email,
            "status"=>$request->status,
        ]);
        return redirect('admin/users')->with('successMsg','You have successfully updated!');
    }
    public function delete($id){
        $user=User::find($id);
        $user->delete();
        return redirect('admin/users')->with('successMsg','You have successfully deleted!');
    }
}
