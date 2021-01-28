<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Models\BlogTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.blog.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.tags.create');
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
            'name' => 'required',
            'name_en' => 'required',
            'code' => 'required|unique:tags',
        ]);

        // создает новую запись в таблице blog_category
        Tag::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'code' => $request->code,
        ]);

        session()->flash('info', 'Тег добавлен');
        return redirect()->route('admin.blog.tags.index');
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
        $tag = Tag::where('id', $id)->first();
        return view('admin.blog.tags.edit', compact('tag'));
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
            'name' => 'required',
            'code' => 'required|unique:tags,id,'.$request->id,
        ]);

        // элемент который обновляем
        $tag = Tag::where('id', $id)->first();

        // обновляем элемент в таблице blog_category
        $tag->update([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'code' => $request->code,
        ]);

        session()->flash('info', 'Тег обновлен');
        return redirect()->route('admin.blog.tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::where('id', $id)->first();

        // удаляем связи тега со статьями
        $connections = BlogTag::where('tag_id', $tag->id)->get();
        foreach ($connections as $connection) {
            $connection->delete();
        }

        // удаляем категорию
        $tag->delete();

        session()->flash('info', 'Тег удален');
        return redirect()->route('admin.blog.tags.index');
    }
}
