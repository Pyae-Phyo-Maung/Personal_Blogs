@extends('ui-panel.master')
@section('title','Personal Blogs Home')
@section('main')
      <!-----------ABOUT ME-->
      <div class="aboutme">
        <div class="row">
          <div class="col-md-5" id="aboutId">
            <br />
            <h3 class="text-center">ABOUT ME</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing
              elit. Molestias illum tenetur nostrum error corporis
              ullam facere molestiae nihil. Voluptates inventore
              cumque, quae ex earum rerum quis exercitationem
              cupiditate. Rerum, ipsum!
            </p>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing
              elit. Molestias illum tenetur nostrum error corporis
              ullam facere molestiae nihil. Voluptates inventore
              cumque, quae ex earum rerum quis exercitationem
              cupiditate. Rerum, ipsum!
            </p>
            <div class="row">
              <div class="col-md-6 mb-2">
                <div class="total-project">
                  <i class="fas fa-project-diagram font-awesome"></i
                  ><br />
                  <strong>{{$projects->count()}}</strong>
                  <p>Total Projects</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="total-student">
                  <i class="fas fa-users font-awesome"></i><br />
                  <strong>
                    @if($student_count)
                    {{$student_count->count}}
                    @endif
                  </strong>
                  <p>Total Students</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7" id="skillID">
            <br />
            <h3 class="text-center">MY SKILLS</h3>
            @foreach($skills as $skill)
            <div class="row">
              <div class="col-md-9">
                <div class="progress mt-3">
                  <div class="progress-bar" style="width: {{$skill->percent}}%">
                    {{$skill->percent}}%
                  </div>
                </div>
              </div>
              <div class="col-md-3">{{$skill->name}}</div>
            </div>
            @endforeach
            <div class="mt-4"> {{$skills->links()}}</div>
            
          </div>
        </div>
      </div>

      <!----------MY PROJECTS--------->
      <br />
      <br />
      <br />
      <div class="my-project">
        <h3 class="text-center">MY PROJECTS</h3>

        <div class="row">
          @foreach($projects as $project)
          <div class="col-md-4 mb-2">
            <br />
            <a href="{{$project->url}}" target="_blank">
              <div class="single-project">
                <i class="fas fa-project-diagram font-awesome"></i
                ><br />
                <strong>{{$project->name}}</strong>
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>

      <!-------------LATEST POSTS------------->
      <br />
      <br />
      <br />
      <div class="latest-post">
        <h3 class="text-center">LATEST POSTS FORM BLOGS</h3>
        <br />
        <p class="text-center">
          Huy Guide!I waemly welcome you to read my blog posts.
          <br />Here are very interesting adipisicing exciting post
          you can read that i'm supporting for you guys..
        </p>
        <br />
        <div class="row">
          @foreach($posts as $post)
          <div class="col-sm-6 col-md-4 mb-4">
            <a href="{{url('posts/'.$post->id.'/post-details')}}">
              <img
                src="{{asset('storage/post-images/'.$post->image)}}"
                alt="post1 image"
                class="post-img"
              /><br />
              <br />
              <small>{{date('d-M-Y',strtotime($post->created_at))}}</small>

              <h6 class="mt-2">
               {{$post->title}}
              </h6>
              <p>
               {{substr($post->content,0,200)}}
              </p>
            </a>
          </div>
          @endforeach
        </div>
      </div>
@endsection