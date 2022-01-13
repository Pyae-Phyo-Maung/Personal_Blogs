@extends('admin-panel.master')
@section('title','Personal Blogs Post')
@section('main')
<div class="container">
<div class="card text-center">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3 class="float-left">Post</h3>
            </div>
            <div class="col-md-2">
                <a 
                href="{{url('admin/posts/create')}}" 
                class="btn btn-sm btn-primary 
                float-right">
                <i class="fa fa-plus-circle"></i>
                Add New
                </a>
            </div>
            <div class="col-md-2">
                <a 
                href="{{url('admin/post/export')}}" 
                class="btn btn-sm btn-info 
                float-right">
                <i class="fa fa-print"></i>
                Export Exel
                </a>
            </div>
            <div class="col-md-2 ">
                 <a 
                href="{{url('admin/post/createpdf')}}" 
                class="btn btn-sm btn-warning
                float-left">
                <i class="fas fa-print"></i>
               Export to PDF
                </a>
            </div>       
        </div>
    </div>
    <div class="card-body">
        @if(Session('successMsg'))
        <div class="alert alert-success">
            {{Session('successMsg')}}
            <div class="close" data-dismiss="alert">&times;</div>
        </div>   
        @endif
        <br>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                <th scope="col">NO</th>
                <th scope="col">Category</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $index=>$post)
                <tr>
                <th scope="row">{{$index + $posts->firstItem()}}</th>
                <td>{{$post->category->name}}</td>
                <td><img src="{{asset('storage/post-images/'.$post->image)}}" width="100px"></td>
                <td>{{$post->title}}</td>
                <td><textarea>{{$post->content}}</textarea></td>
                <td> 
                <ul class="list-inline m-0">
                    <li class="list-inline-item">
                        <a 
                        href="{{url('admin/posts/'.$post->id.'/edit')}}"> 
                            <button 
                            class="btn btn-success btn-sm rounded-0" 
                            type="button" 
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Edit">
                            <i class="fa fa-edit"></i>
                            </button>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <form 
                        action="{{url('admin/posts/'.$post->id)}}"
                         method="POST">
                        @csrf @method('DELETE')
                            <button 
                            class="btn btn-danger btn-sm rounded-0" 
                            type="submit" 
                            data-toggle="tooltip" 
                            data-placement="top" 
                            title="Delete"  
                            onclick="return confirm('Are you sure to delete?')">
                            <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </li>
                    <li class="list-inline-item">
                             <a 
                             href="{{url('admin/posts/'.$post->id)}}" 
                            class="btn btn-primary btn-sm rounded-0" 
                            data-toggle="tooltip" 
                            data-placement="top" 
                            title="Comment"  
                            >
                            <i class="fa fa-comments"></i>
                            </a>
                    </li>
                </ul>                                      
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer text-muted">
        {{$posts->links()}}
    </div>
</div>     
</div>
@endsection