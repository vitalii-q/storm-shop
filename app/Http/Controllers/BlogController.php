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
}
