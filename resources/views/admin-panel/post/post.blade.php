@extends('admin-panel.post.post-header')
@section('main')
    <table class="main-table">
        <thead>
            <tr>
            <th> Category </th>
            <th> Photo </th>
            <th> Title </th>
            <th> Content </th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $post)
        <tr>
            <td>
           {{$post->category->name}}
            </td>
            <td>
            <img src="{{public_path('/storage/post-images/'.$post->image)}}" class="photo">
            </td>
            <td>
           {{$post->title}}
            </td>
            <td>
                <blockquote>
                {{$post->content}}
                </blockquote>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection