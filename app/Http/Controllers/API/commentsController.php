<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\commentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class commentsController extends Controller
{
    
    public function addComment(commentRequest $req){

        $comment = Comment::create(['posts_id' => $req->post_id, 'users_id' => Auth::user()->id, 'text' => $req->text, 'likes' => 0, 'dislikes' => 0]);

        if ($comment) {

            return response()->json(['status' => 200, 'message' => 'comment was created!']);
        }

        return response()->json(['status' => 422, 'message' => 'comment is failed to be created!']);
    }

}
