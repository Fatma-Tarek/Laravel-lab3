<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    //
    public function index()
    {
        /*$allPosts = [
            ['id' => 1, 'title' => 'laravel', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-20'],
            ['id' => 2, 'title' => 'PHP', 'posted_by' => 'Mohamed', 'created_at' => '2021-04-15'],
            ['id' => 3, 'title' => 'Javascript', 'posted_by' => 'Ali', 'created_at' => '2021-06-01'],
        ];*/
      
        $allPosts = Post::all();
        $Posts = Post ::paginate(4);
        //  dd($Posts);
        return view('posts.index', [
           // 'posts' => $allPosts
           'posts' => $Posts
        ]);
    }
    public function destroy($postId)
    {
        Post::find($postId)->delete();
        return redirect()->route('posts.index');
    }
    public function show($postId)
    {
        /* $post = ['id' => 1,'description'=>'laravel is good', 'title' => 'laravel', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-20','email'=>'Ahmed@gmail.com'];*/
        //$post = Post::find($postId);
        // $post = User::select("*")->join("posts", "users.id", "=", "posts.user_id")->get();
        //dd($id->user_id);
        // $post = User::select("*")->join("posts", "users.id", "=", "posts.user_id")->where("posts.id", "=", $postId)->first();
        // dd($post);
        $post = Post :: find($postId);
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        return view('posts.create', [
          'users' => User::all()
        ]);
    }
    public function edit($postId)
    {
        /* $post = ['id' => 1,'description'=>'laravel is good', 'title' => 'laravel', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-20','email'=>'Ahmed@gmail.com'];*/
        // $post = User::select("*")->join("posts", "users.id", "=", "posts.user_id")->where("posts.id", "=", $postId)->first();
        $post = Post :: find($postId);
        return view('posts.edit', [
          'post' => $post,
          'users' => User::all(),
          ]);
    }
    public function store(StorePostRequest $request)
    {
        // dd($request->all());
        //dd($request->only('title', 'description', 'user_name'));
        // $requestData = $request->all();
        $requestData =$request->only('title', 'description', 'user_name');
        //dd(User::where('name', "mohamed")->value('id'));
        $id=User::where('name', $requestData["user_name"])->value('id');
        $post = new Post;
        $post->user_id =$id;
        $post->title = $requestData["title"];
        $post->description = $requestData["description"];
        
        $post->save();
        //logic to insert request data into db

        return redirect()->route('posts.index');
    }
    public function update(UpdatePostRequest $request, $postId)
    {
        // dd($request->all());
        //dd($request);
        //logic to update request data into db
        $requestData =$request->only('title', 'description', 'user_name', '_method');
        $requestData = $request->all();
        $user=User::select([
            'id'
          ])->where('name', $requestData["user_name"])->get();
        //dd($user[0]->id);
        Post::find($postId)->update([
            'title' => $requestData["title"],
            'description' =>  $requestData["description"],
            'user_id' => $user[0]->id
            ]);
        return redirect()->route('posts.index');
    }
  
    public function getDeletePosts()
    {
        $posts = Post::onlyTrashed()->paginate(4);

        return view('posts.deletedposts', compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 4);
    }
}
