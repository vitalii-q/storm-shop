<?php

namespace App\Http\Controllers\Blog;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    public function tag($tag) {
        $tag = Tag::where('code', $tag)->first();
        $blog = $tag->articles;
        $blogCategories = BlogCategory::get();

        $popArticles = Blog::orderBy('views', 'desc')->take(3)->get(); // популярные статьи
        $tags = Tag::get();

        return view('blog', compact('blog', 'blogCategories', 'popArticles', 'tags'));
    }

    public function ajaxTag(Request $request) {
        $tag = Tag::where('id', $request->id)->first();
        $blog = $tag->articles;

        return response(view('ajax.tag_articles', compact('blog')));
    }
}
