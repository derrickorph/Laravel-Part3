<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PostController extends Controller
{
    public function addPost(){
        return view('add-post');
    }

    public function createPost(Request $request){

        $post= new Post();
        $post->title= $request->title;
        $post->body= $request->body;
        $post->save();
        return back()->with('post_created','Post has been created successfully!');
    }
    public function getPost(){
        $posts=Post::orderBy('id','DESC')->get();
        return view('posts',compact('posts'));
    }
    public function getPostById($id){
        try {
            $decryptedId = Crypt::decrypt($id);
            $post=Post::where('id',$decryptedId)->first();
            return view('single-post',compact('post'));
        } catch (DecryptException $e) {

        }

    }

    public function deletePost($id){
        try {
            $decryptedId = Crypt::decrypt($id);
            $post=Post::where('id',$decryptedId)->delete();
            return back()->with('post_deleted','Post has been deleted successfully!');
        } catch (DecryptException $e) {

        }

    }
    public function editPost($id){
        try {
            $decryptedId = Crypt::decrypt($id);
            $post=Post::find($decryptedId);
            return view('edit-post',compact('post'));
        } catch (DecryptException $e) {

        }

    }
    public function updatePost(Request $request){

        try {
            $decryptedId = Crypt::decrypt($request->id);
            $post=Post::find($decryptedId);
            $post->title= $request->title;
            $post->body= $request->body;
            $post->save();
            return back()->with('post_updated','Post has been updated successfully!');
        } catch (DecryptException $e) {

        }


    }

    //Relationship Functions One to Many
    public function addComment($id)
    {
        $post= Post::find($id);
        $comment= new Comment();
        $comment->comment="Voici le premier commentaire";
        $post->comments()->save($comment);
        return "Comment has been posted successfully!";
    }
    public function getCommentsByPost($id)
    {
        $comments= Post::find($id)->comments;
        return $comments;
    }
}
