@extends('admin-panel.master')
@section('title','Personal Blogs Post')
@section('main')
<div class="container">
<div class="card">
    <div class="card-header">
        <h3>Edit Post</h3>
    </div>
    <form 
    action="{{url('admin/posts/'.$post->id)}}" 
    method="POST" enctype="multipart/form-data">
    @csrf 
    @method('PATCH')
    <div class="card-body">
        <div class="form-group">
            <label  for="category_id">Category</label>
            <select 
            class="custom-select my-1 mr-sm-2" 
            id="category_id"
            name="category_id">
                <option selected>
                    Choose category...
                </option>
                @foreach($categories as $category)
                <option value="{{$category->id}}"
                
                {{ $post->category_id == $category->id ? 'selected':''}}
                >
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
            <br>
            <img src="{{asset('storage/post-images/'.$post->image)}}" width="100px">
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" 
            class="form-control" 
            id="title" 
            name="title" 
            placeholder="Enter title percent" 
            required 
            value="{{old('title') ?? $post->title}}">
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
            rows="3">{{$post->content ?? old('post_content')}}</textarea>
            @error('post_content')
            <span class="text-danger"><small>{{$message}}</small></span>
            @enderror
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