@extends('admin-panel.master')
@section('title','Personal Blogs Skill')
@section('main')
<div class="container">
<div class="card">
    <div class="card-header">
        <h3>Edit Skill</h3>
    </div>
    <form 
    action="{{url('admin/skills/'.$skill->id)}}" 
    method="POST">
    @csrf
    @method('PATCH')
    <div class="card-body">
        <div class="form-group">
            <label for="skill_name">Name</label>
            <input 
            type="text" 
            class="form-control" 
            name="skill_name" 
            id="skill_name"  
            required  
            value="{{$skill->name ?? old('skill_name')}}">
        </div>
        <div class="form-group">
            <label for="skill_percent">Percent</label>
            <input 
            type="text" 
            class="form-control" 
            id="skill_percent" 
            name="skill_percent"  
            required  
            value="{{$skill->percent ?? old('skill_percent')}}">
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