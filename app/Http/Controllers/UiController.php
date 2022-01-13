<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Skill,Project,StudentCount,Category,Post,LikesDislike,Comment};
use Auth;
class UiController extends Controller
{
    public function index(){
        $skills=Skill::paginate(10);
        $projects=Project::all();
        $student_count=StudentCount::find(1);
        $posts = Post::latest()->take(6)->get();
        return view('ui-panel.index',
                compact('skills','projects','student_count','posts')
                );
    }
    public function post(){
        $posts=Post::latest()->paginate(5);
        $categories=Category::all();
        return view('ui-panel.posts',compact('categories','posts'));
    }
    public function post_detail($id){
        if(!Auth::check()){
            return redirect()->route('login');
        }
        $post = Post::find($id);

        $like = LikesDislike::where('post_id',$id)
                ->where('type','like')->get();

        $dislike = LikesDislike::where('post_id',$id)->
            where('type','dislike')->get();

        $likeStatus = LikesDislike::where('post_id',$id)->
            where('user_id',Auth::user()->id)->first();

        $comments = Comment::where('post_id',$id)->
            where('status','show')->get();
        return view('ui-panel.post-detail',
                compact('post','like','dislike','likeStatus','comments')
                );
    }
    public function search(Request $request){
        $categories = Category::all();
        $searchData = $request->search;
        //dd($search);
        $posts = Post::where('title','like','%'.$searchData.'%')->
        orWhere('content','like','%'.$searchData.'%')->
        orWhereHas('category',function($data) use($searchData){
        $data->where('name','like','%'.$searchData.'%'); })->
        paginate(5);
        return view('ui-panel.posts',compact('categories','posts'));
    }

    public function searchCategory($id){
        $categories=Category::all();
        $posts=Post::where('category_id',$id)->paginate(5);
        return view('ui-panel.posts',compact('categories','posts'));
    }
}
