@extends('admin-panel.master')
@section('title','Personal Blogs Category')
@section('main')
<div class="container">
<div class="card">
    <div class="card-header">
        <h3>Create Category</h3>
    </div>
    <form 
    action="{{url('admin/categories')}}" 
    method="POST">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" 
            class="form-control" 
            name="name" 
            id="name" 
            placeholder="Enter category name" 
             
            value="{{old('name')}}">
            @error('name')
            <span class="text-danger"><small>{{$message}}</small></span>
            @enderror
        </div>
    </div>
    <div class="card-footer">  
        <button 
        type="submit" 
        class="btn btn-primary">
        Create</button>
    </div>
    </form>
</div>                   
</div>
@endsection