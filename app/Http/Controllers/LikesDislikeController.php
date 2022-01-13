<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LikesDislike;
use Auth;
class LikesDislikeController extends Controller
{
    public function like($postId){
        $userId=Auth::user()->id;
        $isExist=LikesDislike::where('post_id',$postId)->where('user_id',$userId)->first();
        if($isExist){
            if($isExist->type=='like'){
                return back();
            } else {
                LikesDislike::where('id',$isExist->id)->update([
                    'type'=>'like',
                ]);
                return back();
            }
            
        } else {
            LikesDislike::create([
                'post_id'=>$postId,
                'user_id'=>$userId,
                'type'=>'Like',
            ]);
            return back();
        }
    }
    public function dislike($postId){
        $userId=Auth::user()->id;
        $isExist=LikesDislike::where('post_id',$postId)->where('user_id',$userId)->first();
        if($isExist){
            if($isExist->type=='dislike'){
                return back();
            } else {
                LikesDislike::where('id',$isExist->id)->update([
                    'type'=>'dislike',
                ]);
                return back();
            }
            
        } else {
            LikesDislike::create([
                'post_id'=>$postId,
                'user_id'=>$userId,
                'type'=>'disike',
            ]);
            return back();
        }
    }
}
