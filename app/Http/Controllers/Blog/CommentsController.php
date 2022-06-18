<?php

namespace App\Http\Controllers\Blog;

use App\Models\AdminNotifications;
use App\Models\BlogComment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function add(Request $request) {
        if(isset($request->user_id)) {
            $request->validate([
                'comment' => 'required|min:2',
                'user_id' => 'required',
                'article_id' => 'required',
            ]);

            $user = User::where('id', $request->user_id)->first();

            $comment = BlogComment::create([
                'name' => $user->first_name,
                'email' => $user->email,

                'comment' => $request->comment,
                'user_id' => $request->user_id,
                'article_id' => $request->article_id,
            ]);
        } else {
            $request->validate([
                'name' => 'required|min:2',
                'comment' => 'required|min:2',
                'article_id' => 'required',
            ]);

            $comment = BlogComment::create([
                'name' => $request->name,
                'email' => $request->email,

                'comment' => $request->comment,
                'user_id' => $request->user_id,
                'article_id' => $request->article_id,
            ]);
        }

        AdminNotifications::create([
            'notification_id' => $comment->id,
            'type' => 'Комментарий',
            'view' => 0,
        ]);

        return redirect()->back();
    }
}
