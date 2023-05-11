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
    
    // return $request->all()['content'];

    // $request->validate([
    //   'content' => ['required', 'min:2'],
    //   'user_id' => ['required', 'numeric'],
    // ]);

    return Post::create([
      'content' => $request->all()['content'],
      'user_id' => $request->all()['user_id'],
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
    $done = $post->update($request->validate([
      'content' => ['required', 'min:2'],
      'user_id' => ['required', 'numeric'],
    ]));

    if ($done) {
      return response('Post Successfully Updated', 403);
    }

    return response('Some Error', 403);

  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Post $post) {
    $done = $post->delete();

    if ($done) {
      return response('Post Successfully Deleted', 403);
    }

    return response('Some Error', 403);
  }
}
