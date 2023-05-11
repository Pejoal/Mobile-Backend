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
    $params = $request->all('params')['params'];

    $request->validate([
      'content' => ['required', 'min:2'],
      'user_id' => ['required', 'numeric'],
    ]);

    return Post::create([
      'content' => $params['content'],
      'user_id' => $params['user_id'],
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
