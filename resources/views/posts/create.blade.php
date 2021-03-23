@extends('layouts.app')

@section('title')Create Page @endsection

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
<form method="POST" action="{{route('posts.store')}}">
    <!--with each form-->
    @csrf  
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" name="description"> </textarea>
    </div>
    <div class="form-group">
      <label  for="post_creator">Post Creator</label>
      <select class="form-control" id="post_creator" name="user_name">
          @foreach ($users as $user)
          <option value="{{$user->name}}">{{$user->name}}</option>
          @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-success">Create Post</button>
  </form>

@endsection