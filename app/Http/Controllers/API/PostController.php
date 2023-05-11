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
    return ['index'];
  }
  
  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request) {
    return ['store'];

  }

  /**
   * Display the specified resource.
   */
  public function show(Post $post) {
    return ['show'];
  }


  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Post $post) {
    return ['update'];

  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Post $post) {
    return ['destroy'];

  }
}
