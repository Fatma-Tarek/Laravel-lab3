<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use  App\Http\Resources\PostResource;
use App\Http\Requests\StorePostRequest;


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
       $posts = Post ::paginate(4);
       return PostResource::collection($posts);
    }
    public function show(Post $post) {
      //dd($post);
      //return $post;
      //single object
      return new PostResource($post);

    }
    public function store(StorePostRequest $request) {
        //dd($post);
        //return $post;
        //single object
        //dd("we are in store ");
      //  return new PostResource($post);
      $post = Post::create($request->all());
       return new PostResource($post);
      }
}
