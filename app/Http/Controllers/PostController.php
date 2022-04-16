<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\EditPostRequest;
use App\Models\Like;
use App\Models\Post;

use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class PostController extends Controller
{
    use Authenticatable;

    public function dashboard()
    {

        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['posts' => $posts]);

    }

    public function postCreatePost(CreatePostRequest $request)
    {
        $post = new Post();
        $post->body = $request['body'];
        $message = "There was an error creating the post";
        if ($request->user()->post()->save($post)) {
            $message = "The post was successfully";
        }
        return redirect()->route('dashboard')->with('message', $message);
    }

    public function Destroy($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        if (Auth::user() !== $post->user()) {
            return redirect()->back();
        }


        $post->delete();
        return redirect()->route('dashboard')->with(['message' => 'Delete successfully']);
    }

    public function postEditPost(EditPostRequest $request)
    {
        $post = Post::find($request['postId']);
        $post->body = $request['body'];
        $post->update();
        return response()->json(['new_body' => $post->body], 200);
    }

    public function postLikePost(Request $request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true' ? true : false;
        $update = false;
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post_id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }
}
