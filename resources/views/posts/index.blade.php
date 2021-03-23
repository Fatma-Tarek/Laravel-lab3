
@extends('layouts.app')

@section('title')posts Page @endsection

@section('content')
    <div class="container mt-5">
    <a href="{{ route('posts.create')}}" class="btn btn-success mb-3" style="margin-bottom: 20px;">Create post</a>
    <table class="table">
     <thead>
      <tr>
       <th scope="col">page</th>
       <th scope="col">Title</th>
       <th scope="col">Slug</th>
       <th scope="col">posted by</th>
       <th scope="col">created at</th>
       <th scope="col">actions</th>
     </tr>
    </thead>
    <tbody>
       @foreach($posts as $post)
      <tr>
        <th scope="row">{{ $post->id }}</th>
        <td>{{ $post->title }}</td>
        <td>{{ $post->slug }}</td>
        <!--<td>{{ $post->updated_at}}</td>-->
        <td>​​{{$post->user->name}}</td>
        <td> {{Carbon\Carbon::parse($post->created_at)->Format('Y-m-d')}} </td>
        <td>
         <x-button type=info : href="{{ route('posts.show',['post' => $post['id']])}}" : text="View"/>
         <x-button type=secondary : href="{{ route('posts.edit',['post' => $post['id']])}}" : text="Edit"/>
         <!--<x-button type=danger : href="{{ route('posts.destroy',['post' => $post['id']])}}" : text="Delete"/>-->
         <form method="POST" action="{{ route('posts.destroy',['post' => $post['id'] ])}}" style = "display:inline;margin:0px;padding:0px" >
         @csrf
         @method('DELETE')
         <button class="btn btn-danger" style="margin-bottom: 20px;" onclick="return confirm('Sure Want Delete?')">
            Delete
         </button>
         </form>
        </td>
      </tr>
    @endforeach
     
    </tbody>
  </table>    
  </div>
  {{$posts->links("pagination::bootstrap-4")}}
  @endsection