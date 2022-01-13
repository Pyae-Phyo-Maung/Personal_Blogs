@extends('admin-panel.master')
@section('title','Personal Blogs Comment')
@section('main')
<div class="container">
<div class="card text-center">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6 ">
                <h3 class="float-left">Comment</h3>
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
           
            <tbody>
                @if($comments->count() < 1)
                    <div class="text-left text-black"> No Comment</div>
                @else
                @foreach($comments as $index=>$comment)
                <tr>
                <th scope="row">{{$index+1}}</th>
                <td>{{$comment->message}}</td>
                <td> 
                <ul class="list-inline m-0">
                     <form 
                    action="{{url('admin/comment/'.$comment->id.'/show_hide')}}"
                     method="POST">
                     @csrf
                    
                    <li class="list-inline-item">
                        <button 
                        class="btn btn-sm rounded-0 
                        {{$comment->status == 'show' ? 'btn-success' : 'btn-danger'}}" 
                        type="submit" 
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Edit">
                        @if($comment->status=='show')
                        <i class="fas fa-eye-slash"></i> Hide
                        @else 
                        <i class="fas fa-eye"></i> Show
                        @endif  
                        </button>
                        </li>
                </form>
                </ul>                                      
                </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="card-footer text-muted">
      
    </div>
</div>     
</div>
@endsection