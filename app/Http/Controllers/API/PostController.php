<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {
  /**
   * Display a listing of the resource.
   */
  public function index() {
    return Post::get();
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request) {

    $request->validate([
      'content' => ['required', 'min:2'],
    ]);

    return Post::create([
      'content' => $request->content,
      'user_id' => auth()->user()->id,
    ]);

  }

  /**
   * Display the specified resource.
   */
  public function show(Post $post) {
    return $post;
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Post $post) {

    if ($post->user_id != auth()->user()->id) {
      return response(['msg' => 'You Are NOT Authorized to do this action']);
    }

    $done = $post->update($request->validate([
      'content' => ['required', 'min:2'],
    ]));

    if ($done) {
      return response(['msg' => 'Post Successfully Updated'], 200);
    }

    return response('Some Error', 403);

  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Post $post) {
    
    if ($post->user_id != auth()->user()->id) {
      return response(['msg' => 'You Are NOT Authorized to do this action']);
    }
    
    $done = $post->delete();
    
    if ($done) {
      return response(['msg' => 'Post Successfully Deleted'], 200);
    }

    return response('Some Error', 403);
  }
}
