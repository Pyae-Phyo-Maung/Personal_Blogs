@extends('admin-panel.master')
@section('title','Personal Blogs Project')
@section('main')
<div class="container">
<div class="card">
    <div class="card-header">
        <h3>Create Project</h3>
    </div>
    <form 
    action="{{url('admin/projects')}}" 
    method="POST">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="project_name">Name</label>
            <input type="text" 
            class="form-control" 
            name="project_name" 
            id="project_name" 
            placeholder="Enter project name" 
            required 
            value="{{old('project_name')}}">
        </div>
        <div class="form-group">
            <label for="project_url">Url</label>
            <input type="text" 
            class="form-control" 
            id="project_url" 
            name="project_url" 
            placeholder="Enter project url" 
            required 
            value="{{old('project_url')}}">
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