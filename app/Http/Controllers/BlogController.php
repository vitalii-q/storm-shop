<?php

namespace App\Http\Controllers;

use App\Models\AdminNotifications;
use App\Models\BlogComment;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Response;

class BlogController extends Controller
{
    public function blog() {
        $blog = Blog::orderBy('created_at', 'desc')->paginate(5);
        $blogCategories = BlogCategory::get();

        $popArticles = Blog::orderBy('views', 'desc')->take(3)->get(); // популярные статьи
        $tags = Tag::get();

        return view('blog', compact('blog', 'blogCategories', 'popArticles', 'tags'));
    }
    public function ajaxBlog(Request $request) {
        $tag = Tag::where('id', $request->id)->first();
        $blog = $tag->articles;

        return response(view('ajax.tag_articles', compact('blog')));
    }

    public function blogCategory($selected_category) {
        $selected_category = BlogCategory::where('code', $selected_category)->first(); // выбранная категория
        $blog = Blog::where('category_id', $selected_category->id)->paginate(5); // статьи привязанные к категории
        $blogCategories = BlogCategory::get(); // все категории

        $popArticles = Blog::orderBy('views', 'desc')->take(3)->get(); // популярные статьи
        $tags = Tag::get();

        return view('blog', compact('blog', 'blogCategories', 'selected_category', 'popArticles', 'tags'));
    }
    public function article($article) {
        $article = Blog::where('code', $article)->first();
        if (!$article) { abort(404); } // error 404
        $article->increment('views'); // увеличиваем просмотры
        $blogCategories = BlogCategory::get();
        $user = User::where('id', $article->user_id)->first(); // поучаем юзера который написал статью
        $popArticles = Blog::orderBy('views', 'desc')->take(3)->get(); // популярные статьи
        $tags = Tag::get();

        $comments = $article->comments;

        return view('blog_detail', compact('article', 'blogCategories', 'popArticles', 'tags', 'user', 'comments'));
    }
    public function tagBlog($tag) {
        $tag = Tag::where('code', $tag)->first();
        $blog = $tag->articles;
        $blogCategories = BlogCategory::get();

        $popArticles = Blog::orderBy('views', 'desc')->take(3)->get(); // популярные статьи
        $tags = Tag::get();

        return view('blog', compact('blog', 'blogCategories', 'popArticles', 'tags'));
    }

    public function comment(Request $request) {
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
