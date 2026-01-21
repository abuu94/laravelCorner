<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function deletePost(Post $post) {
        if (auth()->user()->id === $post['user_id']) {
            $post->delete();
        }
        return redirect('/');
    }

    public function actuallyUpdatePost(Post $post, Request $request) {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }

        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $post->update($incomingFields);
        return redirect('/');
    }

    public function showEditScreen(Post $post) {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }

        return view('home/edit-post', ['post' => $post]);
    }
    public function createPost(Request $request){
        $incommingFields=$request->validate([
            'title'=>'required',
            'body'=>'required',
        ]);
        $incommingFields['title']=strip_tags($incommingFields['title']);
        $incommingFields['body']=strip_tags($incommingFields['body']);
        $incommingFields['user_id']=auth()->id();
        Post::create($incommingFields);
        return redirect('/');
    }
}
