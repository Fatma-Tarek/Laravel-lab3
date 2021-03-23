<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use  App\Http\Resources\PostResource;


class PostController extends Controller
{
    //retuen All data 
    public function index() {
       // dd('We are in index');
      /* $posts = Post::all();
       $mappedPosts = [];
       foreach($posts as $post)
       {
           $mappedPosts [] = [
               'id' => $post->id,
               'title'=> $post->title,
           ];
       }
       return $mappedPosts;*/

       $posts = Post:: all(); //return elqoant collection
       return PostResource::collection($posts);
    }
    public function show(Post $post) {
      //dd($post);
      //return $post;
      //single object
      return new PostResource($post);

    }
}