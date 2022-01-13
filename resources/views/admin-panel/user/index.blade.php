@extends('admin-panel.master')
@section('title','List Of User')
@section('main')
<div class="container">
<div class="card">
        <div class="card-header">
        <h3>User</h3>
        </div>
        <div class="card-body">
        @if(Session('successMsg'))
        <div class="alert alert-success">
            {{Session('successMsg')}}
            <div class="close" data-dismiss="alert">&times;</div>
        </div>   
        @endif
        <br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->status}}</td>
                <td> 
                <ul class="list-inline m-0">
                    <li class="list-inline-item">
                    <a href="{{url('admin/users/'.$user->id.'/edit')}}"> 
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
                            action="{{url('admin/users/'.$user->id.'/delete')}}"
                            method="POST">
                            @csrf
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
    <div class="card-footer">
        {{$users->links()}}
    </div>
</div>      
</div>
@endsection
   