<!DOCTYPE html>
<!--<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>posts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a href="#" class="navbar-brand mb-0 h1">All Posts</a>
    </nav>-->
@extends('layouts.app')

@section('title')Show Page @endsection

@section('content')
    <div class="container mt-5">
    
        
    <div class="card-header">
      Post Info
    </div>
    <div class="card-body">
      <h5 class="card-title" style="display:inline">Title:</h5>
        <span class="card-text">{{ $post->title }}</span><br>
      <h5 class="card-title">Description:</h5>
      <span class="card-text">{{ $post->description }}</span>
    </div> 
    <div class="card-header">
      Post Creator Info
    </div>
    <div class="card-body">
      <h5 class="card-title" style="display:inline">Name:</h5>
      <span class="card-text">{{ $post->user->name }}</span><br>
    <h5 class="card-title" style="display:inline">Email:</h5>
    <span class="card-text">{{ $post->user->email }}</span><br>
    <h5 class="card-title" style="display:inline">Date:</h5>
    <!--<span class="card-text">{{ $post->created_at }}</span><br>-->
    <span class="card-text">{{Carbon\Carbon::parse($post->created_at)->Format('Do d \of M Y, h:m:s a')}}</span>
    </div>
  </div>
@endsection
<!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>-->
