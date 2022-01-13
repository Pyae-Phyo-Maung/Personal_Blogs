@extends('admin-panel.master')
@section('title','Personal Blogs Skill')
@section('main')
<div class="container">
<div class="card text-center">
    <div class="card-header">
        <div class="row">
            <div class="col-md-8 ">
                <h3 class="float-left">Skill</h3>
            </div>
            <div class="col-md-2">
                <a 
                href="{{url('admin/skills/create')}}" 
                class="btn btn-sm btn-primary 
                float-right">
                <i class="fa fa-plus-circle"></i>
                Add New
                </a>
            </div>
            <div class="col-md-2 ">
                 <a 
                href="{{url('admin/skill/createpdf')}}" 
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
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Percent</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($skills as $skill)
                <tr>
                <th scope="row">{{$skill->id}}</th>
                <td>{{$skill->name}}</td>
                <td>{{$skill->percent}}</td>
                <td> 
                <ul class="list-inline m-0">
                    <li class="list-inline-item">
                        <a 
                        href="{{url('admin/skills/'.$skill->id.'/edit')}}"> 
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
                        action="{{url('admin/skills/'.$skill->id)}}"
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
                </ul>                                      
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer text-muted">
        {{$skills->links()}}
    </div>
</div>     
</div>
@endsection