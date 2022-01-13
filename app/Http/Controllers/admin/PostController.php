<?php

namespace App\Http\Controllers\admin;
use App\Exports\PostsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Category;
use App\Post;
use App\Comment;
use PDF;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::latest()->paginate(5);
        return view('admin-panel.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin-panel.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            "category_id"=>"required",
            "image"=>"required|image|mimes:jpg,png,jpeg",
            "title"=>"required",
            "content"=>"required",
        ]);
       
        $image=$request->image;
        $orgimg=uniqid().'_'.$image->getClientOriginalName();

        $image->storeAs('public/post-images',$orgimg);

        Post::create([
            "category_id"=>$request->category_id,
            "image"=>$orgimg,
            "title"=>$request->title,
            "content"=>$request->content,
        ]);
        return redirect('admin/posts')->with('successMsg','You have successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments=Comment::where('post_id',$id)->get();
        //dd($comments);
        return view('admin-panel.post.comment',compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::all();
        $post=Post::find($id);
        return  view('admin-panel.post.edit',compact('categories','post'));
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
          $data=$request->validate([
            "category_id"=>"required",
            "image"=>"nullable|image|mimes:jpg,png,jpeg",
            "title"=>"required",
            "content"=>"required",
        ]);
       
        $post=Post::find($id);

        if($request->hasFile('image')){
            //Delete image in folder
            $postimage=$post->image;
            File::delete('storage/post-images/'.$postimage);
        
            $image=$request->image;
            $orgimg=uniqid().'_'.$image->getClientOriginalName();
            //Save image in folder
            $image->storeAs('public/post-images',$orgimg);
            //Updat data to database
           $data['image']=$orgimg;

        } 
        //dd($data);
        $post->update($data);
        return redirect('admin/posts')->with('successMsg','You have successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);

        $postimage=$post->image;
        File::delete('storage/post-images/'.$postimage);
        $post->delete();

        return back()->with('successMsg','You have successfully deleted!');

    }
    
    public  function showHideComment($id){
        $comment=Comment::findOrFail($id);
       
        $status = $comment->status == 'show' ? 'hide' : 'show';
       
            $comment->update([
                'status'=>$status,
            ]);
            return back()->with('successMsg','Comment status changed successfully!');
       
    }

    public function createPdf(){
       
        // retreive all records from db
     $data = Post::all();
     $pdf = PDF::loadView('admin-panel/post/post', ['data' => $data]);

     $pdf->output();
    $dom_pdf = $pdf->getDomPDF();

    $canvas = $dom_pdf ->get_canvas();
    $canvas->page_text(250, 800, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));

     // download PDF file with download method
    return $pdf->download('post.pdf');
   }

   public function export() 
   {
       return Excel::download(new PostsExport, 'posts.xlsx');
   }
}
