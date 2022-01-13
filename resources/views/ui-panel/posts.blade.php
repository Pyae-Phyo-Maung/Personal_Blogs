@extends('ui-panel.master')
@section('title','UI Posts')
@section('main')
            <div class="row">
              <!-----------BLOG------------>
              <div class="col-md-8">
                @foreach($posts as $post)
                <div class="blog">
                  <img
                    src="{{asset('storage/post-images/'.$post->image)}}"
                    alt="post1 image"
                  />
                  <h6 class="mt-4">
                   {{$post->title}}
                  </h6>
                  <p>
                   {{substr($post->content,0,200)}}
                  </p>
                  <a href="{{url('posts/'.$post->id.'/post-details')}}">
                    <button class="btn btn-info btn-sm">
                      Read More
                      <i class="fas fa-angle-double-right"></i></button
                  ></a>
                </div>
                @endforeach
               
                  {{$posts->links()}}
               
              </div>

              <!-------------Sidebar-->
              <div class="col-md-4">
                <div class="sidebar">
                  <form action="{{url('post_search')}}" method="GET">
                    @csrf
                    <div class="input-group">
                      <input
                        type="text"
                        name="search"
                        class="sidebar-input"
                        placeholder="search..........."
                      />
                      <button type="submit" class="btn btn-success">
                        <i class="fas fa-search"></i> Search
                      </button>
                    </div>
                  </form>
                  <hr />
                  <h5>Categories</h5>
                  <ul class="category_ul">
                    @foreach($categories as $category)
                    <li><i class="fab fa-atlassian icon-small"></i><a href="{{url('search_by_category/'.$category->id)}}" class="category_a">{{$category->name}}</a></li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
@endsection    
