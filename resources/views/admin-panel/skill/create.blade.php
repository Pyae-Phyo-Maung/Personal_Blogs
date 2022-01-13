@extends('admin-panel.master')
@section('title','Personal Blogs Skill')
@section('main')
<div class="container">
<div class="card">
    <div class="card-header">
        <h3>Create Skill</h3>
    </div>
    <form 
    action="{{url('admin/skills')}}" 
    method="POST">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="skill_name">Name</label>
            <input type="text" 
            class="form-control" 
            name="skill_name" 
            id="skill_name" 
            placeholder="Enter skill name" 
            required 
            value="{{old('skill_name')}}">
        </div>
        <div class="form-group">
            <label for="skill_percent">Percent</label>
            <input type="text" 
            class="form-control" 
            id="skill_percent" 
            name="skill_percent" 
            placeholder="Enter skill percent" 
            required 
            value="{{old('skill_percent')}}">
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