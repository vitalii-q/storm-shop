<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Models\AdminNotifications;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Blog::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.blog.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategory::all();
        $tags = Tag::get();
        return view('admin.blog.articles.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ // валидация
            'title' => 'required',
            'code' => 'required|unique:blog',
            'preview_text' => 'required',
            'preview_text_en' => 'required',
            'text' => 'required',
            'text_en' => 'required',
        ]);
        // кладем файл в файловую систему
        if(isset($request['image'])) {
            Storage::disk('public')->put('files/blog/'.$request->image->getClientOriginalName(), file_get_contents($request->image));
        }

        // создает новую запись в таблице blog_category
        $article = Blog::create([
            'title' => $request->title,
            'title_en' => $request->title_en,
            'preview_text' => $request->preview_text,
            'preview_text_en' => $request->preview_text_en,
            'text' => $request->text,
            'text_en' => $request->text_en,

            'code' => $request->code,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,

            'image' => $request->image ? 'storage/files/blog/'.$request->image->getClientOriginalName() : null,
        ]);

        $article->tags()->sync($request->tags); // синхронизируем статью с тегами

        session()->flash('info', 'Статья добавлена');
        return redirect()->route('admin.blog.articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Blog::where('id', $id)->first();
        $categories = BlogCategory::get();
        $tags = Tag::get();
        return view('admin.blog.articles.edit', compact('article','categories', 'article', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([ // валидация
            'title' => 'required',
            'code' => 'required|unique:blog,id,'.$request->id,
            'preview_text' => 'required',
            'preview_text_en' => 'required',
            'text' => 'required',
            'text_en' => 'required',
        ]);

        // элемент который обновляем
        $article = Blog::where('id', $id)->first();

        // (если убрали или загрузили новое) удаляем старое изображение
        if($request->delete_image === 'yes' or isset($request->image)) {
            $imagePathExp = explode('/', $article->image);
            $image = end($imagePathExp); // получаем название изображения
            Storage::disk('public')->delete('files/blog/'.$image);

            $article->update([ // удаляем путь к файлу в бд или записываем новый путь к изображению
                'image' => $request->image ? 'storage/files/blog/'.$request->image->getClientOriginalName() : null,
            ]);
        }

        // кладем файл в файловую систему
        if(isset($request->image)) {
            Storage::disk('public')->put('files/blog/'.$request->image->getClientOriginalName(), file_get_contents($request->image));
        }

        // обновляем элемент
        $article->update([
            'title' => $request->title,
            'title_en' => $request->title_en,
            'preview_text' => $request->preview_text,
            'preview_text_en' => $request->preview_text_en,
            'text' => $request->text,
            'text_en' => $request->text_en,

            'code' => $request->code,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
        ]);

        $article->tags()->sync($request->tags); // синхронизируем статью с тегами

        session()->flash('info', 'Статья обновлена');
        return redirect()->route('admin.blog.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Blog::where('id', $id)->first();

        // удаляем изображение если есть
        if(isset($article->image)) {
            $imagePathExp = explode('/', $article->image);
            $image = end($imagePathExp); // получаем название изображения
            Storage::disk('public')->delete('files/blog/'.$image);
        }

        // удаляем комментарии статьи
        $comments = BlogComment::where('article_id', $article->id)->get();
        $commentIds = [];
        foreach ($comments as $comment) {
            array_push($commentIds, $comment->id);
            $comment->delete();
        }

        // удаляем уведомления комментариев статьи
        $notifications = AdminNotifications::where('type', 'Комментарий')->whereIn('notification_id', $commentIds)->get();
        foreach ($notifications as $notification) {
            $notification->delete();
        }

        // удаляем категорию
        $article->delete();

        session()->flash('info', 'Статья удалена');
        return redirect()->route('admin.blog.articles.index');
    }
}
