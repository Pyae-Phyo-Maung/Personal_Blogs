@extends('admin-panel.master')
@section('title','Personal Blogs Project')
@section('main')
<div class="container">
<div class="card">
    <div class="card-header">
        <h3>Edit Project</h3>
    </div>
    <form 
    action="{{url('admin/projects/'.$project->id)}}" 
    method="POST">
    @csrf
    @method('PATCH')
    <div class="card-body">
        <div class="form-group">
            <label for="project_name">Name</label>
            <input 
            type="text" 
            class="form-control" 
            name="project_name" 
            id="project_name"  
            required  
            value="{{$project->name ?? old('project_name')}}">
        </div>
        <div class="form-group">
            <label for="project_url">Url</label>
            <input 
            type="text" 
            class="form-control" 
            id="project_url" 
            name="project_url"  
            required  
            value="{{$project->url ?? old('project_url')}}">
        </div>
    </div>
    <div class="card-footer">  
         <button 
         type="submit" 
         class="btn btn-primary">
         Update</button>
    </div>
    </form>
</div>                   
</div>
@endsection