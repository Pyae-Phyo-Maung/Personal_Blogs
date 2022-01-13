@extends('ui-panel.master')
@section('title','UI Post Detail')
@section('main')
                <!------POST DETAIL-->
                <div class="post-detail">
                  <img src="{{asset('storage/post-images/'.$post->image)}}" alt="" />
                  <div>
                    <strong>
                      <i class="fas fa-calendar-day"></i> Posted On:</strong
                    >
                    {{date('d-M-Y',strtotime($post->created_at))}}
                  </div>
                  <div>
                    <strong> <i class="fas fa-table"></i> Category :</strong>
                    {{$post->category->name}}
                  </div>
                  <br />
                  <h5>
                    {{$post->title}}
                  </h5>
                  <p>
                    {{$post->content}}
                  </p>
                 
                    <form method="POST">
                      @csrf
                      <div class="row ml-4 like_dis_com">
                      <span class="mr-4">{{$like->count()}} like</span>
                      <span class="mr-4">{{$dislike->count()}} dislike</span>
                      <span>{{$comments->count()}} comment</span>
                      </div>
                      <div class="row ml-1">
                    <div class="like mr-2 ">
                        <button 
                        type="submit" 
                        formaction="{{url('post/like/'.$post->id)}}" 
                        class="btn btn-sm btn-link text-decoration-none"
                        @if($likeStatus)
                          @if($likeStatus->type=='like')
                            disabled
                          @endif
                        @endif
                        >
                        <i class="far fa-thumbs-up"></i>
                        <span class="color-black">like</span>
                        </button>
                    </div>

                    <div class="dislike mr-2">
                        <button type="submit" 
                        formaction="{{url('post/dislike/'.$post->id)}}" 
                        class="btn btn-sm btn-link text-decoration-none"
                        @if($likeStatus)
                          @if($likeStatus->type=='dislike')
                            disabled
                          @endif
                        @endif
                        >
                        <i class="far fa-thumbs-down"></i>
                        <span>dislike</span>
                        </button>
                    </div>
                   
                    <div
                      class="comment btn btn-sm btn-link text-decoration-none"
                      data-toggle="collapse"
                      data-target="#commentId"
                    >
                      <i class="far fa-comment"></i>
                      <span>comment</span>
                    </div>
                  </div>
                  </form>
                  <br />
                  <div class="collapse comment-section" id="commentId">
                    <form action="{{url('post/comment/'.$post->id)}}" method="POST">
                      @csrf
                      <textarea
                        name="comment"
                        id=""
                        cols="26"
                        rows="3"
                        required
                        placeholder="comment"
                      ></textarea
                      ><br />
                      <button class="btn btn-primary btn-sm">
                        <i class="far fa-paper-plane"></i> Send
                      </button>
                    </form>
                    <br />
                    @foreach($comments as $comment)
                    <div>
                      <img src="{{asset('images/user.png')}}" alt="" />
                      <strong>{{$comment->user->name}}</strong>
                      <div class="message-box">{{$comment->message}}</div>
                    </div>
                    <br />
                    @endforeach
                  </div>
                </div>
@endsection
