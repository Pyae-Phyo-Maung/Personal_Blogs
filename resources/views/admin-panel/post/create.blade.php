@extends('admin-panel.master')
@section('title','Personal Blogs Post')
@section('main')
<div class="container">
<div class="card">
    <div class="card-header">
        <h3>Create Post</h3>
    </div>
    <form 
    action="{{url('admin/posts')}}" 
    method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label  for="category_id">Category</label>
            <select 
            class="custom-select my-1 mr-sm-2" 
            id="category_id"
            name="category_id">
                <option>
                    Choose category...
                </option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">
                    {{$category->name}}
                </option>
                @endforeach
            </select>
            @error('category_id')
            <span class="text-danger"><small>{{$message}}</small></span>
            @enderror
        </div>    
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file"
            class="form-control-file" 
            id="image"
            name="image">
            @error('image')
            <span class="text-danger"><small>{{$message}}</small></span>
            @enderror
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" 
            class="form-control" 
            id="title" 
            name="title" 
            placeholder="Enter title percent" 
            required 
            value="{{old('title')}}">
            @error('title')
            <span class="text-danger"><small>{{$message}}</small></span>
            @enderror
        </div>
        <div class="form-group">
            <label for="post_content">Content</label>
            <textarea 
            class="form-control" 
            id="post_content" 
            name="content"
            rows="3">{{old('content')}}</textarea>
            @error('content')
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