<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;
class CommentController extends Controller
{
    public function comment(Request $request,$postId){
        $userId=Auth::user()->id;
        Comment::create([
            'post_id'=>$postId,
            'user_id'=>$userId,
            'message'=>$request->comment,
        ]);
        return back();
    }
}
