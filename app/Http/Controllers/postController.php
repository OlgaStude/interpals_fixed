<?php

namespace App\Http\Controllers;

use App\Http\Requests\postRequest;
use App\Http\Resources\postResource;
use App\Http\Resources\postResourceCollection;
use App\Models\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class postController extends Controller
{
    
    public function makePost(postRequest $req){
        
        $post = posts::create(['users_id' => Auth::user()->id, 'lang' => $req->lang, 'text' => $req->text]);

        if($post){
           
            return response()->json(['status' => 200, 'message' => 'post was created!']);
        }

        return response()->json(['status' => 422, 'message' => 'post is failed to be created!']);

    }


    public function getPosts(){

        $posts = posts::join('users', 'users.id', '=', 'posts.users_id')
        ->where('lang', '=', Auth::user()->lang_s)->orWhere('lang', '=', Auth::user()->lang_t)->orderBy('posts.id', 'desc')->get();

        return $posts;

    }


    public function resourcetest(){

        // $posts = posts::first();
        $posts = posts::join('users', 'users.id', '=', 'posts.users_id')
        ->select('posts.id as id')->orderBy('posts.id', 'desc')->get();

        // return new postResourceCollection($posts);
        return postResource::collection($posts);

    }



    public function getPosts_by_user($id){

        $posts = posts::join('users', 'users.id', '=', 'posts.users_id')->where('users_id', '=', $id)->orderBy('posts.id', 'desc')->get();

        return $posts;

    }

}
