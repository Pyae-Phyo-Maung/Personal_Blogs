@extends('admin-panel.master')
@section('title','Edit User')
@section('main')
<div class="container">
<div class="card">
    <div class="card-header">
        <h3>Edit User</h3>
    </div>
    <div class="card-body">
    <form action="{{url('admin/users/'.$user->id.'/update')}}" 
    method="POST">
     @csrf
        <div class="form-group">
            <label for="username">Name</label>
            <input 
            type="text" 
            class="form-control"
            name="username"
            id="username"
            required
            value="{{$user->name ??old('username')}}">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input 
            type="email"
            class="form-control"
            id="email"
            name="email"
            required
            value="{{$user->email ?? old('email')}}">
        </div>
        <div class="form-group">
        <label for="status">Status</label>
            <select  
            class="form-control"
            id="status"
            name="status">
                <option value="">Select status</option>
                <option value="admin"
                    @if($user->status=='admin') selected @endif> 
                    Admin
                </option>
                <option value="user"
                    @if($user->status=="user") selected @endif>
                    User
                </option>
                </select>
                </div>           
    </div>
    <div class="card-footer">
        <button type="submit" 
        class="btn btn-primary">
        Update
        </button>
    </div>
        </form>
</div>
</div>
@endsection