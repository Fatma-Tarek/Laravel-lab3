@extends('layouts.app')

@section('title')update Page @endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{route('posts.update',['post'=>$post['id']])}}">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" placeholder="{{$post['title']}}" value="{{$post['title']}}">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" name="description">{{$post['description']}}</textarea>
    </div>
    <div class="form-group">
      <label  for="post_creator">Post Creator</label>
     <!-- <textarea class="form-control" id="description">{{$post['posted_by']}} </textarea>-->
     <select class="form-control" id="post_creator" name="user_name">
     @foreach ($users as $user)
       @if ( $user->name == $post['name']))
       <option value="{{$user->name}}"  selected="selected">{{$user->name}}</option>
       @else
         <option value="{{$user->name}}">{{$user->name}}</option>
       @endif
     @endforeach
     </select>
    </div>
    <button type="submit" class="btn btn-success">Update Post</button>
  </form>

@endsection