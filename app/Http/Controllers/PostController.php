<?php

namespace App\Http\Controllers;

use App\Events\PostReadedEvent;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        //$posts = Post::all()->toArray();
        $posts = Post::with('category', 'author')
            ->limit(10)
            ->orderBy('created_at', 'desc')
            ->get();

        // create event
        event(new PostReadedEvent($posts));

        return view('posts.index', compact('posts'));
    }

    public function feed($format) {
        $posts = Post::with('category', 'author')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
        $contentType = null;
        $response = null;

        switch ($format) {
            case 'json':
                //$response = $posts->makeHidden(['title', 'slug'])->toJson();
                //$response = $posts->makeVisible(['title', 'slug'])->toJson();
                $response = $posts->toJson();
                $contentType = 'application/json';
                break;
            default:
                //$response = $posts->makeHidden(['title', 'slug'])->toArray();
                //$response = $posts->makeVisible(['title', 'slug'])->toArray();
                $response = $posts->toArray();
                $contentType = 'text/html';
                break;
        }
        //return response()->json($posts);
        return response($response, 200)->header('Content-Type', $contentType);
    }

    public function testSerialize($format){
        // we have added in Post model the method getUserAndCategoryAttribute()
        // and the property $appends = ['user-and-category'];
        $posts = Post::with('category', 'author')
            ->limit(10)
            ->orderBy('created_at', 'desc')
            ->get();
        //print_r($posts[0]->user_and_category); die();
        $contentType = null;
        $response = null;

        switch ($format) {
            case 'json':
                //$response = $posts->makeHidden(['title', 'slug'])->toJson();
                //$response = $posts->makeVisible(['title', 'slug'])->toJson();

                // If we don't implement $appends in Post model I can add append
                //$response = $posts->append('user_and_category')->toJson();
                $response = $posts->toJson();
                $contentType = 'application/json';
                break;
            default:
                //$response = $posts->makeHidden(['title', 'slug'])->toArray();
                //$response = $posts->makeVisible(['title', 'slug'])->toArray();

                // If we don't implement $appends in Post model I can add append
                //$response = $posts->append('user_and_category')->toArray();
                $response = $posts->toArray();
                $contentType = 'text/html';
                break;
        }
        //return response()->json($posts);
        return response($response, 200)->header('Content-Type', $contentType);



    }

    public function find($uri){}

    public function create(){
        return view('posts.form', [
            'id' => null,
            'record' => null
        ]);
    }

    public function store(Request $request, $id = null){
        if ($request->isMethod('POST' && $id != null) ||
            $request->isMethod('PUT') ||
            $request->isMethod('PATCH') && $id == null) {
                abort(403);
        }

        $request->validate([
           'title' => 'required|string|max:255',
           'slug' => 'required|string',
           //'email' => 'required|string|email|max:255|unique:users',
        ]);

        $input = $request->except('_token');
        $postId = $request->input('id');

        if ($postId == null && $request->isMethod('POST')) {
            //$input['user_id'] = 11;
            $input['category_id'] = 1;
            $post = Post::create($input);
            //$message = Session::flash('success', "Role with:" . $role['id']. "created successfully");
            return redirect()->route('post.index')->with('success', 'Post:'.$request->title.' saved successfully');

        }
        if ($request->isMethod('PUT') || $request->isMethod('PATCH')){
            $post = Post::find($postId);
            $post->update($input);
            //$message = Session::flash('success', "Role with:" . $role['id']. "updated successfully");
            return redirect()->route('post.index')->with('success', 'Post:'.$request->title.' updated successfully');
        }

        /*$user = Post::updateOrCreate(
            ['id' => $id],
            $input
        );*/
    }

    public function show($id){
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id){
        $record = Post::findOrFail($id);
        return view('posts.form', [
            'id' => $id,
            'record' => $record,
        ]);
    }

    public function delete($id){
        $post = Post::findOrFail($id);
        if ($post){
            $post->delete();
        }
        return redirect()->route('post.index')
            ->with('success', 'Post with ID:'.$id. ', and title: '.$post->title .' deleted successfully');
    }
}
